<?php 
include 'global.php';

$_GET['page'] = 'news';

define('JS', 'news');

if(empty($_GET['id'])) {
    $query = $db->connect()->prepare('SELECT * FROM site_news WHERE timestamp < ? ORDER BY timestamp DESC LIMIT 0,1');
    $query->execute([time()]);

    $fetch = $query->fetchAll();
    $_GET['id'] = $fetch[0]['id'];
	
	define('TITLE', ''.sitename.': Articles');
	define('DESCRIPTION', 'Retrouve toutes nos actualités grâce aux articles créer par les staffs!');
}

if (isset($_GET['id'])) {
    $specific = true;

	if ($user->isOnline()) {
		
		if($user->get('rank') > 3)
		{
			$query = $db->connect()->prepare('SELECT * FROM site_news WHERE id = ?');
			$query->execute([$_GET['id']]);
			$newsrank = true;
		}
	}
	
	if(!isset($newsrank))
	{
		$query = $db->connect()->prepare('SELECT * FROM site_news WHERE id = ? AND timestamp < ?');
		$query->execute([$_GET['id'], time()]);
	}
   
    $fetch = $query->fetchAll();

    $valid = (count($fetch) < 1) ? false : true;
    $title = (count($fetch) > 0) ? $fetch[0]['title'] : 'Article non trouvé';
    $autheur = $user->get('username', $fetch[0]['staff']);
    $lookautheur = $user->get('look', $fetch[0]['staff']);
    $snippettam = (count($fetch) > 0) ? $fetch[0]['snippet'] : 'Description non trouvée';
	$imgmetta = (count($fetch) > 0) ? $fetch[0]['topstory_image'] : ASSETSURL . 'img/aps_social.png';

	if ($valid) {
		
		if(!defined('TITLE'))
			define('TITLE', $title.' - '.sitename.'');
		
		if(!defined('DESCRIPTION'))
			define('DESCRIPTION', $snippettam);
		
		define('IMG', $imgmetta);

		$contenu = str_replace('http://', 'https://', $fetch[0]['body']);
		$contenu=preg_replace( '/<font color="(.*?)">(.*?)<\/font>/', '<span style="color:$1;">$2</span>',$contenu);
		$contenu=preg_replace( '/<b>(.*?)<\/b>/', '<strong>$1</strong>',$contenu);
		$contenu=preg_replace( '/<span style="font-weight:(.*?)">(.*?)<\/span>/', '<strong>$2</strong>',$contenu);
		$contenu=preg_replace( '/<span style="(.*?)"><strong>(.*?)<\/strong><\/span>/', '<strong><span style="$1">$2</span></strong>',$contenu);
		
		$dateposte = $fetch[0]['timestamp'];
				
    } else {
        define('TITLE', 'Article introuvable');
		define('DESCRIPTION', 'Description non trouvée');
		define('IMG', ASSETSURL . 'img/aps_social.png');
    }	
}
include ROOTDIR . '/app/actions/news_comment_noajax.php';
include ROOTDIR . '/app/templates/header.php';

?>


<div class="bloc">

	<div class="article-left">

			<div class="article-container">

				<div class="article-pos">

						<div class="article-background" style="background-image: url(<?= $imgmetta; ?>);">
						<div class="article-info">
						<img src="<?= ASSETSURL ?>img/iconnews.png">
						<div class="article-title"><?= $title; ?></div><br>
						<div class="article-desc"><?= $snippettam; ?></div>
						</div>
						</div>
						<div class="article-body">
						<?= $contenu; ?>
						</div>

				</div>

				<div class="article-author">
						<div class="avatare"><img src="<?= AVATAR ?><?= $lookautheur ?>&direction=2&action=std&headonly=1&size=s"></div>
						<span>Posté par <?= $autheur ?>, il y a <?= $system->timeAgo($dateposte); ?></span>
				</div>

			</div>


			<div class="article-comment">

				  <?php
                        if (isset($error) && $error && isset($type) && $type == 'msgbox')
                            echo "<div class='error " . $class . "'>" . $message . "</div>";

                        if ($user->isOnline()) {
                            ?>
				<div class="espace-coms">
                            <form class="espace-coms-pos" action="" method="POST" name="comment">
                                <input type="hidden" name="type" value="comment"/>
                                <div class="avatarcomment">
                                    <img src="<?= AVATAR . $user->get('look'); ?>&amp;size=m&amp;direction=3"/>
                                </div>
                                <input type="hidden" name="articleid" class="articleid" value="<?= $fetch[0]['id']; ?>"/>
                                <textarea name="articlecomment" class="articlecomment" placeholder="&Eacute;cris ton message ici"></textarea>
                                 <input class="articlesend" type="submit" value="Envoyer mon message"/>
                            </form>
                           
					</div>

						<?php }
                        
 						$query5 = $db->connect()->prepare('SELECT * FROM site_news_comments WHERE newsid = ? ORDER BY posted DESC');
                        $query5->execute([$fetch[0]['id']]);

                        $fetch5 = $query5->fetchAll();

                        if (count($fetch5) < 1) {
                            ?>
                            <div class="error">
                                Aucun commentaire pour le moment, sois le premier à commenter !
                            </div>
                            <?php
                        } else {
                            for ($c = 0; $c < count($fetch5); $c++) {
                                $candelete = false;

                                if ($user->get('rank') >= ADM_MINRANK || $fetch5[$c]['uid'] == $user->get('id')) {
                                    $candelete = true;
                                }
                                ?>

                               <div class="comment-coms">

			<div class="espace-coms-pos" >
			<div class="avatarcomment">
			<img src="<?= AVATAR . $user->get('look', $fetch5[$c]['uid']); ?>&amp;size=m&amp;direction=2"/>
			</div>
     <div class="articlecomment coms <?= ($candelete) ? 'isme' : ''; ?>">
     	<span><b><?= $user->get('username', $fetch5[$c]['uid']); ?></b> : <?= $system->mention($system->bbcodes($fetch5[$c]['comment'])); ?></span>
     </div>
     	<?php if ($candelete) { ?>
		<form action="news_comments_delete.php" name="del_com" method="POST">
		<input type="hidden" name="articleid" value="<?= $fetch5[$c]['newsid']; ?>"/>
		<input type="hidden" name="commentid" value="<?= $fetch5[$c]['id']; ?>"/>
		<input type="submit" value="" />
		<img src="<?= ASSETSURL; ?>img/delete.png"/>
		</form>
		<?php } ?>
            </div>                 	

                               </div>

                                                                <?php
                            }
                        }
                        ?>


			</div>

</div>


<div class="article-right">

		
          
		<?php
		$req = $db->connect()->prepare('SELECT * FROM site_news WHERE timestamp < ? ORDER BY timestamp DESC');
		$req->execute([time()]);
		while($news = $req->fetch()) { 
		?>
<div class="article-list">
	<div class="list-position">
			<div class="list-info">
						<div class="avatare"><img src="<?= AVATAR ?><?= $user->get('look', $news['staff']); ?>&direction=2&action=std&headonly=1&size=s"></div>
			<span>Posté par <?= $user->get('username', $news['staff']); ?>, il y a <?= $system->timeAgo($dateposte); ?></span>
			</div>

		<a href="<?= URL . "news/" . $news['id'] . "-" . utf8_decode($system->specialreplace($news['title'])); ?>">
			<div class="list-link" style="background-image:url(<?= $news['topstory_image'] ?>);">
				<div class="list-title"><span><?= $news['title'] ?></span></div><br>
				<div class="list-desc"><span><?= $news['snippet'] ?></span></div>
			</div>
		</a>
	</div>
</div>
<?php } ?>

</div>

</div>
 		
		</div>


	</div>	

	<?php
        
include ROOTDIR . '/app/templates/footer.php';

?>
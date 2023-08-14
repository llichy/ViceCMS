<?php 
include 'global.php'; 

    if (!$user->isOnline()) {
        $system->redirect('index');
    } else {
define('TITLE', 'Mon avatar');
$_GET['page'] = 'me';

include ROOTDIR . '/app/templates/header.php';
include ROOTDIR .'/app/actions/photo_liste.php';
?>

<div class="me-extension">

	<div class="mebox-div">
		<div class="player-info">	
			<div class="plateauavatar">
<img class="me-avatar" alt="" src="<?= AVATAR ?><?= $user->get('look'); ?>&direction=2&action=std&head_direction=2" />
			</div>

       <div class="namebox-div">
          <div class="shape-12-div"><div class="shape-12-div1"></div></div>
          <b class="welcome-vice-b">Bienvenue, <?= $user->get('username'); ?>!</b>
        </div>

        <div class="motto-div">
          <div class="shape-12-div2"><div class="shape-12-div3"></div></div>
          <div class="motto-vicecms-div">Mission: "<?= htmlentities($user->get('motto')) ?>"</div>
        </div>


        <div class="joinhotelbutton-div">
        	<a href="<?= URL ?>hotel">
          <div class="buttondex">
            <div class="traitbutton"></div>
            JOUER
          </div>
      		</a>
        </div>

                <div onclick="PalierLoad()" class="joinhotelbutton-dive">
          <div class="buttondexpalier">
            
            PALIER
          </div>
      	
        </div>
</div>	

       <div class="platteh-div">
      
      <div class="currency_set">
       	<div class="currency-section">
	       		<div class="currency diams">
	       			<img src="<?= ASSETSURL ?>img/diamvice.png">
	       		</div>
		       	<div class="money">
		       		<span class="diams"><?= $system->NumberFormat($user->getcurrency('amount', 5)); ?></span>
		       	</div>
       	</div>

       	       	<div class="currency-section">
	       		<div class="currency cred">
	       			<img src="<?= ASSETSURL ?>img/xpvice.png">
	       		</div>
		       	<div class="money">
		       		<span class="cred"><?= $system->NumberFormat($user->get('ls_experience')); ?></span>
		       	</div>
       	</div>

       	       	<div class="currency-section">
	       		<div class="currency duckets">
	       			<img src="<?= ASSETSURL ?>img/ducketvice.png">
	       		</div>
		       	<div class="money">
		       		<span class="duckets"><?= $system->NumberFormat($user->getcurrency('amount', 0)); ?></span>
		       	</div>
       	</div>

</div>

        </div>



      </div>

           <div class="relationship-div">
        
        <div class="relationship-div1">
<?php
$love = $db->connect()->prepare('SELECT * FROM messenger_friendships WHERE user_one_id = ?  AND relation = ? ORDER BY user_two_id DESC LIMIT 0,3');
$love->execute([$user->get('id'), 1]);
$lovefetch = $love->fetchAll(); 

$friends = $db->connect()->prepare('SELECT * FROM messenger_friendships WHERE user_one_id = ?  AND relation = ? ORDER BY user_two_id DESC LIMIT 0,3');
$friends->execute([$user->get('id'), 2]);
$friendsfetch = $friends->fetchAll();


$hate = $db->connect()->prepare('SELECT * FROM messenger_friendships WHERE user_one_id = ?  AND relation = ? ORDER BY user_two_id DESC LIMIT 0,3');
$hate->execute([$user->get('id'), 3]);
$hatefetch = $hate->fetchAll();

?>

          <div class="box-relation">
          	<div class="relation-position">
            <div class="div-img">
            	<img src="<?= ASSETSURL ?>img/coeur.png">
            </div>

<div class="relation-username">
<?php for ($i=0; $i < count($lovefetch); $i++) { ?>
<span><?= $user->get('username', $lovefetch[$i]['user_two_id']) ?></span>
<?php } ?>
</div>

          </div>
        </div>
          <div class="box-relation">
          	<div class="relation-position">
            <div class="div-img">
            	<img src="<?= ASSETSURL ?>img/mf.png">
            </div>
<div class="relation-username">
<?php for ($i=0; $i < count($friendsfetch); $i++) { ?>
<span><?= $user->get('username', $friendsfetch[$i]['user_two_id']) ?></span>
<?php } ?>
</div>
          </div>
        </div>
          <div class="box-relation">
          	<div class="relation-position">
            <div class="div-img">
            	<img src="<?= ASSETSURL ?>img/deathm.png">
            </div>
<div class="relation-username">
<?php for ($i=0; $i < count($hatefetch); $i++) { ?>
<span><?= $user->get('username', $hatefetch[$i]['user_two_id']) ?></span>
<?php } ?>
</div>
          </div>
        </div>
        </div>

        <div style="width: 100%;bottom:0;height:30px;background-color:#262537;position: absolute;border-bottom-right-radius: 5px;border-bottom-left-radius: 5px;"></div>

      </div>
</div>
                                        <?php
                                        $query = $db->connect()->prepare('SELECT * FROM messenger_friendships WHERE user_one_id = ? ORDER BY user_two_id DESC');
                                        $query->execute([$user->get('id')]);

                                        $fetch = $query->fetchAll();
                                        ?>

			<div class="boxmyfriends">

        <div class="title">
            Mes amis (<?= count($fetch) ?>)
        </div>
        <div class="content">
            <div class="arrow left"></div>
            <div id="friends" class="friendlist">

					<?php
					if (count($fetch) < 1) {
					?>
					<div class="friend unlisted"></div>
					<?php
					} else {
					?>


            	<?php for ($i = 0; $i < count($fetch); $i++) {
				$uid = $fetch[$i]['user_two_id'];
				$fUsername = $user->get('username', $uid);
				$fOnline = $user->get('online', $uid);
				$fLook = $user->get('look', $uid);
                                                                ?>
                  <?php if($i == 0) { ?>                                              
                <div class="friend first" style="margin-left: 7px;position: relative; top: -3px;">
                    <div class="avatar <?php if($fOnline == 1) {?>online<?php }else{ ?>offline<?php } ?>"><img src="<?= AVATAR ?><?= $fLook ?>&amp;direction=3&amp&headonly=1&size=l&gesture=sml"></div>
                </div>
            <?php }elseif($i > 0) {?>
                <div class="friend aaa">
                <div class="avatar <?php if($fOnline == 1) {?>online<?php }else{ ?>offline<?php } ?>"><img src="<?= AVATAR ?><?= $fLook ?>&amp;direction=3&amp&headonly=1&size=l&gesture=sml"></div>
            </div>
<?php } }  } ?>

            </div>
            <div class="arrow right"></div>
        </div>

			</div>

		<div class="bloc">
		<div class="title-bloc"><span>Les derniers articles</span></div>

		<div class="newsglobal">
		<?php
		$req = $db->connect()->prepare('SELECT * FROM site_news WHERE timestamp < ? ORDER BY timestamp DESC LIMIT 3');
		$req->execute([time()]);
		while($news = $req->fetch()) { 
		?>
		
		<div class="box-news">

			<div class="news-pos">

		<div class="newsauthor">
			<div class="authoravatar">
				<img alt="avatar" id="avatar" src="<?= AVATAR ?><?= $user->get('look', $news['staff']); ?>&headonly=1&direction=2&action=std,crr=47" />
			</div>
			
			<div class="author"><span><?= $user->get('username', $news['staff']); ?></span></div>
		</div>
		
		<div class="newsimg" style="background-image: url('<?= $news['topstory_image'] ?>');">
		</div>

		<div class="newsinfo">
			<div class="newstitle"><?= $news['title'] ?></div>
			<br>
			<div class="newsdesc"><?= $news['snippet'] ?></div>
		</div>

		<hr>

		<div class="newslink">
			<a href="<?= URL . "news/" . $news['id'] . "-" . utf8_decode($system->specialreplace($news['title'])); ?>"> > En savoir plus</a>
		</div>



		</div>
		</div>
		<?php } ?>
</div>

		</div>

		<div class="bloc">
			<div class="title-bloc"><span>Les derniers photos</span></div>

<div class="photoglobal">
			<div class="boxphoto one">

		<div class="boxauthor">
			<div class="authoravatar">
				<img alt="avatar" id="avatar" src="<?= AVATAR ?><?= $photo_1_avatar ?>&headonly=1&direction=2&action=std,crr=47" />
			</div>
			
			<div class="author"><span><?= $photo_1_username ?></span></div>
		</div>


		<div class="photocontent">
			<div class="photoimage one" src="<?= $photo_1_url ?>" style="background-image:url(<?= $photo_1_url ?>)"></div>
		</div>

			</div>


			<div class="boxphoto two">
						<div class="boxauthor">
			<div class="authoravatar">
				<img alt="avatar" id="avatar" src="<?= AVATAR ?><?= $photo_2_avatar ?>&headonly=1&direction=2&action=std,crr=47" />
			</div>
			
			<div class="author"><span><?= $photo_2_username ?></span></div>
		</div>

			<div class="photocontent">
				<div class="photoimage two" src="<?= $photo_2_url ?>" style="    background-repeat: no-repeat;background-image:url(<?= $photo_2_url ?>)"></div>
		</div>
		</div>
			<div class="boxphoto three">
						<div class="boxauthor">
			<div class="authoravatar">
				<img alt="avatar" id="avatar" src="<?= AVATAR ?><?= $photo_3_avatar ?>&headonly=1&direction=2&action=std,crr=47" />
			</div>
			
			<div class="author"><span><?= $photo_3_username ?></span></div>
		</div>

			<div class="photocontent">
				<div class="photoimage three" src="<?= $photo_3_url ?>" style="background-image:url(<?= $photo_3_url ?>)"></div>
		</div>
		</div>
</div>

<div class="photoglobal">
			<div class="boxphoto for">
						<div class="boxauthor">
			<div class="authoravatar">
				<img alt="avatar" id="avatar" src="<?= AVATAR ?><?= $photo_4_avatar ?>&headonly=1&direction=2&action=std,crr=47" />
			</div>
			
			<div class="author"><span><?= $photo_4_username ?></span></div>
		</div>

			<div class="photocontent">
				<div class="photoimage for" src="<?= $photo_4_url ?>" style="background-image:url(<?= $photo_4_url ?>)"></div>
		</div>
		</div>
			<div class="boxphoto five">
						<div class="boxauthor">
			<div class="authoravatar">
				<img alt="avatar" id="avatar" src="<?= AVATAR ?><?= $photo_5_avatar ?>&headonly=1&direction=2&action=std,crr=47" />
			</div>
			
			<div class="author"><span><?= $photo_5_username ?></span></div>
		</div>

			<div class="photocontent">
				<div class="photoimage five" src="<?= $photo_5_url ?>" style="background-image:url(<?= $photo_5_url ?>)"></div>
		</div>
		</div>
			<div class="boxphoto six">
						<div class="boxauthor">
			<div class="authoravatar">
				<img alt="avatar" id="avatar" src="<?= AVATAR ?><?= $photo_6_avatar ?>&headonly=1&direction=2&action=std,crr=47" />
			</div>
			
			<div class="author"><span><?= $photo_6_username ?></span></div>
		</div>

			<div class="photocontent">
				<div class="photoimage six none" src="<?= $photo_6_url ?>" style="background-image:url(<?= $photo_6_url ?>)"></div>
		</div>
		</div>

</div>

		</div>

 		
		</div>


	</div>	

	<?php
        }
include ROOTDIR . '/app/templates/footer.php';

?>
<?php
include 'global.php';
define('JS', 'index');

$_GET['page'] = "index";

if ($user->isOnline()) {
    
    if(isset($_GET['keydo']) && isset($_GET['email']) && isset($_GET['idd']))
    {
        $system->redirect('me?keydo='.$_GET['keydo'].'&email='.$_GET['email'].'&idd='.$_GET['idd']);
    } else {
        $system->redirect('me');
    }   
   
} else {
    $tentatives = $user->CheckLoginError();
 	include ROOTDIR . '/app/actions/login_noajax.php';
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
        <link rel='icon' type='image/png' href='<?= ASSETSURL; ?>img/hvfavicon.png'/>
    <title><?= sitename ?>: Créez votre Habbo, décorez votre appartement ! Tchattez avec vos amis.</title>
        <?= $html->meta(); ?>
	<link rel="stylesheet" href="<?= ASSETSURL ?>css/global.css?v=<?= time() ?>">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
</head>
<body>
	
<?php
    if (isset($error) && $error)
        echo "<div class='error e_top " . $class . "'>" . $message . "</div>";
 ?>


<div class="header">
<div class="center">

	<div class="logo">
		<img src="<?= ASSETSURL ?>img/logo-anime.gif">
		<div class="onlinecount">
	<span>Hotel en ligne</span>
	</div>
	</div>
</div>	
</div>

<div class="corp index">
	<div class="center">

			<div class="boxco">
				<form class="loginform" name="login" action="<?= URL; ?>" method="post">
					<div class="inputbox">
						<div class="avatarpseudo"><img alt="avatar" id="avatarimg" src="<?= AVATAR ?>&headonly=1&direction=2&size=s&action=std,crr=47" /></div>
						<input type="text" class="pseudonyme" name="mailornick" placeholder="Pseudo ou email">
					</div>

					<div class="inputbox">
						<div class="avatar"><img alt="avatar" id="avatar" src="<?= ASSETSURL ?>img/Layer 53.png" /></div>
						<input type="password" name="password" placeholder="Mot de passe">
					</div>

					<input type="submit" class="buttondex" name="send" value="CONNEXION"/>
					<a href="./register.php"><div class="buttondex"><div class="traitbutton"></div>INSCRIPTION</div></a>

				</form>
		</div>


		<div class="bloc">
		<div class="title-bloc"><span>Les derniers articles</span></div>


		<div class="newsglobal">
		<?php
		$req = $db->connect()->prepare('SELECT * FROM site_news WHERE attente = ? AND timestamp < ? ORDER BY timestamp DESC LIMIT 3');
		$req->execute([0, time()]);
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



 		
		</div>


	</div>	

		    <?php   
}
include ROOTDIR . '/app/templates/footer.php';

?>
    <script type="text/javascript" src="<?= ASSETSURL ?>js/jquery.avatar.js?<?php echo time() ?>"></script>
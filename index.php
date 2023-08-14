<?php 
$is_maintenance = true;

include 'global.php'; 

$_GET['page'] = 'maintenance';


if($user->isOnline() && $user->get('rank') >= 5) {
	$system->redirect('me');
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel='icon' type='image/png' href='<?= ASSETSURL; ?>img/hvfavicon.png'/>
	<title>ViceHabbo : Maintenance</title>
	<link rel="stylesheet" href="<?= ASSETSURL ?>css/maintenance.css?v=<?= time() ?>">
	<link rel="stylesheet" href="<?= ASSETSURL ?>css/remodal.css?<?= time() ?>">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
</head>
<body>


	<div class="headerm">

		<div class="centerm">
		
		<a class="homem" href="#">Accueil</a>

		<a href="./#login" class="loginbuttonm">Admin Login</a>

		</div>

	</div>
	<div class="bodym">
	<div class="centerm"> 

		<div class="logom" style="margin-top: 92px;"> <img src="./app/assets/img/logo-anime.gif"> </div>

		<div class="maintenance-txt">
		<p>
		Habbovice est actuellement en développement. <b>L'équipe s'engage à préparer un projet digne de ce nom.</b>
		</p>
		<br>
		<p>Obtenez des informations instantanées sur les développements en <br>nous suivant sur <b>les réseaux sociaux.</b></p>
	
		</div>

	<div class="socialm">
		<a href="https://discord.gg/CJG8kuuNac"><img src="./app/assets/img/discordm.png"></a>

		<a href="https://discord.gg/vicehabbo"><img src="./app/assets/img/twitterm.png"></a>

		<a href="https://www.youtube.com/@vicehabbo_"><img src="./app/assets/img/youtubem.png"></a>
	</div>

	</div>
<div class="rightimg"></div>
	
	</div>


	<div class="footerm">

	<div class="centerm">
  <div class="footerposition">
    <div class="footerlogo">
      <img src="<?= ASSETSURL; ?>img/footerlog.png">
    </div>
    <div class="footerpositioncopyright">
      <div class="footercopyright">
      <span><b style="color:#8e56ab">Vice</b>CMS by</span> <b style="color:#8e56ab">Stown</b><br>
      <span>All rights reserved by HabboVice</span><br>
      <span>This website is not owned or operated by Sulake Oy and is not part of Habbo Hotel.</span>
    </div>
    </div>
  </div>
	</div>

	</div>


	<div class="remodal" id="adminloginbox" data-remodal-id="login" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
            <div class="logine">

       
            <div class="side">
            	<div class="minilogom">
            		<img src="./app/assets/img/minim.png">
            	</div>
            	<div class="mininame">ViceLogin</div>

				<form method="post">

					<div class="mtitle">Pseudonyme</div>
					<div class="inputbox">
						<div class="avatarpseudo"><img alt="avatar" id="avatarimg" src="<?= AVATAR ?>&headonly=1&direction=2&size=s&action=std,crr=47" /></div>
						<input type="text" class="pseudonyme" id="pseudo_1" name="mailornick" placeholder="Pseudo ou email">
					</div><br>
					<div class="mtitle">Mot de passe</div>
					<div class="inputbox">
						<div class="avatar"><img alt="avatar" id="avatar" src="<?= ASSETSURL ?>img/Layer 53.png" /></div>
						<input type="password" name="password" id="password_1" placeholder="Mot de passe">
					</div>

					<button type="submit" id="sub_1" class="buttondex" >CONNEXION</button>

				</form>
            	
            </div>

            <div class="side">
            	<img alt="avatar" id="avatarimg" src="<?= AVATAR ?>&direction=3&size=l&action=std" />
            </div>

			



            </div>

            </div>

<script type="text/javascript">
        var siteUrl = "<?= URL ?>";

        const link = '<?= URL ?>'
        const views = link + 'app/views/'
        const actions = link + 'app/actions/'
        const api = link + 'app/api/'
        const sitename = '<?= sitename ?>'
        const avatar = '<?= AVATAR ?>'
    </script>


<script type="text/javascript" src="<?= ASSETSURL ?>js/jquery.min.js?<?php echo time() ?>"></script>
	<script type="text/javascript" src="<?= ASSETSURL ?>js/remodal.min.js?<?php echo time() ?>"></script>
	<script type="text/javascript" src="<?= ASSETSURL ?>js/jquery.avatarm.js?<?php echo time() ?>"></script>
		<script type="text/javascript" src="<?= ASSETSURL ?>js/jquery.maintenance.js?<?php echo time() ?>"></script>

</body>
</html>
<?php
if(!isset($issession))
{
	session_start();
}	

	if (isset($_GET['bye']) && $_GET['bye'] == 1) {
		$user->end();
		return;
	}

		// Ban IP
	if ($_GET['page'] != 'ban') {		
	$queryban = $db->connect()->prepare('SELECT id FROM bans WHERE ip = ?');
	$queryban->execute([$_SERVER['REMOTE_ADDR']]);	

		if ($queryban->rowCount() > 0) {
		   $system->redirect('ban'); 	  
		}
	}

	if ($user->isOnline()) {
    // token Update
    if (time() > $user->get('token_times') + 2000) {
        $query73 = $db->connect()->prepare('UPDATE users SET token = ?, token_times = ? WHERE id = ?');
        $query73->execute([$user->token(100), TIME, $user->get('id')]);
		
		 // Mise à jour en même temps du token de la session
		$user->updatesession();
    }

    // Ban Username
    if ($_GET['page'] != 'ban') {		
		
		$query75ban = $db->connect()->prepare('SELECT COUNT(*) FROM bans WHERE user_id = ?');
        $query75ban->execute([$user->get('id')]);
        $count75ban = $query75ban->fetchColumn();

        if ($count75ban > 0) {
            $user->end();			
        }
    }

        //secu staff & code pin
    if ($user->get('rank') >= 15) {
        $selectipstaff = $db->connect()->prepare('SELECT * FROM ip_staff WHERE user_id = ?');
        $selectipstaff->execute([$user->get('id')]);

        if ($selectipstaff->rowCount() == 0 || !isset($_COOKIE['securite'])) {
			$add->Log('IPSTAFF', '4029 WEB');
            $user->end();
        }

        $donnees = $selectipstaff->fetchAll();

        if ($_COOKIE['securite'] != $donnees[0]['token']) {
			$add->Log('IPSTAFF', '4026 WEB');
            $user->end();
        }

        $istaff = 0;

        if ($_SERVER['REMOTE_ADDR'] == $donnees[0]['ip']) {
					$istaff = 1;
         }
		
        if ($istaff == 0) {
            $user->end();
        }
    }
	
  

        }
        
?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel='icon' type='image/png' href='<?= ASSETSURL; ?>img/hvfavicon.png'/>
    <title><?= ($_GET['page'] != 'forum' && $_GET['page'] != 'room' && $_GET['page'] != 'news' ? "".sitename.": " : "").TITLE; ?></title>
        <?= $html->meta(); ?>
    <link rel="stylesheet" href="<?= ASSETSURL ?>css/global.css?v=<?= time() ?>">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
  </head>

<body>

<div class="header">
<div class="center">

    <div class="logo">
        <img src="<?= ASSETSURL ?>img/logo-anime.gif">
        <div class="onlinecount">
    <span>Hotel en ligne !</span>
    </div>
    </div>




</div>  
</div>

<div class="corp">
    <div class="center">
    <div class="navigator">

        <div class="menu">
        <ul class="center">

        <li class="perso persouser">
        <img src="<?= AVATAR ?><?= $user->get('look') ?>&direction=2&action=std&headonly=1">
        <div class="username"><?= $user->get('username') ?> <div class="arrowusername"></div></div>
             <ul class="submenunavig">
                <li><a href="<?= URL ?>settings.php">Paramètres</a></li>
               <?php if ($user->get('rank') >= 5){ ?> <li><a href="<?= ADMINURL ?>">Administration</a></li><?php } ?>
             </ul>
         </li>

    <li class="<?php if ($_GET['page'] == "me") { echo "li-active"; } ?>"><a class="link" href="<?= URL ?>me.php">Accueil</a></li>
    
    <li class="<?php if ($_GET['page'] == "community" || $_GET['page'] == "news") { echo "li-active"; } ?>"><a class="link" href="<?= URL ?>community.php">Communauté</a></li>

    <li class="<?php if ($_GET['page'] == "team") {echo "li-active";} ?>"><a class="link" href="<?= URL ?>team.php">Staff</a></li>

    <li class="<?php if ($_GET['page'] == "palmares") {echo "li-active";} ?>"><a class="link" href="<?= URL ?>palmares.php">Classement</a></li>

        <li class="<?php if ($_GET['page'] == "boutique") {echo "li-active";} ?>"><a class="link" href="<?= URL ?>boutique.php">Boutique</a></li>
        </ul>


        <div class="right-link">

        <a href="<?= URL ?>hotel"><div class="buttondex"><div class="traitbutton"></div>ENTRER</div></a>

        <a href="<?= URL . $_GET['page']; ?>?bye=1"><div class="buttondex red"><div class="traitbutton red"></div>DECONNEXION</div></a>

    </div>


    </div>

    </div>

    <?php if($notify_maintenance){ ?>
<div class="error" style="margin-bottom:5px;"><b>Alerte :</b> Le site est actuellement en maintenance</div>
<?php } ?>
  
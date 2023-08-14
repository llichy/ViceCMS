<?php 
include 'global.php'; 
    if (!$user->isOnline()) {
        $system->redirect('index');
    } else {

	define('JS', 'settings');
	define('TITLE', 'Configurations');
	define('DESCRIPTION', 'Voici mon profil');
	$_GET['page'] = 'settings';
	include ROOTDIR . '/app/actions/settings_noajax.php';

include ROOTDIR . '/app/templates/header.php';



?>

	<?php
		if (isset($error) && $error && isset($type) && $type == 'errblok')
		echo "<div class='error " . $class . "'>
		<div class='container'>
		<div class='errorprogress'></div>
		<div class='errormessage'>
		" . $message . "
		</div> </div>
		</div>
		";
		?>

<div class="bloc" style="display:flex;justify-content: space-between;">



<div class="bloc_settings"><div class="settings_pos">

<div class="settings_profil">

	<div class="avatarbg">

		<div class="avatarusername"><span><?= $user->get('username'); ?></span></div>
	
		<div class="settingsavatar">
			<img src="<?= AVATAR ?><?= $user->get('look'); ?>&direction=3&action=std&size=l">
		</div>
	</div>
<div class="settings_currency">

<div class="currencies cred">
<div class="currencyimg"><img src="<?= ASSETSURL ?>img/xpvice.png"></div>
<div class="currencytext"><span><?= $system->NumberFormat($user->get('ls_experience')); ?></span></div>
</div>

<div class="currencies ducks">
<div class="currencyimg"><img src="<?= ASSETSURL ?>img/ducketvice.png"></div>
<div class="currencytext"><span><?= $system->NumberFormat($user->getcurrency('amount', 0)); ?></span></div>
</div>

<div class="currencies diams">
<div class="currencyimg"><img src="<?= ASSETSURL ?>img/diamvice.png"></div>
<div class="currencytext"><span><?= $system->NumberFormat($user->getcurrency('amount', 5)); ?></span></div>
</div>

</div>
</div>

</div></div>	

<div class="bloc_settings" style="height: 225px;">


	<div class="title-bloc">
	<span>Change ton mot de passe</span>
	</div>
	<div class="settings_pos mdpmail">
<form method="post" name="password" action="">
	<div class="settinsubtitle">Ton mot de passe actuel</div>
	<div class="inputbox">
	<div class="avatar"><img alt="avatar" id="avatar" src="<?= ASSETSURL ?>img/Layer 53.png" /></div>
	<input type="hidden" name="type" value="password"/>
	<input type="password" name="newpass" placeholder="Mot de passe actuel">
	</div>

	<div class="settinsubtitle">Ton nouveau mot de passe</div>
	<div class="inputbox">
	<div class="avatar"><img alt="avatar" id="avatar" src="<?= ASSETSURL ?>img/Layer 53.png" /></div>
	<input type="password" name="newpass_v" placeholder="Nouveau mot de passe">
	</div>

<input type="submit" class="buttondex setting" value="Enregistrer">
 </form>
</div>
</div>



<div class="bloc_settings" style="height: 350px;">
			<div class="title-bloc">
			<span>Change ton adresse mail</span>
		</div>

	<div class="settings_pos mdpmail">
<form method="post" name="mail" action="">
	

							<div class="settinsubtitle">Ton adresse mail actuel</div>
							<div class="inputbox">
								<div class="avatar"><img alt="avatar" id="avatar" src="<?= ASSETSURL ?>img/mail.gif" /></div>
								<input type="text" name="mailzer" disabled value="<?= $user->get('mail'); ?>" placeholder="<?= $user->get('mail'); ?>">
							</div>

														<div class="settinsubtitle">Ta nouvelle adresse mail</div>
							<div class="inputbox">
								<div class="avatar"><img alt="avatar" id="avatar" src="<?= ASSETSURL ?>img/mail.gif" /></div>
								<input type="hidden" name="type" value="mail"/>
								<input type="text" name="newmail" value="<?= @$_POST['newmail']; ?>" placeholder="Nouvelle adresse mail">
							</div>

<input type="submit" class="buttondex setting" name="" value="Enregistrer">
 </form>


</div>


<div class="choice">
	<span>Recevoir les demandes d'amis </span> 
<?php if ($user->getSettings('block_friendrequests') == 1) { echo "<div tyoe='block_friendrequests' class='switch_set activate'>Activé</div>"; } else { echo "<div tyoe='block_friendrequests' class='switch_set inactivate'>Désactivé</div>"; } ?>
</div>

<div class="choice">
	<span>Me rejoindre dans l'appart ou je me trouve</span> 
<?php if ($user->getSettings('block_following') == 1) { echo "<div tyoe='block_following' class='switch_set activate'>Activé</div>"; } else { echo "<div tyoe='block_following' class='switch_set inactivate'>Désactivé</div>"; } ?>
</div>

<div class="choice">
	<span>Bloquer les alertes</span> 
<?php if ($user->getSettings('block_alerts') == 1) { echo "<div tyoe='block_alerts' class='switch_set activate'>Activé</div>"; } else { echo "<div tyoe='block_alerts' class='switch_set inactivate'>Désactivé</div>"; } ?>
</div>

</div>


</div>	


<div class="bloc">


<div class="settings_useritem">

	<div class="settingsitem_bloc">
		<div class="title-bloc">
			<span>Mes Badges
<?php
$queryi = $db->connect()->prepare('SELECT * FROM users_badges WHERE user_id = ?');
$queryi->execute([$user->get('id')]);
$fetchi = $queryi->fetchAll();
$nombre = count($fetchi);
?>

(<?= $nombre ?>)
			</span>
		</div>


			<div class="bloc_item badge">
				<div class="bloc_item_pos">

					<div class="badge_bg"></div>

					<div class="settings_badgelist">
		<?php
		$badgeurl = ''.URL.'swf/c_images/album1584/';
		$query = $db->connect()->prepare('SELECT * FROM users_badges WHERE user_id = ? ORDER BY id DESC');
		$query->execute([$user->get('id')]);

		$fetch = $query->fetchAll();

		if (count($fetch) < 1) {
		?>
		<div class="error">
		Tu n'as aucun badge pour le moment
		</div>
		<?php
		} else {
		for ($i = 0; $i < count($fetch); $i++) {
		$badgeid = $fetch[$i]['badge_code'];
		?>
		<div class="badgelist"><img src="<?= $badgeurl . $badgeid; ?>.gif"></div>
		<?php
		}
		}
		?>

					</div>


				</div>

			</div>

	</div>

	<div class="settingsitem_bloc">
		<div class="title-bloc">
			<span>Mes Apparts
<?php
$queryi = $db->connect()->prepare('SELECT * FROM rooms WHERE owner_id = ?');
$queryi->execute([$user->get('id')]);
$fetchi = $queryi->fetchAll();
$nombre = count($fetchi);
?>

(<?= $nombre ?>)
			</span>
		</div>


			<div class="bloc_item">
				<div class="bloc_item_pos">
					
					<div class="settings_roomlist">
								<?php
		$badgeurl = ''.URL.'swf/c_images/album1584/';
		$query = $db->connect()->prepare('SELECT * FROM rooms WHERE owner_id = ? ORDER BY id DESC');
		$query->execute([$user->get('id')]);

		$fetch = $query->fetchAll();

		if (count($fetch) < 1) {
		?>
		<div class="error">
		Tu n'as aucun appart pour le moment
		</div>
		<?php
		} else {
		for ($i = 0; $i < count($fetch); $i++) {
		$caption = $fetch[$i]['name'];
		$desc = $fetch[$i]['description'];
		?>
					<div class="roomlist">
						
					<div class="roomicon"><img src="<?= ASSETSURL ?>img/roomicon.png"></div>
					<div class="roomcaption">
						<span>Appart <?= $caption ?> : <?= $desc ?></span>
					</div>

					</div>
		<?php
		}
		}
		?>
					</div>

				</div>
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
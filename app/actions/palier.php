<?php

include '../../global.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

$query = $db->connect()->prepare('SELECT online_time,users.username,users.gift_one,users.gift_two,users.gift_three,users.gift_four FROM users_settings INNER JOIN users ON users_settings.user_id = users.id WHERE users.id = ?');
$query->execute([$user->get('id')]);
$fetch5 = $query->fetchAll();



$onlinetime= intval(abs($fetch5[0]['online_time'] / 3600));
$level = $system->getPalierLevel($onlinetime);
?>

<link rel="stylesheet" type="text/css" href="<?= ASSETSURL ?>css/palier.css?v=<?= time() ?>">
<div class="palierload" id="settings16" style="transform: scale(1); transition: 0.4s; display: block;">
   <div onclick="ClosePalier()" id="fermeture2"></div>
<link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
<div class="palier">
	
	<div class="palier_content" style="width: 98%; margin-left: auto; margin-right: auto; height: 380px;margin-top:10px;">
		
		<div class="prochaine_recompense">
			<span style="color:white;"><?php if($fetch5[0]['gift_one'] == "1" && $fetch5[0]['gift_two'] == "1" && $fetch5[0]['gift_three'] == "1" && $fetch5[0]['gift_four'] == "1") { ?>Tu as validé tous les niveaux. <?php } else { ?> Tu es au niveau <?= $level['lvl'] ?><?php } ?></span>
			<br>

<div class="palier_player_info">
	<div class="palier_username"><?= $user->get('username') ?></div> <br>

	<div class="palier_bg">
		<div class="palier_avatar">
			<img src="<?= AVATAR ?><?= $user->get('look') ?>&direction=3&action=std&head_direction=3&headonly=1&size=l">
		</div>
	</div>
</div>

	<div class="palier_currency">
		<div class="paliercurrency"><img src="<?= ASSETSURL ?>img/diam.gif"> <span class="diamonds"><?= $user->getcurrency('amount', 5); ?> diamants</span></div>
		<div class="paliercurrency"><img src="<?= ASSETSURL ?>img/token.png"> <span class="tokens"><?= $user->get('tokens') ?> tokens</span></div>
	</div>	


		</div>


		<div class="palier_separation"></div>

		<div class="palier_progression">
			<div class="progression">

				<progress value="<?= $fetch5[0]['online_time']; ?>" max="<?= $level['xpNxtLvl']; ?>"></progress>
				<div class="exp"><?= $onlinetime; ?> heures de connexion (LVL <?= $level['lvl'] ?>)</div>
<div class="error" style="font-size:14px;"></div>
<div class="success" style="font-size:14px;"></div>
			</div>
		</div>


		<div class="palier_progress">
			<div class="palier_rectangle"></div>

			<div class="palier_sage">
								<div class="sage">
                                    <div class="lvltitle tw">LVL 5</div>
					<div class="cercle tw">
						<img src="<?= ASSETSURL ?>img/keypalier.png">
<?php if($fetch5[0]['gift_one'] == 1) { ?><div class="recu" style="display:block"></div><?php }else{ ?><div class="recu"></div><?php } ?>
         
					</div>
					<div class="little_text tw">2 Clefs</div>

<?php if ($fetch5[0]['online_time'] >= 90000 && $fetch5[0]['gift_one'] == 0) { ?>                
<input type="hidden" id="sonid" value="1" >
<input type="hidden" id="token" value="<?= $user->get('token') ?>">
<div class="submit" onclick="GetPalier()">Récuperer mon cadeau</div>
<?php } ?> 
				</div>
				<div class="sage">
                    <div class="lvltitle to">LVL 10</div>
					<div class="cercle to">
						<img src="<?= ASSETSURL ?>img/Layer 56.png">
<?php if($fetch5[0]['gift_two'] == 1) { ?><div class="recu" style="display:block"></div><?php }else{ ?><div class="recu"></div><?php } ?>
					</div>
					<div class="little_text to">3 Vicetokens</div>
<?php if ($fetch5[0]['online_time'] >= 198000 && $fetch5[0]['gift_two'] == 0) { ?>                  
<input type="hidden" id="sonid" value="2" >
<input type="hidden" id="token" value="<?= $user->get('token') ?>" name="hide">
<div class="submit" onclick="GetPalier()">Récuperer mon cadeau</div>
<?php } ?> 
				</div>
				<div class="sage">
                    <div class="lvltitle tt">LVL 15</div>
					<div class="cercle tt">
						<img src="<?= ASSETSURL ?>img/vicePremium.png">
                        <?php if($fetch5[0]['gift_three'] == 1) { ?><div class="recu" style="display:block"></div><?php }else{ ?><div class="recu"></div><?php } ?>
					</div>
					<div class="little_text tt">7 jours Prem</div>
    <?php if ($fetch5[0]['online_time'] >= 288000 && $fetch5[0]['gift_three'] == 0) { ?>                  
<input type="hidden" id="sonid" value="3" >
<input type="hidden" id="token" value="<?= $user->get('token') ?>" name="hide">
<div class="submit" onclick="GetPalier()">Récuperer mon cadeau</div>
<?php } ?> 
				</div>
				<div class="sage">
                    <div class="lvltitle tr">LVL 20</div>
					<div class="cercle tr">
						<img src="<?= ASSETSURL ?>img/Layer 63.png">
                        <?php if($fetch5[0]['gift_four'] == 1) { ?><div class="recu" style="display:block"></div><?php }else{ ?><div class="recu"></div><?php } ?>
					</div>
					<div class="little_text tr">1 Legendery Chest</div>
  <?php if ($fetch5[0]['online_time'] >= 381600 && $fetch5[0]['gift_four'] == 0) { ?>                  
<input type="hidden" id="sonid" value="4" >
<input type="hidden" id="token" value="<?= $user->get('token') ?>" name="hide">
<div class="submit" onclick="GetPalier()">Récuperer mon cadeau</div>
<?php } ?>                  
				</div>
			</div>
		</div>

	</div>

</div>

</div>

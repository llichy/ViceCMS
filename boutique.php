<?php 
include 'global.php'; 
    if (!$user->isOnline()) {
        $system->redirect('index');
    } else {

	define('JS', 'shop');
	define('TITLE', 'Boutique');
	define('DESCRIPTION', 'Voici mon profil');
	$_GET['page'] = 'boutique';

	include ROOTDIR . '/app/templates/header.php';


?>


<div class="bloc">

<div class="solde">
	<span>Tu as <?= $user->get('tokens') ?> ViceTokens <img src="<?= ASSETSURL ?>img/token.png"> </span>
</div>


</div>	

<div class="bloc">


<div class="shopleft">

<!-- Token -->
	<div class="shopbox">
			<div class="shopboxpos">
					<div class="boxbg">
							<div class="boxbgleft">
							<img src="<?= ASSETSURL ?>img/vicetoken.png">
							</div>
							<div class="boxbgright">
							<img src="<?= ASSETSURL ?>img/fondbox.png">
							</div>
					</div>
					<div class="shopprice">
						<span>ViceToken</span>
					</div>
					<div class="shopdesc">
						<span>Tu peux acheter des packs avec les ViceTokens</span>
					</div>
					<div class="shophr"></div>
						<div class="shopbutton"><div onclick="ShopLoad('Achat de ViceTokens','<?= URL ?>app/actions/load/Shop.php?type=token');" class="buttondex"><span>Voir</span></div>
					</div>
			</div>
	</div>
<!-- Fin Token -->

<!-- Normal Chest -->
	<div class="shopbox">
			<div class="shopboxpos">
					<div class="boxbg">
							<div class="boxbgleft">
							<img src="<?= ASSETSURL ?>img/chestshop.png">
							</div>
							<div class="boxbgright">
							<img src="<?= ASSETSURL ?>img/fondddchest.png">
							</div>
					</div>
					<div class="shopprice">
						<span>Coffres</span>
					</div>
					<div class="shopdesc">
						<span>Tu peux acheter des coffres avec les ViceTokens</span>
					</div>
					<div class="shophr"></div>
						<div class="shopbutton"><div onclick="ShopLoad('Achat de Coffres','<?= URL ?>app/actions/load/Shop.php?type=coffre');" class="buttondex"><span>Voir</span></div>
					</div>
			</div>
	</div>
<!-- Fin Normal Chest -->

<!-- Achievement Points -->
	<div class="shopbox">
			<div class="shopboxpos">
					<div class="boxbg">
							<div class="boxbgleft">
							<img src="<?= ASSETSURL ?>img/xp.png">
							</div>
							<div class="boxbgright">
							<img src="<?= ASSETSURL ?>img/fonndndxp.png">
							</div>
					</div>
					<div class="shopprice">
						<span>Point d'experience</span>
					</div>
					<div class="shopdesc">
						<span>Tu peux acheter de l'XP avec les ViceTokens</span>
					</div>
					<div class="shophr"></div>
						<div class="shopbutton"><div onclick="ShopLoad('Achat de XP','<?= URL ?>app/actions/load/Shop.php?type=xp');" class="buttondex"><span>Voir</span></div>
					</div>
			</div>
	</div>
<!-- Fin Achievement Points -->

<!-- Diamonds -->
	<div class="shopbox">
			<div class="shopboxpos">
					<div class="boxbg">
							<div class="boxbgleft">
							<img src="<?= ASSETSURL ?>img/diamant.png">
							</div>
							<div class="boxbgright">
							<img src="<?= ASSETSURL ?>img/fonddiams.png">
							</div>
					</div>
					<div class="shopprice">
						<span>Diamants</span>
					</div>
					<div class="shopdesc">
						<span>Tu peux acheter des Diamants avec les ViceTokens</span>
					</div>
					<div class="shophr"></div>
						<div class="shopbutton"><div onclick="ShopLoad('Achat de Diamants','<?= URL ?>app/actions/load/Shop.php?type=diamant');" class="buttondex"><span>Voir</span></div>
					</div>
			</div>
	</div>
<!-- Fin Diamonds -->

<!-- Badge -->
	<div class="shopbox">
			<div class="shopboxpos">
					<div class="boxbg">
							<div class="boxbgleft">
							<img src="<?= ASSETSURL ?>img/badgeshop.png">
							</div>
							<div class="boxbgright">
							<img src="<?= ASSETSURL ?>img/fondbadge.png">
							</div>
					</div>
					<div class="shopprice">
						<span>Badge</span>
					</div>
					<div class="shopdesc">
						<span>Tu peux acheter des badges avec les ViceTokens</span>
					</div>
					<div class="shophr"></div>
						<div class="shopbutton"><div onclick="ShopLoad('Achat de Badges','<?= URL ?>app/actions/load/Shop.php?type=badge');" class="buttondex"><span>Voir</span></div>
					</div>
			</div>
	</div>
<!-- Fin Badge -->


<!-- Premium -->
	<div class="shopbox">
			<div class="shopboxpos">
					<div class="boxbg">
							<div class="boxbgleft">
							<img src="<?= ASSETSURL ?>img/VPRE.gif">
							</div>
							<div class="boxbgright">
							<img src="<?= ASSETSURL ?>img/fondbox.png">
							</div>
					</div>
					<div class="shopprice">
						<span>Premium</span>
					</div>
					<div class="shopdesc">
						<span>Tu peux acheter le Premium avec les ViceTokens</span>
					</div>
					<div class="shophr"></div>
						<div class="shopbutton"><div onclick="ShopLoad('Achat du Premium','<?= URL ?>app/actions/load/Shop.php?type=premium');" class="buttondex"><span>Voir</span></div>
					</div>
			</div>
	</div>
<!-- Fin Premium -->




	
</div>


<div class="shopright">
		<img src="<?= ASSETSURL ?>img/WelcometoViceShop.png">
</div>



</div>	


</div>	
</div>	
<div id="shopload"></div>
<div id="b41"></div>
<div id="b42"></div>
<div id="b43"></div>
	<?php
        }
include ROOTDIR . '/app/templates/footer.php';

?>
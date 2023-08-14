<?php 
require_once '../../../global.php';

    if (!$user->isOnline()) {
        $system->redirect('index');
    } 


$type = $_GET['type'];
?>
 		<div onclick="PageClose();" style="float: right; top: 90px; z-index: 999; right: 625px; position: relative; cursor:pointer" class="buttondex red">Fermer la fenêtre</div>
<?php $messageErr = null;$classErr = null;?>
<div <?= (!empty($error) && $error && $type == '' ? "" : "style='display:none;'"); ?> class="errorshop <?= (isset($classErr) ? $classErr : null); ?>"><?= $message; ?></div>
 <?php if($type == "token"){ ?>
<div class="loadshoppos load">
	         
<!--<script src="//api.dedipass.com/v1/pay.js"></script>
<div data-dedipass="90b1df9d708cf8ab5de6c9899f429eb0" style="width: 100%; border: 0px solid transparent; height: 217px;" data-dedipass-custom=""></div>-->
<style type="text/css">
	.dedipasszone {
    position: absolute;
    
    width: 825px;
    left: 0;
    z-index: 99999;
}

</style>
      <script type="text/javascript">
        function setIframeHeight(height) {
          if (height != $("#shop-iframe-api").height()) {
            $("#shop-iframe-api").height(height);
          }
        }
      </script>
      <div class="dedipasszone">
        <iframe src="<?= URL ?>externalapi/dedipass/get" id="shop-iframe-api" style="width:100%;border:0px solid transparent;height:210px;"></iframe>
      </div>
 <?php }elseif($type == "coffre"){ ?>

 	<div class="loadshoppos load">
	         

	<div class="shopbox load">
		
	<div class="shopboxpos">
		
		<div class="boxbg">
			<div class="boxbgleft">
				<img class="coffre" src="<?= ASSETSURL ?>img/coffre1.png">
			</div>
				<div class="boxbgright">
					<img src="<?= ASSETSURL ?>img/fondbox.png">
				</div>
		</div>

		<div class="shopprice">
			<span>5 ViceToken</span>
		</div>

		<div class="shopdesc">
			<span>You can buy packages and more with ViceTokens</span>
		</div>

		<div class="shophr"></div>

			<div class="shopbutton"><a class="buttondexe" id="coffre" coffre="1" token="<?= $user->get('token'); ?>"><span>Acheter</span></a>
		</div>

	</div>

	</div>

		<div class="shopbox load">
		
	<div class="shopboxpos">
		
		<div class="boxbg">
			<div class="boxbgleft">
				<img class="coffre" src="<?= ASSETSURL ?>img/coffre2.png">
			</div>
				<div class="boxbgright">
					<img  src="<?= ASSETSURL ?>img/fondbox.png">
				</div>
		</div>

		<div class="shopprice">
			<span>10 ViceToken</span>
		</div>

		<div class="shopdesc">
			<span>You can buy packages and more with ViceTokens</span>
		</div>

		<div class="shophr"></div>

			<div class="shopbutton"><a class="buttondexe" id="coffre" coffre="2" token="<?= $user->get('token'); ?>"><span>Acheter</span></a>
		</div>

	</div>

	</div>

		<div class="shopbox load">
		
	<div class="shopboxpos">
		
		<div class="boxbg">
			<div class="boxbgleft">
				<img class="coffre" src="<?= ASSETSURL ?>img/coffre3.png">
			</div>
				<div class="boxbgright">
					<img src="<?= ASSETSURL ?>img/fondbox.png">
				</div>
		</div>

		<div class="shopprice">
			<span>20 ViceToken</span>
		</div>

		<div class="shopdesc">
			<span>You can buy packages and more with ViceTokens</span>
		</div>

		<div class="shophr"></div>

			<div class="shopbutton"><a class="buttondexe" id="coffre" coffre="3" token="<?= $user->get('token'); ?>"><span>Acheter</span></a>
		</div>

	</div>

	</div>


</div>


 <?php }elseif($type == "xp"){ ?>
	<div class="loadshoppos load">
	         

	<div class="shopbox load">
		
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
			<span>2000 XP</span>
		</div>

		<div class="shopdesc">
			<span>Tu peux l'acheter avec les ViceTokens !</span>
		</div>

		<div class="shophr"></div>

		<div class="shopbutton"><a class="buttondexe" id="xp" xpp="1" token="<?= $user->get('token'); ?>"><span>1 Tokens</span></a></div>
		

	</div>

	</div>

		<div class="shopbox load">
		
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
			<span>6000 XP</span>
		</div>

		<div class="shopdesc">
			<span>Tu peux l'acheter avec les ViceTokens !</span>
		</div>

		<div class="shophr"></div>

		<div class="shopbutton"><a class="buttondexe" id="xp" xpp="2" token="<?= $user->get('token'); ?>"><span>3 Tokens</span></a></div>
		

	</div>

	</div>

		<div class="shopbox load">
		
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
			<span>10000 XP</span>
		</div>

		<div class="shopdesc">
			<span>Tu peux l'acheter avec les ViceTokens !</span>
		</div>

		<div class="shophr"></div>

		<div class="shopbutton"><a class="buttondexe" id="xp" xpp="3" token="<?= $user->get('token'); ?>"><span>5 tokens</span></a></div>
		

	</div>

	</div>

</div>


	 <?php }elseif($type == "diamant"){ ?>

	 	 	 <div class="loadshoppos load">

<div class="shopbox load">
		
	<div class="shopboxpos">
		
		<div class="boxbg">
			<div class="boxbgleft">
				<img src="<?= ASSETSURL ?>img/diams.png">
			</div>
				<div class="boxbgright">
					<img src="<?= ASSETSURL ?>img/fonndndxp.png">
				</div>
		</div>

		<div class="shopprice">
			<span>300 Diamants</span>
		</div>

		<div class="shopdesc">
			<span>Tu peux l'acheter avec les ViceTokens !</span>
		</div>

		<div class="shophr"></div>

		<div class="shopbutton"><a class="buttondexe" id="diams" diams="1" token="<?= $user->get('token'); ?>"><span>5 Tokens</span></a></div>
		

	</div>

	</div>

		<div class="shopbox load">
		
	<div class="shopboxpos">
		
		<div class="boxbg">
			<div class="boxbgleft">
				<img src="<?= ASSETSURL ?>img/diams.png">
			</div>
				<div class="boxbgright">
					<img src="<?= ASSETSURL ?>img/fonndndxp.png">
				</div>
		</div>

		<div class="shopprice">
			<span>500 Diamants</span>
		</div>

		<div class="shopdesc">
			<span>Tu peux l'acheter avec les ViceTokens !</span>
		</div>

		<div class="shophr"></div>

		<div class="shopbutton"><a class="buttondexe" id="diams" diams="2" token="<?= $user->get('token'); ?>"><span>7 Tokens</span></a></div>
		

	</div>

	</div>

		<div class="shopbox load">
		
	<div class="shopboxpos">
		
		<div class="boxbg">
			<div class="boxbgleft">
				<img src="<?= ASSETSURL ?>img/diams.png">
			</div>
				<div class="boxbgright">
					<img src="<?= ASSETSURL ?>img/fonndndxp.png">
				</div>
		</div>

		<div class="shopprice">
			<span>1000 Diamants</span>
		</div>

		<div class="shopdesc">
			<span>Tu peux l'acheter avec les ViceTokens !</span>
		</div>

		<div class="shophr"></div>

		<div class="shopbutton"><a class="buttondexe" id="diams" diams="3" token="<?= $user->get('token'); ?>"><span>15 tokens</span></a></div>
		

	</div>

	</div>


	 	 	 </div>

	 	 <?php }elseif($type == "badge"){ ?>

	<div class="loadshoppos">

		<?php
		$query78 = $db->connect()->prepare('SELECT * FROM cms_shop_badges WHERE stock > 0 ORDER BY id DESC');
		$query78->execute();

		$fetch78 = $query78->fetchAll();

		for ($i = 0; $i < count($fetch78); $i++) {
		$badgeid = $fetch78[$i]['badge_id'];

		$query780 = $db->connect()->prepare('SELECT COUNT(*) FROM users_badges WHERE user_id = ? AND badge_code = ?');
		$query780->execute([$user->get('id'), $badgeid]);

		$count780 = $query780->fetchColumn();

		if ($count780 < 1) {
		?>

	<div class="shopbox badge">
		
	<div class="shopboxpos badge">
		
		<div class="boxbg badge">
				<img src="https://vicehabbo.fr/swf/c_images/album1584/<?= $fetch78[$i]['badge_id']; ?>.gif">
		</div>

		<div class="shopprice">
			<span><?= $fetch78[$i]['prix']; ?> ViceToken <br> Stock : <?= $fetch78[$i]['stock'] ?></span>
		</div>

		<div class="shopdesc">
			<span><?= (strlen($system->BadgeTitle($fetch78[$i]['badge_id'])) > 19 ? substr($system->BadgeTitle($fetch78[$i]['badge_id']), 0, 17). '...' : $system->BadgeTitle($fetch78[$i]['badge_id'])); ?></span>
		</div>

		<div class="shophr badge"></div>

		<form action="<?= URL ?>app/actions/buy_badge.php" method="post" name="buyBadge">
		<input type="hidden" name="token" value="<?= $user->get('token'); ?>"/>
		<input type="hidden" class="badgePrix" name="code" value="<?= $fetch78[$i]['badge_id']; ?>"/>
		<input type="hidden" class="badgeCode" name="prix" value="<?= $fetch78[$i]['prix']; ?>"/>
		<div class="shopbutton"><input class="buttondex" type="submit" value="Acheter"/></div>
		</form>
		
	</div>

	</div> 
	                                       <?php
                                    }
                                }
                                ?>
</div>


	
	 	 	 <?php }elseif($type == "premium"){ ?>
<div class="loadshoppos load">
	         
	 	 	 		<div class="shopbox load" style="width:243px;height:360px;">
		
	<div class="shopboxpos">
		
		<div class="boxbg" style="width:223px;height:90px">
				<img src="<?= ASSETSURL ?>img/vippremium.png">
		</div>

		<div class="shopdesc">
			<span>VicePremium</span>
		</div>

		<div class="shopdesc">
			<span>Voici les avatanges du VicePremium</span>
		</div>

		<div class="shophr"></div>

		<div class="shopdesc">
		<li class="shopli"><span>Catalogue privé</span></li>
		<li class="shopli"><span>Coffre Premium</span></li>
		<li class="shopli"><span>Badge + enable + monnaie</span></li>
		<li class="shopli"><span>Accès anticipé</span></li>
		</div>

	<div class="shophr"></div>
		<div class="shopdesc">
		<li class="shopli"><span>Lorem Ipsum dolor si amet</span></li>
		</div>

		<div class="shophr"></div>

		<div class="shopbutton">
		<form action="<?= URL ?>app/actions/shop_vip.php" name="vip" method="post">
		<input type="hidden" name="token" value="<?= $user->get('token'); ?>"/>
		<input type="submit" class="buttondex" value="10 token"/>
		</form> 
				</div>
		
		

	</div>

	</div>
</div>
 <?php } ?>



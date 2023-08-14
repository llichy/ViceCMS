<?php
include './global.php';

    if (!$user->isOnline()) {
        $system->redirect('index');
    } else {

define('CSS', 'palmares');
define('JS', 'palmares');
define('TITLE', 'Palmarès');
define('DESCRIPTION', 'Retrouve les différents classements des meilleurs utilisateurs de l\'hôtel');

$_GET['page'] = 'palmares';


include ROOTDIR . '/app/templates/header.php';
include ROOTDIR .'/app/actions/photo_liste.php';
?>

<div class="bloc">

	<div class="title-bloc"><span>Classement</span></div>

	<div class="classementglobal">

				<div class="box-classement">

							<div class="classement-pos">
							<div class="classementtitle">
							<div class="author"><span>Diamants</span></div>
							</div>
							<hr>
							<div class="classementimg">

							<div class="podium">
<?php


$query = $db->connect()->prepare('SELECT amount,type,users.look,users.username FROM users_currency INNER JOIN users ON users_currency.user_id = users.id and users_currency.type = ? ORDER BY users_currency.amount DESC LIMIT 4');              
                $query->execute([5]);

                $fetch = $query->fetchAll();

                for ($i = 0; $i < 3; $i++) {

 						if($i == 0) { ?>
								<div class="player one">
										<div class="playerinfo diamond">
										<span class="pseudo"><?= $fetch[$i]['username']; ?></span><br>
										<span class="amount"><?= $system->NumberFormat($fetch[$i]['amount']); ?></span>
										<div class="monnaie diamond"></div>
										</div>
										<div class="player-avatar">
										<img src="<?= AVATAR . $fetch[$i]['look']; ?>&direction=3&action=std&head_direction=3">
										</div>
								</div>
<?php }elseif($i == 1) { ?>

							<div class="player two">
										<div class="playerinfoleft">
										<span class="pseudo"><?= $fetch[$i]['username']; ?></span><br>
										<span class="amount"><?= $system->NumberFormat($fetch[$i]['amount']); ?></span>
										<div class="monnaie diamond"></div>
										</div>
										<div class="player-avatar">
										<img src="<?= AVATAR . $fetch[$i]['look']; ?>&direction=2&action=std&head_direction=3">
										</div>
							</div>
<?php }elseif($i == 2) { ?>
							<div class="player three">
										<div class="playerinfo rightback">
										<span class="pseudo"><?= $fetch[$i]['username']; ?></span><br>
										<span class="amount"><?= $system->NumberFormat($fetch[$i]['amount']); ?></span>
										<div class="monnaie diamond"></div>
										</div>
										<div class="player-avatar">
										<img src="<?= AVATAR . $fetch[$i]['look']; ?>&direction=4&action=std&head_direction=3">
										</div>
										</div>
<?php } } ?>
							</div>

							</div>


							</div>
		</div>


						<div class="box-classement">

							<div class="classement-pos">
							<div class="classementtitle">
							<div class="author"><span>Points d'expérience</span></div>
							</div>
							<hr>
							<div class="classementimg">

							<div class="podium">

<?php

                $query = $db->connect()->prepare('SELECT ls_experience,username,look FROM users ORDER BY ls_experience DESC LIMIT 4');
                $query->execute();

                $fetch = $query->fetchAll();

                for ($i = 0; $i < 4; $i++) {

 						if($i == 0) { ?>
								<div class="player one">
										<div class="playerinfo cred">
										<span class="pseudo"><?= $fetch[$i]['username']; ?></span><br>
										<span class="amount"><?= $system->NumberFormat($fetch[$i]['ls_experience']); ?></span>
										<div class="monnaiexp cred"></div>
										</div>
										<div class="player-avatar">
										<img src="<?= AVATAR . $fetch[$i]['look']; ?>&direction=3&action=std&head_direction=3">
										</div>
								</div>
<?php }elseif($i == 1) { ?>

							<div class="player two">
										<div class="playerinfoleft">
										<span class="pseudo"><?= $fetch[$i]['username']; ?></span><br>
										<span class="amount"><?= $system->NumberFormat($fetch[$i]['ls_experience']); ?></span>
										<div class="monnaiexp cred"></div>
										</div>
										<div class="player-avatar">
										<img src="<?= AVATAR . $fetch[$i]['look']; ?>&direction=2&action=std&head_direction=3">
										</div>
							</div>
<?php }elseif($i == 2) { ?>
							<div class="player three">
										<div class="playerinfo rightback">
										<span class="pseudo"><?= $fetch[$i]['username']; ?></span><br>
										<span class="amount"><?= $system->NumberFormat($fetch[$i]['ls_experience']); ?></span>
										<div class="monnaiexp cred"></div>
										</div>
										<div class="player-avatar">
										<img src="<?= AVATAR . $fetch[$i]['look']; ?>&direction=4&action=std&head_direction=3">
										</div>
										</div>
<?php } } ?>
							</div>

							</div>


							</div>
		</div>


						<div class="box-classement">

							<div class="classement-pos">
							<div class="classementtitle">
							<div class="author"><span>Duckets</span></div>
							</div>
							<hr>
							<div class="classementimg">

							<div class="podium">
<?php


$query = $db->connect()->prepare('SELECT amount,type,users.look,users.username FROM users_currency INNER JOIN users ON users_currency.user_id = users.id and users_currency.type = ? ORDER BY users_currency.amount DESC LIMIT 4');              
                $query->execute([0]);

                $fetch = $query->fetchAll();

                for ($i = 0; $i < 4; $i++) {

 						if($i == 0) { ?>
								<div class="player one">
										<div class="playerinfo duck">
										<span class="pseudo"><?= $fetch[$i]['username']; ?></span><br>
										<span class="amount"><?= $system->NumberFormat($fetch[$i]['amount']); ?></span>
										<div class="monnaie duck"></div>
										</div>
										<div class="player-avatar">
										<img src="<?= AVATAR . $fetch[$i]['look']; ?>&direction=3&action=std&head_direction=3">
										</div>
								</div>
<?php }elseif($i == 1) { ?>

							<div class="player two">
										<div class="playerinfoleft">
										<span class="pseudo"><?= $fetch[$i]['username']; ?></span><br>
										<span class="amount"><?= $system->NumberFormat($fetch[$i]['amount']); ?></span>
										<div class="monnaie duck"></div>
										</div>
										<div class="player-avatar">
										<img src="<?= AVATAR . $fetch[$i]['look']; ?>&direction=2&action=std&head_direction=3">
										</div>
							</div>
<?php }elseif($i == 2) { ?>
							<div class="player three">
										<div class="playerinfo rightback">
										<span class="pseudo"><?= $fetch[$i]['username']; ?></span><br>
										<span class="amount"><?= $system->NumberFormat($fetch[$i]['amount']); ?></span>
										<div class="monnaie duck"></div>
										</div>
										<div class="player-avatar">
										<img src="<?= AVATAR . $fetch[$i]['look']; ?>&direction=4&action=std&head_direction=3">
										</div>
										</div>
<?php } } ?>
							</div>

							</div>


							</div>
		</div>


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
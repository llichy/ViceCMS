<?php
include './global.php';
    if (!$user->isOnline()) {
        $system->redirect('index');
    } else {
    	
define('CSS', 'team');
define('JS', 'team');
define('TITLE', 'Équipe');
define('DESCRIPTION', 'Retrouve la liste des staffs qui travaillent tous bénévolement pour l\'évolution au quotidien de '.sitename.'!');

$_GET['page'] = 'team';
$nopeople = "<div class='error'>Aucune personne gradée dans cette catégorie pour le moment</div>";

include ROOTDIR . '/app/templates/header.php';
?>



<div class="bloc">

	<div class="staffpos">
		<div class="staffboxone">
			<div class="stafftitle"><span> Hotel Manager</span></div>
			<div class="staffcontent">

			<?php
			$query = $db->connect()->prepare('SELECT id,username,look,motto,online FROM users WHERE rank = 8');
			$query->execute();

			$fetch = $query->fetchAll();

			if (count($fetch) < 1) {
			echo $nopeople;
			} else {
			for ($i = 0; $i < count($fetch); $i++) { ?>

							<div class="boxstaff">
							<div class="staffavatar">
							<img src="<?= AVATAR . $fetch[$i]['look']; ?>&direction=3&action=std&gesture=srp">
							</div>
							<div class="staffinfoposition">
							<span class="staffusername"><?= $fetch[$i]['username']; ?></span>
							<?php
							if ($fetch[$i]['online'] == '1') {
							echo "<div class='staffonline'></div>";
							} else {
							echo "<div class='staffoffline'></div>";
							}
							?>
							<br>

							<span class="staffmotto"> <?= $fetch[$i]['motto']; ?></span>
							</div>
							</div>
			<?php
				}
			}
			?>
			</div>
		</div>

		<div class="staffboxtwo">
			<div class="stafftitle"><span> Developpeur</span></div>
			<div class="staffcontent">
			<?php
			$query = $db->connect()->prepare('SELECT id,username,look,motto,online FROM users WHERE rank = 7');
			$query->execute();

			$fetch = $query->fetchAll();

			if (count($fetch) < 1) {
			echo $nopeople;
			} else {
			for ($i = 0; $i < count($fetch); $i++) { ?>

							<div class="boxstaff">
							<div class="staffavatar">
							<img src="<?= AVATAR . $fetch[$i]['look']; ?>&direction=3&action=std&gesture=srp">
							</div>
							<div class="staffinfoposition">
							<span class="staffusername"><?= $fetch[$i]['username']; ?></span>
							<?php
							if ($fetch[$i]['online'] == '1') {
							echo "<div class='staffonline'></div>";
							} else {
							echo "<div class='staffoffline'></div>";
							}
							?>
							<br>

							<span class="staffmotto"> <?= $fetch[$i]['motto']; ?></span>
							</div>
							</div>
			<?php
				}
			}
			?>
			</div>
		</div>
	</div>

<div class="staffpos">

		<div class="staffboxtwo">
			<div class="stafftitle"><span> Administrateur</span></div>
			<div class="staffcontent">
			<?php
			$query = $db->connect()->prepare('SELECT id,username,look,motto,online FROM users WHERE rank = 6');
			$query->execute();

			$fetch = $query->fetchAll();

			if (count($fetch) < 1) {
			echo $nopeople;
			} else {
			for ($i = 0; $i < count($fetch); $i++) { ?>

							<div class="boxstaff">
							<div class="staffavatar">
							<img src="<?= AVATAR . $fetch[$i]['look']; ?>&direction=3&gesture=srp">
							</div>
							<div class="staffinfoposition">
							<span class="staffusername"><?= $fetch[$i]['username']; ?></span>
							<?php
							if ($fetch[$i]['online'] == '1') {
							echo "<div class='staffonline'></div>";
							} else {
							echo "<div class='staffoffline'></div>";
							}
							?>
							<br>

							<span class="staffmotto"> <?= $fetch[$i]['motto']; ?></span>
							</div>
							</div>
			<?php
				}
			}
			?>
			</div>
		</div>

		<div class="staffboxone">
			<div class="stafftitle"><span> Moderateur</span></div>
			<div class="staffcontent">
			<?php
			$query = $db->connect()->prepare('SELECT id,username,look,motto,online FROM users WHERE rank = 5');
			$query->execute();

			$fetch = $query->fetchAll();

			if (count($fetch) < 1) {
			echo $nopeople;
			} else {
			for ($i = 0; $i < count($fetch); $i++) { ?>

							<div class="boxstaff">
							<div class="staffavatar">
							<img src="<?= AVATAR . $fetch[$i]['look']; ?>&direction=3&action=std&gesture=srp">
							</div>
							<div class="staffinfoposition">
							<span class="staffusername"><?= $fetch[$i]['username']; ?></span>
							<?php
							if ($fetch[$i]['online'] == '1') {
							echo "<div class='staffonline'></div>";
							} else {
							echo "<div class='staffoffline'></div>";
							}
							?>
							<br>

							<span class="staffmotto"> <?= $fetch[$i]['motto']; ?></span>
							</div>
							</div>
			<?php
				}
			}
			?>
			</div>
		</div>
		</div>
		<div class="staffpos">
		<div class="staffboxone">
			<div class="stafftitle"><span> Animateur</span></div>
			<div class="staffcontent">
			<?php
			$query = $db->connect()->prepare('SELECT id,username,look,motto,online FROM users WHERE rank = 4');
			$query->execute();

			$fetch = $query->fetchAll();

			if (count($fetch) < 1) {
			echo $nopeople;
			} else {
			for ($i = 0; $i < count($fetch); $i++) { ?>

							<div class="boxstaff">
							<div class="staffavatar">
							<img src="<?= AVATAR . $fetch[$i]['look']; ?>&direction=3&action=std&gesture=srp">
							</div>
							<div class="staffinfoposition">
							<span class="staffusername"><?= $fetch[$i]['username']; ?></span>
							<?php
							if ($fetch[$i]['online'] == '1') {
							echo "<div class='staffonline'></div>";
							} else {
							echo "<div class='staffoffline'></div>";
							}
							?>
							<br>

							<span class="staffmotto"> <?= $fetch[$i]['motto']; ?></span>
							</div>
							</div>
			<?php
				}
			}
			?>
			</div>
		</div>

		<div class="staffboxtwo">
			<div class="stafftitle"><span> Architecte</span></div>
			<div class="staffcontent">
			<?php
			$query = $db->connect()->prepare('SELECT id,username,look,motto,online FROM users WHERE rank = 3');
			$query->execute();

			$fetch = $query->fetchAll();

			if (count($fetch) < 1) {
			echo $nopeople;
			} else {
			for ($i = 0; $i < count($fetch); $i++) { ?>

							<div class="boxstaff">
							<div class="staffavatar">
							<img src="<?= AVATAR . $fetch[$i]['look']; ?>&direction=3&gesture=srp">
							</div>
							<div class="staffinfoposition">
							<span class="staffusername"><?= $fetch[$i]['username']; ?></span>
							<?php
							if ($fetch[$i]['online'] == '1') {
							echo "<div class='staffonline'></div>";
							} else {
							echo "<div class='staffoffline'></div>";
							}
							?>
							<br>

							<span class="staffmotto"> <?= $fetch[$i]['motto']; ?></span>
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
<?php
        }
include ROOTDIR . '/app/templates/footer.php';

?>
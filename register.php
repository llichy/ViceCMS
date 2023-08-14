<?php
include 'global.php';

define('TITLE', ''.sitename.': Crée toi un Habbo');
define('DESCRIPTION', 'Créé ton avatar gratuitement sur '.sitename.' et devient le plus populaire de l\'hôtel en te faisant un max d\'amis!');
define('JS', 'register');
$_GET['page'] = "register";

if ($user->isOnline()) {
    $system->redirect('me');
} else {
    ?>

<!DOCTYPE html>
<html>
<head>
	<title>ViceHabbo : <?= DESCRIPTION ?></title>
	<?= $html->meta('register'); ?>
		<link rel="stylesheet" href="<?= ASSETSURL ?>css/global.css?v=<?= time() ?>">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
</head>
<body>

    <?php
    if (isset($error) && $error) {
        echo "<div class='error e_top " . $class . "'>" . $message . "</div>";
    }
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

<div class="corp">
	<div class="center">

			<div class="boxregister">
				<form name="register" class="registerform" action="<?= URL; ?>register" method="POST" > 

					<div class="registercontainer">

						<div class="registertitle">Pseudonyme</div>
							<div class="inputbox">
								<div class="avatarregister"><img alt="avatar" id="avatar" src="<?= AVATAR ?>&headonly=1&direction=2&size=s&action=std,crr=47" /></div>
								<input type="text" name="username" placeholder="Pseudonyme">
							</div>

							<div class="registertitle">Mot de passe</div>
							<div class="inputbox">
								<div class="avatar"><img alt="avatar" id="avatar" src="<?= ASSETSURL ?>img/Layer 53.png" /></div>
								<input type="password" name="password" placeholder="*******">
							</div>

						<div class="registertitle">Date de naissance</div>

						<select name="birthdate_day" class="selectric" tabindex="-1">
                                        <option disabled="" selected="">Jour</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select>

                        <select name="birthdate_month" class="selectric" tabindex="-1">
                                        <option disabled="" selected="">Mois</option>
                                        <option value="1">Janvier</option>
                                        <option value="2">Fevrier</option>
                                        <option value="3">Mars</option>
                                        <option value="4">Avril</option>
                                        <option value="5">Mai</option>
                                        <option value="6">Juin</option>
                                        <option value="7">Juillet</option>
                                        <option value="8">Aout</option>
                                        <option value="9">Septembre</option>
                                        <option value="10">Octobre</option>
                                        <option value="11">Novembre</option>
                                        <option value="12">Decembre</option>
                                    </select>

                                    <select name="birthdate_year" class="selectric" tabindex="-1">
                                        <option disabled="" selected="">Année</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                        <option value="1999">1999</option>
                                        <option value="1998">1998</option>
                                        <option value="1997">1997</option>
                                        <option value="1996">1996</option>
                                        <option value="1995">1995</option>
                                        <option value="1994">1994</option>
                                        <option value="1993">1993</option>
                                        <option value="1992">1992</option>
                                        <option value="1991">1991</option>
                                        <option value="1990">1990</option>
                                    </select>



                                    <div style="font-size:11px;position:relative;top:10px;">Tu es déjà inscrit ? Alors connecte toi en cliquant <a style="text-decoration:none;color:#4d4c54" href="<?= URL ?>">ici</a></div>

				</div>

									<div class="registercontainer">
										<div class="registertitle">Email</div>
							<div class="inputbox">
								<div class="avatar"><img alt="avatar" id="avatar" src="<?= ASSETSURL ?>img/Layer 52.png" /></div>
								<input type="mail" name="mail" placeholder="Ton adresse mail">
							</div>
								<div class="registertitle">Retape ton mot de passe</div>
							<div class="inputbox">
								<div class="avatar"><img alt="avatar" id="avatar" src="<?= ASSETSURL ?>img/Layer 53.png" /></div>
								<input type="password" name="password_v" placeholder="*******">
							</div>

							<div class="registertitle">Choisis ton sexe</div>
							<div onclick="ChoixLook('M')" id="reg17">
							<div id="reg18"></div>
							</div>
							<div onclick="ChoixLook('F')" id="reg20">
							<div id="reg21"></div>
							</div>

				</div>

									<div class="registercontainer">

							<div class="choselook">
								
								<div class="lookoption">
									
								</div>

								<div class="registerlookposition">
									<div class="userlook">
										<img id="reg28" gender="" code="" src="<?= AVATAR ?>&direction=3&action=sml,wav&size=l">
									</div>


								</div>

							</div>


						<input type="submit" name="submit" class="buttonregister" value="S'INSCRIRE"/>
				</div>

				</form>
		</div>

		<div class="boxdivers">
		<div class="diversposition">
			<div class="diverstitle">C'est quoi <?= sitename ?></div>
			<div class="diversdesc"><?= sitename ?> est un monde de pixels illimité où vous pouvez construire des apparts, vous faire des amis, parler à vos amis.</div>
			<hr>
			<div class="diverstitle">Look our social media!</div>
			<a href="https://discord.gg/vicehabbo"><div class="socialmedia"><img src="<?= ASSETSURL ?>img/twitter.png"></div></a>
			<a href="https://discord.gg/vicehabbo"><div class="socialmedia dc"><img src="<?= ASSETSURL ?>img/disc.png"></div></a>
		</div>
	</div>


		<div class="bloc">
		<div class="title-bloc"><span>Les derniers articles</span></div>

		<div class="newsglobal">
		<?php
		$req = $db->connect()->prepare('SELECT * FROM site_news WHERE attente = ? AND timestamp < ? ORDER BY timestamp DESC LIMIT 3');
		$req->execute([0,time()]);
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

<script type="text/javascript">
            var registerGender;
            function ChoixLook(type) {
            registerGender = type;
            $("#reg25").text("Chargement...");
            $.ajax({
            type: "POST",
            url: actions + "RegistrationChecker.php",
            data: {type: "look", gender: type},
            dataType: 'json',
            success: function (json) {
            jQuery.ajax({
            type: "GET",
            url: "https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit",
            dataType: "script",
            cache: true,
            success: function () {
            $("#reg16").hide();
            $("#reg26").show();
            registerFigure = json.id;
            $("#reg28").attr("src", json.look);
            $("#reg28").attr("gender", json.gender);
            $("#reg28").attr("code", json.code);
            }
            });
            }
            });
            }
            </script>

<?php
        }
include ROOTDIR . '/app/templates/footer.php';

?>
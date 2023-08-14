<?php
session_start();
include '../../global.php';
header('Content-Type: application/json');

$errcode = 'default';
$ban = 0;
$step1 = false;
$step2 = false;
$array = [];
$type = null;

if (empty($_POST['mailornick']) || empty($_POST['password'])) {
    $type = 'error';
    $message = 'Merci de remplir les champs vides.';
} else {
	
			$ncm = $_POST['mailornick'];
			$password = $securise->Hashage($_POST['password']);
			$ip = $_SERVER['REMOTE_ADDR'];

			if (filter_var($ncm, FILTER_VALIDATE_EMAIL)) {
				$query = $db->connect()->prepare('SELECT * FROM users WHERE mail = ?');
				$query->execute([$ncm]);

				$fetch = $query->fetchAll();

				if (count($fetch) < 1) {
					$type = 'error';
					$message = 'L\'adresse mail entrée ne correspond à aucun compte.';
					$user->LoginError();
					if($tentatives >= 6)
						$type = 'captcha';
				} else {
					$step1 = true;
					$array = $fetch;
				}
			} else {
				$query2 = $db->connect()->prepare('SELECT * FROM users WHERE username = ?');
				$query2->execute([$ncm]);

				$fetch2 = $query2->fetchAll();

				if (count($fetch2) < 1) {
					$type = 'error';
					$message = 'Le pseudo entré ne correspond à aucun compte.';
					$user->LoginError();
					if($tentatives >= 6)
						$type = 'captcha';
				} else {
					$step1 = true;
					$array = $fetch2;
				}
			}

			if ($step1) {

				if ($array[0]['password'] != $password) {
					$type = 'error';
					$message = 'Le mot de passe ne correspond pas à ce compte.';
					$user->LoginError($array[0]['id']);
					if($tentatives >= 6)
						$type = 'captcha';
				} else {
					$query4 = $db->connect()->prepare('SELECT * FROM bans WHERE value = ? OR value = ? LIMIT 0,1');
					$query4->execute([$array[0]['id'], $_SERVER['REMOTE_ADDR']]);

					$fetch4 = $query4->fetchAll();

					if (count($fetch4) > 0) {
						if (time() > $fetch4[0]['expire']) {
							$query5 = $db->connect()->prepare('DELETE FROM bans WHERE value = ?');
							$query5->execute([$array[0]['id']]);
							//$system->sendMusCommand('updatebans'); 

							$step2 = true;
						} else {
							$type = 'error';
							$message = 'Tu es banni pour la raison suivante: "' .htmlspecialchars($fetch4[0]['reason']). '", il expirera dans ' . $system->remainingTime($fetch4[0]['expire'], time()) . ".";
						}
					} else {
						$step2 = true;
					}

					if ($step2) {
						$query6 = $db->connect()->prepare('SELECT ip,id FROM users_logs WHERE ip = ? AND id');
						$query6->execute([$ip]);

						$fetch6 = $query6->fetchAll();

						if (count($fetch6) < 1) {
							$dip = false;
						} else {
							if ($fetch6[0]['ip'] != $ip) {
								$dip = true;
							} else {
								$dip = false;
							}
						}
						
						if ($array[0]['rank'] >= 5) {
				
							$query7 = $db->connect()->prepare('SELECT * FROM ip_staff WHERE user_id = ?');
							$query7->execute([$array[0]['id']]);
							$fetch7 = $query7->fetchAll();

							if (count($fetch7) < 1) {
								$type = 'error';
								$message = 'Erreur IPSTAFF, merci de contacter Stown.';
							} else {
								$validd = false;

								if ($_SERVER['REMOTE_ADDR'] == $fetch7[0]['ip']) {
								$validd = true;
								}

								if ($validd) {
									$GrainDeSel1 = str_shuffle("tIn" . rand(100, 999) . "tiN539" . rand(100000, 999999) . "habbocyty" . rand(100, 999) . "16");                         
									$query9 = $db->connect()->prepare('UPDATE ip_staff SET token = ? , times = ? WHERE user_id = ?');
									$query9->execute([$GrainDeSel1, time(), $array[0]['id']]);
									setcookie('securite', $GrainDeSel1, time() + (10 * 365 * 24 * 60 * 60), '/');
									$type = 'success';
									$message = 'oki';
								} else {
									$type = 'error';
									$message = $errcode;
									
									if($errcode == 'default')
									{
										$type = 'protection';
										$message = 'Redirection vers la page de protection';
									}														                            
								}
							}
						}

 
						if($type != 'error' && $type != 'protection')
						{
							if($user->get('ip_last', $array[0]['id']) != $_SERVER['REMOTE_ADDR'] && $user->get('pin', $array[0]['id']) == 2) {
								$add->Log('IP Connexion', $_SERVER['REMOTE_ADDR'], $array[0]['id']);
							$query132 = $db->connect()->prepare('UPDATE users SET pin = ? WHERE id = ?');
							$query132->execute([1, $array[0]['id']]);
							}
							
							$query13 = $db->connect()->prepare('UPDATE users SET last_online = ? WHERE id = ?');
							$query13->execute([time(), $array[0]['id']]);
							
							$query131 = $db->connect()->prepare('UPDATE users SET ip_last = ? WHERE id = ?');
							$query131->execute([$_SERVER['REMOTE_ADDR'], $array[0]['id']]);

						

							if ($dip) {
								$system->UserLog($array[0]['id'], "connexion");
							}

							$user->newsession($array[0]['id'], $_SERVER['HTTP_USER_AGENT'], $ip);



							$type = 'success';
							$message = 'Connexion effectuée avec succès, redirection en cours...';
						}
					} 
				}				 
    }
}

echo json_encode([
    'type' => $type,
    'message' => $message,
    'errcode' => $errcode
]);
?>
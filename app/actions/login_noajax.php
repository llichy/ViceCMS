<?php
session_start();
$step1 = false;
$error = false;
$class = null;
$valueNickname = null;
$continue = false;

if (!empty($_POST)) {
    $valueNickname = $_POST['mailornick'];

    if (empty($_POST['mailornick']) || empty($_POST['password'])) {
        $error = true;
        $message = 'Merci de remplir les champs vides.';
    } else {
		
		if($tentatives > 6 && empty($_POST['captchalogin'])) {
			$error = true;
			$message = 'Merci de recopier le code de sécurité afin de vérifier que vous êtes bien un humain.';
		} else {
			
			if ($tentatives > 6 && $_SESSION['digit'] != $_POST['captchalogin']) {
				$error = true;
				$message = 'Le code de sécurité entré est invalide, merci de réessayer.';			
			} else {
		
				$ncm = $_POST['mailornick'];
				$password = $_POST['password'];

				if (filter_var($ncm, FILTER_VALIDATE_EMAIL)) {
					$query = $db->connect()->prepare('SELECT password,encryptage_key,id,newencryptage,username,rank,ip_current,mail FROM users WHERE mail = ?');
					$query->execute([$ncm]);

					$fetch = $query->fetchAll();

					if (count($fetch) < 1) {
						$error = true;
						$message = 'L\'adresse mail entrée ne correspond à aucun compte.';
						$user->LoginError();
					} else {
						$step1 = true;
						$array = $fetch;
					}
				} else {
					$query2 = $db->connect()->prepare('SELECT password,encryptage_key,id,newencryptage,username,rank,ip_current,mail FROM users WHERE username = ?');
					$query2->execute([$ncm]);

					$fetch2 = $query2->fetchAll();

					if (count($fetch2) < 1) {
						$error = true;
						$message = 'Le pseudo entré ne correspond à aucun compte.';
						$user->LoginError();
					} else {
						$step1 = true;
						$array = $fetch2;
					}
				}

				if ($step1) {
						if ($array[0]['newencryptage'] == 1) {
							$password = $securise->EncryptMD5($password, $array[0]['encryptage_key']);
						} else {
							$password = $securise->Hashage($_POST['password']);
						}

						if ($array[0]['password'] != $password) {
							$error = true;
							$message = 'Le mot de passe ne correspond pas au compte ' . $ncm;
							$user->LoginError($array[0]['id']);
						} else {
						   
						   $query4 = $db->connect()->prepare('SELECT * FROM bans WHERE user_id = ? OR ip = ? LIMIT 0,1');
						   $query4->execute([$array[0]['id'], $_SERVER['REMOTE_ADDR']]);

						   $fetch4 = $query4->fetchAll();

							if (count($fetch4) > 0) {
								
								if (time() > $fetch4[0]['expire']) {
									$query5 = $db->connect()->prepare('DELETE FROM bans WHERE user_id = ?');
									$query5->execute([$array[0]['id']]);
									$continue = true;							

								} else {
									$error = true;
									$message = 'Tu es banni pour la raison suivante: "' .htmlspecialchars($fetch4[0]['reason']). '", il expirera dans ' . $system->remainingTime($fetch4[0]['expire'], time()) . ".";
								}
								
							} else {
								
								$continue = true;							
							}
						   
							if($continue) {
					   
								$query5 = $db->connect()->prepare('SELECT ip,id FROM users_logs WHERE ip = ? AND id ORDER BY id DESC LIMIT 0,1');
								$query5->execute([$_SERVER['REMOTE_ADDR']]);

								$fetch5 = $query5->fetchAll();

								if (count($fetch5) < 1) {
									$dip = false;
								} else {
									if ($fetch5[0]['ip'] != $_SERVER['REMOTE_ADDR']) {
										$dip = true;
									} else {
										$dip = false;
									}
								}

								if($user->get('ip_current', $array[0]['id']) != $_SERVER['REMOTE_ADDR']) {
								$add->Log('IP Connexion (NA)', $_SERVER['REMOTE_ADDR'], $array[0]['id']);
								}
							
								$query13 = $db->connect()->prepare('UPDATE users SET last_online = ? WHERE id = ?');
								$query13->execute([time(), $array[0]['id']]);
								
								if ($dip) {
									$system->UserLog($array[0]['id'], "connexion");
								}
							   
								$user->newsession($array[0]['id'], $_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR']);
								$system->redirect('me');
							}
						}						
                }
            }
        }
    }
}
?>

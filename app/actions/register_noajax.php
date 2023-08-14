<?php
session_start();

$error = false;
$class = null;

if (!empty($_POST)) {
    if (empty($_POST['username']) || empty($_POST['mail']) || empty($_POST['password']) || empty($_POST['password_v']) || empty($_POST['captcha'])) {
        $error = true;
        $message = 'Merci de remplir les champs vides.';
    } else {
        $username = preg_replace("/[^a-z\d\-=\?!@:\.]/i", "", $_POST['username']);
        $mail = $_POST['mail'];
        $GrainDeSel = str_shuffle("tIn" . rand(100, 999) . "tiN539" . rand(100000, 999999) . "habbocyty" . rand(100, 999) . "16");
        $password = $securise->EncryptMD5($_POST['password'], $GrainDeSel);
        $password_v = $securise->EncryptMD5($_POST['password_v'], $GrainDeSel);
        $captcha = $_POST['captcha'];
        $look = 'ch-685-95.hd-600-1.cc-3008-95-1327.lg-3190-95-1408.hr-3012-38.sh-907-95';
        $gender = 'M';

        $nbbemail = explode('@', $mail);
        $ipndd = gethostbyname($nbbemail[1]);

        if ($_SESSION['register-captcha-bubble'] != strtolower($captcha)) {
            $error = true;
            $message = 'Le code de sécurité entré est invalide.';
        } else {
            if ($password != $password_v) {
                $error = true;
                $message = 'Les mots de passe ne correspondent pas.';
            } else {
                $query = $db->connect()->prepare('SELECT * FROM players WHERE username = ?');
                $query->execute([$username]);

                $fetch = $query->fetchAll();

                if (count($fetch) > 0) {
                    $error = true;
                    $message = 'Le pseudo choisis est déjà utilisé par un joueur.';
                } else {
                    if ($check->antipub($username)) {
                        $error = true;
                        $message = 'Le pseudo choisis contient de la PUB.';
                    } else {
                        if (strlen($username) > 25) {
                            $error = true;
                            $message = 'Le pseudo doit faire moins de 25 caractères';
                        } else {
                            if (strlen($username) < 4) {
                                $error = true;
                                $message = 'Le pseudo doit faire au moins 5 caractères';
                            } else {
                                if (strlen($_POST['password_v']) < 6) {
                                    $error = true;
                                    $message = 'Le mot de passe doit au minimum faire 6 caractères.';
                                } else {
                                    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                                        $error = true;
                                        $message = 'L\'adresse mail est invalide.';
                                    } else {
                                        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
                                            $error = true;
                                            $message = 'Le pseudo ne peut pas être une adresse email.';
                                        } else {
                                            if ($ipndd == $nbbemail[1]) {
                                                $error = true;
                                                $message = 'Le fournisseur de mail "' . $ipndd . '" n\'existe pas, vérifier la bonne orthographe de votre adresse email.';
                                            } else {
                                                $query2 = $db->connect()->prepare('SELECT * FROM players WHERE email = ?');
                                                $query2->execute([$mail]);

                                                $fetch2 = $query2->fetchAll();

                                                if (count($fetch2) > 0) {
                                                    $error = true;
                                                    $message = 'L\'adresse mail choisie est déjà utilisée.';
                                                } else {                               
                                                    $regFormat = date('d-m-Y', time());

                                                    $query3 = $db->connect()->prepare('INSERT INTO players(username, password, encryptage_key, newencryptage, email, auth_ticket, rank, figure, gender, motto, credits, activity_points, last_online, reg_timestamp, reg_date, last_ip, ip_actuelle) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                                                    $query3->execute([$username, $password_v, $GrainDeSel, "1", $mail, "", "1", $look, $gender, "", "10000000", "500", time(), time(), $regFormat, $_SERVER['REMOTE_ADDR'], $_SERVER['REMOTE_ADDR']]);

                                                    $query4 = $db->connect()->prepare("SELECT id FROM players WHERE username = ?");
                                                    $query4->execute([$username]);

                                                    $fetch4 = $query4->fetchAll();

													$user->newsession($fetch4[0]['id'], $_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR']);
													
                                                    $class = 'success';
                                                    $message = 'Inscription validée, redirection en cours...';

                                                    $system->redirect('profil');
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
?>

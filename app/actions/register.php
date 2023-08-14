<?php
session_start();

include '../../global.php';

header('Content-Type: application/json');

if (empty($_POST['username']) || empty($_POST['mail']) || empty($_POST['password']) || empty($_POST['password_v'])) {
    $type = 'error';
    $message = 'Merci de remplir les champs vides.';
} else {
    $username = preg_replace("/[^a-z\d\-=\?!@:\.]/i", "", $_POST['username']);
    $mail = $_POST['mail'];
    $GrainDeSel = str_shuffle("tIn" . rand(100, 999) . "tiN539" . rand(100000, 999999) . "vicehabbo" . rand(100, 999) . "16");
    $password = $securise->EncryptMD5($_POST['password'], $GrainDeSel);
    $password_v = $securise->EncryptMD5($_POST['password_v'], $GrainDeSel);
    $look = $_POST['code'];
    $gender = $_POST['gender'];

    $nbbemail = explode('@', $mail);
    $ipndd = gethostbyname($nbbemail[1]);

        if ($password != $password_v) {
            $type = 'error';
            $message = 'Les mots de passe ne correspondent pas.';
        } else {
            $query = $db->connect()->prepare('SELECT * FROM users WHERE username = ?');
            $query->execute([$username]);

            $fetch = $query->fetchAll();

            if (count($fetch) > 0) {
                $type = 'error';
                $message = 'Le pseudo choisis est déjà utilisé par un joueur.';
            } else {
                if ($check->antipub($username)) {
                    $type = 'error';
                    $message = 'Le pseudo choisis contient de la PUB.';
                } else {
                    if (strlen($username) > 25) {
                        $type = 'error';
                        $message = 'Le pseudo doit faire moins de 25 caractères';
                    } else {
                        if (strlen($username) < 3) {
                            $type = 'error';
                            $message = 'Le pseudo doit faire au moins 3 caractères';
                        } else {
                            if (strlen($_POST['password_v']) < 6) {
                                $type = 'error';
                                $message = 'Le mot de passe doit au minimum faire 6 caractères.';
                            } else {
                                if ($gender != 'M' && $gender != 'F') {
                                    $type = 'error';
                                    $message = 'Tu dois choisir un look !';
                                } else {
                                    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                                        $type = 'error';
                                        $message = 'L\'adresse mail est invalide.';
                                    } else {
                                            if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
                                                $type = 'error';
                                                $message = 'Le pseudo ne peut pas être une adresse email.';
                                            } else {
                                                if ($ipndd == $nbbemail[1]) {
                                                    $type = 'error';
                                                    $message = 'Le fournisseur de mail "' . $ipndd . '" n\'existe pas, vérifier la bonne orthographe de votre adresse email.';
                                                } else {
                                                    $query2 = $db->connect()->prepare('SELECT id FROM users WHERE mail = ?');
                                                    $query2->execute([$mail]);

                                                    $fetch2 = $query2->fetchAll();

                                                    if (count($fetch2) > 0) {
                                                        $type = 'error';
                                                        $message = 'L\'adresse mail choisie est déjà utilisée.';
                                                    } else {
                                                       
                                                       $regFormat = date('d-m-Y', time());

                                                        $query3 = $db->connect()->prepare('INSERT INTO users(username, password, encryptage_key, newencryptage, mail, auth_ticket, rank, look, gender, motto, credits, pixels, last_online, account_day_of_birth, account_created, ip_register, ip_current) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                                                        $query3->execute([$username, $password_v, $GrainDeSel, "1", $mail, "", "1", $look, $gender, "Bienvenue sur ".sitename."", "10000000", "500", time(), time(), time(), $_SERVER['REMOTE_ADDR'], $_SERVER['REMOTE_ADDR']]);

                                                        $query4 = $db->connect()->prepare("SELECT id FROM users WHERE username = ?");
                                                        $query4->execute([$username]);

                                                        $fetch4 = $query4->fetchAll();

                                                        $user->newsession($fetch4[0]['id'], $_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR']);                                                
                                                    
                                                        $type = 'success';
                                                        $message = 'Inscription validée, redirection en cours...';
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

echo json_encode([
    'type' => $type,
    'message' => $message
]);
?>

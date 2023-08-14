<?php

$error = false;
$class = null;
$message = null;
$type = 'errblok';
$typee = null;

if (!empty($_POST)) {
    if (empty($_POST['type']) || $_POST['type'] == null) {
        $typee = 'bidon';
    } else {
        if ($_POST['type'] == 'password') {
            if (empty($_POST['newpass']) || empty($_POST['newpass_v'])) {
                $error = true;
                $message = 'Merci de remplir les champs vides.';
            } else {
                $newpass = $_POST['newpass'];
                $newpass_a = $user->get('password');
                $newpass_b = $securise->EncryptMD5($_POST['newpass'], $user->get('encryptage_key'));
                $newpass_v = $_POST['newpass_v'];

                if ($newpass_b != $newpass_a) {
                    $error = true;
                    $message = 'Les mots de passe ne correspondent pas.';
                } else {
                    if (strlen($newpass_v) < 6) {
                        $error = true;
                        $message = 'Le mot de passe doit au minimum faire 6 caractères.';
                    } else if (strlen($newpass_v) > 50) {
                         $error = true;
                        $message = 'Le mot de passe est trop grand.';
                    } else {

                        $userid = $user->get('id');

                        $GrainDeSel = str_shuffle("tIn".rand(100,999)."tiN539".rand(100000,999999)."vicehabbo".rand(100,999)."16");
                        $npass = $securise->EncryptMD5($newpass_v, $GrainDeSel);

                        $query = $db->connect()->prepare('UPDATE users SET password = ?, encryptage_key = ? WHERE id = ?');
                        $query->execute([$npass, $GrainDeSel, $userid]);

                        $query2 = $db->connect()->prepare('DELETE FROM cms_sessions WHERE user_id = ?');
                        $query2->execute([$userid]);

                        $user->newsession($userid, $_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR']);

                        $add->Log('MDP', '', $userid);
                        
                        $error = true;
                        $class = 'success';
                        $message = 'Ton mot de passe a bien été changé';

                        $system->redirect('reload');
                    }
                  }
            }
        }else if ($_POST['type'] == 'mail') {
            if (empty($_POST['newmail'])) {
                $error = true;
                $message = 'Merci d\'entrer une adresse mail.';
            } else {
                $mail = $_POST['newmail'];

                if (!$check->validMail($mail)) {
                    $error = true;
                    $message = 'L\'adresse mail entrée n\'existe pas.';
                } else {
                    
                    $verifmail = $db->connect()->prepare('SELECT id FROM users WHERE mail = ? AND mail_valide = ?');
                    $verifmail->execute([$mail, 1]);
                    if($verifmail->rowCount() > 0)
                    {
                        $error = true;
                        $message = 'L\'adresse mail entrée est déjà utilisée.';
                        
                    } else {
                                        
                        $query2 = $db->connect()->prepare('UPDATE users SET mail = ? , mail_valide = ? WHERE id = ?');
                        $query2->execute([$mail, 0, $user->get('id')]);
                        
                         $GrainDeSel = str_shuffle("tIn".rand(100,999)."ggg990t".rand(100000,999999)."4920gt".rand(100,999)."89");
                         $query2 = $db->connect()->prepare('INSERT INTO cms_mail (user_id,email,clee,times) VALUE (?,?,?,?)');
                         $query2->execute([$user->get('id'), $mail, $GrainDeSel, time()]);
                         $add->Log('Mail', $mail);

                        $error = true;
                        $class = "success";
                        $message = 'Ton adresse mail a bien été changée ! Un mail contenant un bouton de validation afin de prouver que cette adresse est bien la vôte vient d\'être envoyé. Si vous ne trouvez pas le mail pensé à regarder dans votre boîte de spam';
                        $_POST['newmail'] = '';
                    
                    }
                                     
                }
            }
        }  else if ($_POST['type'] == 'general') {
            
            include '../../global.php';

            header('Content-Type: application/json');

            $jsontype = 'success';
            $jsonmsg = 'Paramètre modifié avec succès.';

            if (empty($_POST['set']) || empty($_POST['action'])) {
                $jsontype = 'error';
                $jsonmsg = 'Une erreur est survenue, merci d\'actualiser la page et de réessayer1.';
            } else {
                $set = $_POST['set'];
                $action = $_POST['action'];
                $avaible = ['webradio'];
                $avaibleSettings = ['block_following', 'block_friendrequests', 'block_alerts'];

                if (in_array($set, $avaible)) {
                    if ($action != 'activate' && $action != 'inactivate') {
                        $jsontype = 'error';
                        $jsonmsg = 'Une erreur est survenue, merci d\'actualiser la page et de réessayer.';
                    } else {
                        $action = ($action == 'activate') ? '1' : '0';

                        $query4 = $db->connect()->prepare('UPDATE users SET ' . $set . ' = ? WHERE id = ?');
                        $query4->execute([$action, $user->get('id')]);

                        $jsontype = 'success';
                    }
                } else if (in_array($set, $avaibleSettings)) {
                    if ($action != 'activate' && $action != 'inactivate') {
                        $jsontype = 'error';
                        $jsonmsg = 'Une erreur est survenue, merci d\'actualiser la page et de réessayer.';
                    } else {
                        $loul = $action;

                        if ($set == 'block_friendrequests' || $set == 'block_following' || $set == 'block_alerts') {
                            $action = ($action != 'activate') ? '0' : '1';
                        } else {
                            $action = ($action == 'activate') ? '0' : '1';
                        }

                        $query4 = $db->connect()->prepare('UPDATE users_settings SET ' . $set . ' = ? WHERE user_id = ?');
                        $query4->execute([$action, $user->get('id')]);
                        var_dump($query4);
                        echo $action;
                        echo $user->get('id');
                        $jsontype = 'success';
                        $jsonmsg = $loul;
                    }
                } else {
                    $jsontype = 'error';
                    $jsonmsg = 'Cette option n\'est pas ou plus éditable.';
                }
            }

            echo json_encode([
                'type' => $jsontype,
                'message' => $jsonmsg
            ]);
        } else {
            $typee = 'bidon';
        }
    }

    if ($typee == 'bidon') {
        $error = true;
        $message = 'Le formulaire entré n\'est pas utilisable, merci d\'actualiser la page.';
    }
}
?>
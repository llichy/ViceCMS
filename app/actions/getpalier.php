<?php
require_once '../../global.php';
header('Content-Type: application/json');


if (empty($_POST['n'])) {
    $reponse = 'erreur';
    $message = 'Une erreur est survenue, merci d\'actualiser la page et de réessayer.';
} else {
    $hide = $_POST['c'];
    $gift = $_POST['n'];
    if (!$user->isOnline()) {
        $type = 'error';
        $message = 'Tu ne peux pas faire ça en étant hors ligne.';
    } else {
        if ($hide != $user->get('token')) {
            $reponse = 'erreur';
            $message = 'Erreur lors de la lecture du token, merci d\'actualiser la page et de réessayer.';
        } else {


               switch ($_POST['n']) {
                    case 1:
            $query = $db->connect()->prepare('SELECT online_time,users.username FROM users_settings INNER JOIN users ON users_settings.user_id = users.id WHERE users.id = ?');
            $query->execute([$user->get('id')]);
            $fetch5 = $query->fetchAll();
            $timing = 90000;
            if ($timing > $fetch5[0]['online_time']) { 
            $reponse = 'erreur';
            $message = 'Tu n\'as pas atteint le nombre requis d\'heure de connexion !';
            } else {
            $clefs = 2;
            $update = $db->connect()->prepare('UPDATE users SET gift_one = ? WHERE id = ?');
            $update->execute(["1", $user->get('id')]);

            $add->clefs($clefs);

            $reponse = 'ok';
            $message = "Félicitations tu viens de recevoir 2 clefs.";
            }
                        break;
               case 2:
            $query = $db->connect()->prepare('SELECT online_time,users.username FROM users_settings INNER JOIN users ON users_settings.user_id = users.id WHERE users.id = ?');
            $query->execute([$user->get('id')]);
            $fetch5 = $query->fetchAll();
            $timing = 198000;
            if ($timing > $fetch5[0]['online_time']) { 
            $reponse = 'erreur';
            $message = 'Tu n\'as pas atteint le nombre requis d\'heure de connexion !';
            } else {
            $tokens = 10;
            $update = $db->connect()->prepare('UPDATE users SET gift_two = ? WHERE id = ?');
            $update->execute(["1", $user->get('id')]);

             $add->tokens($tokens);

                $reponse = 'ok';
                $message = "Félicitations tu viens de recevoir 10 ViceToken.";
                        break;
                    }
               case 3:
            $query = $db->connect()->prepare('SELECT online_time,users.username FROM users_settings INNER JOIN users ON users_settings.user_id = users.id WHERE users.id = ?');
            $query->execute([$user->get('id')]);
            $fetch5 = $query->fetchAll();
            $timing = 288000;
            if ($timing > $fetch5[0]['online_time']) { 
            $reponse = 'erreur';
            $message = 'Tu n\'as pas atteint le nombre requis d\'heure de connexion !';
            } else {

            $update = $db->connect()->prepare('UPDATE users SET gift_three = ? WHERE id = ?');
            $update->execute(["1", $user->get('id')]);

       $query0 = $db->connect()->prepare('SELECT * FROM club_subscription WHERE user_id = ?');
        $query0->execute([$user->get('id')]);
        $fetch52 = $query0->fetchAll();
        $finish_date = time() +  10800; 
        if (count($fetch52) < 1) {                                
                                    $query5 = $db->connect()->prepare('INSERT INTO club_subscription (user_id, finish_date) VALUES (?, ?)');
                                    $query5->execute([$user->get('id'), $finish_date]);
                                } else {
                                    $add = 10800;
                                    $query6 = $db->connect()->prepare('UPDATE club_subscription SET finish_date = finish_date + ? WHERE user_id = ?');
                                    $query6->execute([$add, $user->get('id')]);
                                }

$query2 = $db->connect()->prepare('UPDATE users SET rank = ? WHERE id = ?');
                           $query2->execute(["2", $user->get('id')]);

                $reponse = 'ok';
                $message = "Félicitations tu viens de recevoir 3 jours Premium.";
                        break;
                    }
               case 4:
            $query = $db->connect()->prepare('SELECT online_time,users.username FROM users_settings INNER JOIN users ON users_settings.user_id = users.id WHERE users.id = ?');
            $query->execute([$user->get('id')]);
            $fetch5 = $query->fetchAll();
            $timing = 381600;
            if ($timing > $fetch5[0]['online_time']) { 
            $reponse = 'erreur';
            $message = 'Tu n\'as pas atteint le nombre requis d\'heure de connexion !';
            } else {
            $itemsids = 9477;
            $update = $db->connect()->prepare('UPDATE users SET gift_four = ? WHERE id = ?');
            $update->execute(["1", $user->get('id')]);

            $add->furni($itemsids);


                $reponse = 'ok';
                $message = "Félicitations tu viens de recevoir une box Légendaire.";
                        break;
                    }
}




   /* $query = $bdd->prepare('SELECT OnlineTime,users.username FROM user_stats INNER JOIN users ON user_stats.id = users.id WHERE users.id = ?');
    $query->execute([$hide]);
    $fetch5 = $query->fetchAll();

            if ($fetch5[0]['OnlineTime'] > 121681) { */
                
      /*       } else {
                $reponse = 'erreur';
                $message = 'Tu n\'a pas atteint le nombre requis d\'heure de connexion !';

            }*/
			
            

			}  
        }          
        
    }
echo json_encode([
    'reponse' => $reponse,
    'message' => $message
]);
?>
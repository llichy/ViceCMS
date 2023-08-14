<?php
include '../../global.php';

header('Content-Type: application/json');

$prix = 10;

if (empty($_POST['token'])) {
    $type = 'error';
    $message = 'Une erreur est survenue, merci d\'actualiser la page et de réessayer.';
} else {
    $token = $_POST['token'];

    if (!$user->isOnline()) {
        $type = 'error';
        $message = 'Tu ne peux pas faire ça en étant hors ligne.';
    } else {
        if ($token != $user->get('token')) {
            $type = 'error';
            $message = 'Erreur lors de la lecture du token, merci d\'actualiser la page et de réessayer.';
        } else {
			
			if($user->get('rank') > 3)
			{
				$type = 'error';
				$message = 'Ton grade ne te permet pas d\'adhérer au VIP.';
			} else {
				
                    if ($prix > $user->get('tokens')) {
                        $type = 'error';
                        $message = 'Il te manque ' . ceil($prix - $user->get('tokens')) . ' tokens pour pouvoir acheter ça.';
                    } else {
								
								$add->removejetons($prix);
								


                                $finish_date = time() + ($offer * 2678400);		
								$nbwinwins = ($offer * 500);
								$add->winwins($nbwinwins);								
								$add->newTransaction($target, 'VIP', $prix);
								
								$badges = ['SHTROUMPHETTE', 'GFB32', 'WDG02', 'OEIL', 'SUSHI', 'RASTA', 'CARDIOGRAMME', 'GASTRONOMIE', 'TRIBU', 'PELUCHE', 'AMOURETTE', 'PATIN', 'SUMO', 'ROCK', 'MONEY', 'FRIENDZONE', 'STATUE', 'BOUQUET', 'VIKING', 'CANARD', 'SVIP'];
								foreach($badges as $value) {
									$add->badge($value);                                      
								}
								
                        /*     if ($user->get('is_vip') == 0) {                                   
                                    $query5 = $db->connect()->prepare('INSERT INTO club_subscription (user_id, finish_date) VALUES (?, ?)');
                                    $query5->execute([$user->get('id'), $finish_date]);
                                } else {
                                    $add = $offer * (2678400);

                                    $query6 = $db->connect()->prepare('UPDATE club_subscription SET finish_date = finish_date + ? WHERE user_id = ?');
                                    $query6->execute([$add, $user->get('id')]);
                                }*/

								$query2 = $db->connect()->prepare('UPDATE users SET rank = ? WHERE id = ?');
                                $query2->execute(["2", $user->get('id')]);
								
                                $type = 'success';
                                $message = 'Ta demande d\'adhésion au VIP vient d\'être validée, merci de recharger l\'hôtel.';
                            
                        
                    }
                
            
			
			}           
        }
    }
}

echo json_encode([
    'type' => $type,
    'message' => $message,
    'prix' => $prix
]);
?>
<?php
include '../../global.php';
header('Content-Type: application/json');

$prix = 0;

if (empty($_POST['code']) || empty($_POST['token'])) {
    $type = 'error';
    $message = 'Une erreur est survenue, merci d\'actualiser la page et de réessayer.';
} else {
    $code = $_POST['code'];
    $token = $_POST['token'];

    if ($user->inClient()) {
        $type = 'error';
        $message = 'Tu ne peux pas faire ça en étant en ligne.';
    } else {
        if ($token != $user->get('token')) {
            $type = 'error';
            $message = 'Erreur lors de la lecture du token, merci d\'actualiser la page et de réessayer.';
        } else {
			
			$query = $db->connect()->prepare('SELECT COUNT(*) FROM users_badges WHERE user_id = ? AND badge_code = ?');
			$query->execute([$user->get('id'), $code]);

			$count = $query->fetchColumn();

			if ($count > 0) {
				$type = 'error';
				$message = 'Tu possède déjà ce badge.';
			} else {
				$query2 = $db->connect()->prepare('SELECT stock,prix FROM cms_shop_badges WHERE badge_id = ?');
				$query2->execute([$code]);
				$badgeshop = $query2->fetchAll();

				if ($query2->rowCount() < 1) {
					$type = 'error';
					$message = 'Ce badge n\'est pas ou plus a vendre.';
				} else if($badgeshop[0]['stock'] > 0) {
					
					$prix = $badgeshop[0]['prix'];
					
				  if ($prix > $user->get('tokens')) {
						$type = 'error';
						$message = 'Il te manque ' . ceil($prix - $user->get('tokens')) . ' token pour acheter ça.';
					} else {
			
						$add->badge($code);
						$add->removetokens($prix);						
						//$add->newTransaction($code, 'BADGE', $prix);
						
						$stock = $db->connect()->prepare('UPDATE cms_shop_badges SET stock = stock-1 WHERE badge_id = ?');
						$stock->execute([$code]);

						$type = 'success';
						$message = 'Badge acheté avec succès.';
					}
					
				} else {
					$type = 'error';
					$message = 'Désolé ce badge n\'est plus en stock.';
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
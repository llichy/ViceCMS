<?php
include '../../global.php';

header('Content-Type: application/json');

$prix = 0;

if (empty($_POST['xp']) || empty($_POST['token'])) {
    $type = 'error';
    $message = 'Une erreur est survenue, merci d\'actualiser la page et de réessayer.';
} else {
    $pack = $_POST['xp'];
    $token = $_POST['token'];

    if ($user->InClient()) {
        $type = 'error';
        $message = 'Tu ne peux pas faire ça en étant en ligne.';
    } else {
        if ($token != $user->get('token')) {
            $type = 'error';
            $message = 'Erreur lors de la lecture du token, merci d\'actualiser la page et de réessayer.';
        } else {

            switch ($_POST['xp']) {
                case 1:
                    $prix = 1;
                    if ($prix > $user->get('tokens')) {
                        $type = 'error';
                        $message = 'Il te manque ' . ceil($prix - $user->get('tokens')) . ' Jetons pour pouvoir acheter le pack xp 1.';
                    } else {

                        $add->removetokens($prix);
                        $add->xp(2000);
                        
                        $type = 'success';
                        $message = 'Félications! Tu viens de recevoir le pack xp 1.';
                    }
                    break;

                case 2:
                    $prix = 3;
                    if ($prix > $user->get('tokens')) {
                        $type = 'error';
                        $message = 'Il te manque ' . ceil($prix - $user->get('jetons')) . ' Jetons pour pouvoir acheter le pack xp 2.';
                    } else {

                        $add->removetokens($prix);
                        $add->xp(6000);
                                    
                        $type = 'success';
                        $message = 'Félications! Tu viens de recevoir le pack xp 2.';
                    }
                    break;

                case 3:
                    $prix = 5;
                    if ($prix > $user->get('tokens')) {
                        $type = 'error';
                        $message = 'Il te manque ' . ceil($prix - $user->get('jetons')) . ' Jetons pour pouvoir acheter le pack xp 3.';
                    } else {
                        $add->removetokens($prix);
                        $add->xp(10000);

                        $type = 'success';
                        $message = 'Félications! Tu viens de recevoir le pack xp 3.';
                    }
                    break;
                    
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
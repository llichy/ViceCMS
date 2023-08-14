<?php
include '../../global.php';
header('Content-Type: application/json');

$prix = 0;

if (empty($_POST['diams']) || empty($_POST['token'])) {
    $type = 'error';
    $message = 'Une erreur est survenue, merci d\'actualiser la page et de réessayer.';
} else {
    $pack = $_POST['diams'];
    $token = $_POST['token'];

    if ($user->InClient()) {
        $type = 'error';
        $message = 'Tu ne peux pas faire ça en étant en ligne.';
    } else {
        if ($token != $user->get('token')) {
            $type = 'error';
            $message = 'Erreur lors de la lecture du token, merci d\'actualiser la page et de réessayer.';
        } else {

            switch ($_POST['diams']) {
                case 1:
                    $prix = 5;
                    if ($prix > $user->get('tokens')) {
                        $type = 'error';
                        $message = 'Il te manque ' . ceil($prix - $user->get('tokens')) . ' ViceTokens pour pouvoir acheter le pack de diamants 1.';
                    } else {
                        $diamants = 300;
                        $add->removetokens($prix);
                        $add->diamants($diamants);
                        
                        
                        
                        $type = 'success';
                        $message = 'Félications! Tu viens de recevoir le pack de diamants 1.';
                    }
                    break;

                case 2:
                    $prix = 7;
                    if ($prix > $user->get('tokens')) {
                        $type = 'error';
                        $message = 'Il te manque ' . ceil($prix - $user->get('tokens')) . ' ViceTokens pour pouvoir acheter le pack de diamants 2.';
                    } else {
                        $diamants = 500;
                        $add->removetokens($prix);
                        $add->diamants($diamants);
                        
                        
                                    
                        $type = 'success';
                        $message = 'Félications! Tu viens de recevoir le pack de diamants 2.';
                    }
                    break;

                case 3:
                    $prix = 15;
                    if ($prix > $user->get('tokens')) {
                        $type = 'error';
                        $message = 'Il te manque ' . ceil($prix - $user->get('tokens')) . ' ViceTokens pour pouvoir acheter le pack de diamants 3.';
                    } else {   
                        $diamants = 1000;                 
                        $add->removetokens($prix);
                        $add->diamants($diamants);
                        
                        

                        $type = 'success';
                        $message = 'Félications! Tu viens de recevoir le pack de diamants 3.';
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
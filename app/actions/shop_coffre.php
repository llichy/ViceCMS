<?php
include '../../global.php';

header('Content-Type: application/json');

$prix = 0;

if (empty($_POST['coffre']) || empty($_POST['token'])) {
    $type = 'error';
    $message = 'Une erreur est survenue, merci d\'actualiser la page et de réessayer.';
} else {
    $pack = $_POST['coffre'];
    $token = $_POST['token'];

    if ($user->InClient()) {
        $type = 'error';
        $message = 'Tu ne peux pas faire ça en étant en ligne.';
    } else {
        if ($token != $user->get('token')) {
            $type = 'error';
            $message = 'Erreur lors de la lecture du token, merci d\'actualiser la page et de réessayer.';
        } else {

            switch ($_POST['coffre']) {
                case 1:
                    $prix = 5;
                    if ($prix > $user->get('tokens')) {
                        $type = 'error';
                        $message = 'Il te manque ' . ceil($prix - $user->get('tokens')) . ' ViceTokens pour pouvoir acheter le coffre 1.';
                    } else {
                        $itemcoffre = 10212;
                        $add->removetokens($prix);
                        $add->furni($itemcoffre);
                        
                        
                        $type = 'success';
                        $message = 'Félications! Tu viens de recevoir le coffre 1.';
                    }
                    break;

                case 2:
                    $prix = 10;
                    if ($prix > $user->get('tokens')) {
                        $type = 'error';
                        $message = 'Il te manque ' . ceil($prix - $user->get('tokens')) . ' ViceTokens pour pouvoir acheter le coffre 2.';
                    } else {
                        $itemcoffre = 9134;
                        $add->removetokens($prix);
                        $add->furni($itemcoffre);
                        
                                    
                        $type = 'success';
                        $message = 'Félications! Tu viens de recevoir le coffre 2.';
                    }
                    break;

                case 3:
                    $prix = 20;
                    if ($prix > $user->get('tokens')) {
                        $type = 'error';
                        $message = 'Il te manque ' . ceil($prix - $user->get('tokens')) . ' ViceTokens pour pouvoir acheter le coffre 3.';
                    } else {   
                        $itemcoffre = 9667;                 
                        $add->removetokens($prix);
                        $add->furni($itemcoffre);
                        

                        $type = 'success';
                        $message = 'Félications! Tu viens de recevoir le coffre 3.';
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
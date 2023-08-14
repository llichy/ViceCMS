<?php
include '../../global.php';

header('Content-Type: application/json');

$type = 'error';
$message = null;

if (empty($_POST['badgeid'])) {
    $message = 'Une erreur est survenue, merci d\'actualiser la page.';
} else {
    $badgeid = $_POST['badgeid'];

    $query = $db->connect()->prepare('SELECT * FROM user_badges WHERE user_id = ? AND badge_id = ?');
    $query->execute([$user->get('id'), $badgeid]);

    $fetch = $query->fetchAll();

    if (count($fetch) < 1) {
        $message = 'Ce badge n\'est pas ou plus dans ton inventaire.';
    } else {
       
        $add->removebadge($badgeid);

        $type = 'success';
    }

}

echo json_encode([
    'type' => $type,
    'message' => $message
]);
?>
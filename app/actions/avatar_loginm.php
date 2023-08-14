<?php
$is_maintenance = true;
include '../../global.php';

header('Content-Type: application/json');

$avatar = null;
$message = null;

if (empty($_POST['mailornick'])) {
    $message = 'Erreur lors du chargement de l\'avatar: champ vide';
} else {
    $query = $db->connect()->prepare('SELECT look,username FROM users WHERE username = ?');
    $query->execute([$_POST['mailornick']]);

    $fetch = $query->fetchAll();

    if (count($fetch) < 1) {
        $message = 'Erreur lors du chargement de l\'avatar: Utilisateur introuvable';
    } else {
        $avatar = $fetch[0]['look'];
        $message = 'Avatar de ' . $fetch[0]['username'] . ' chargé avec succès';
    }
}

echo json_encode([
    'avatar' => $avatar,
    'message' => $message
]);
?>

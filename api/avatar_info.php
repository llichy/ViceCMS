<?php
include '../global.php';

header('Content-Type: application/json');

if (isset($_GET['user'])) {
    $username = $_GET['user'];

    $query = $db->connect()->prepare('SELECT * FROM users WHERE username = ?');
    $query->execute([$username]);

    $fetch = $query->fetchAll();

    if (count($fetch) < 1) {
        echo json_encode([
            'type' => 'error',
            'message' => 'Utilisateur introuvable'
        ]);
    } else {
        echo json_encode([
            'id' => $fetch[0]['id'],
            'username' => $fetch[0]['username'],
            'avatar' => $fetch[0]['look'],
            'motto' => $fetch[0]['motto']
        ]);
    }
} else {
    echo json_encode([
        'type' => 'error',
        'message' => 'Ressource invalide'
    ]);
}
?>
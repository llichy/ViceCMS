<?php
include '../../global.php';

header('Content-Type: application/json');

if (empty($_POST['commentid']) || empty($_POST['articleid'])) {
    $type = 'error';
    $message = 'Une erreur est survenue, merci de réessayer ou d\'actualiser la page.';
} else {
    $commentid = $_POST['commentid'];
    $articleid = $_POST['articleid'];

    $query = $db->connect()->prepare('SELECT * FROM site_news_comments WHERE id = ? AND newsid = ?');
    $query->execute([$commentid, $articleid]);

    $fetch = $query->fetchAll();

    if (count($fetch) < 1) {
        $type = 'error';
        $message = 'Le commentaire que tu essayes de supprimer n\'existe pas ou plus.';
    } else {
        $candelete = false;

        if ($user->get('rank') >= 5 || $fetch[0]['uid'] == $user->get('id')) {
            $candelete = true;
        }

        if ($candelete) {
            $query2 = $db->connect()->prepare('DELETE FROM site_news_comments WHERE id = ?');
            $query2->execute([$commentid]);

            $type = 'success';
            $message = '';
        } else {
            $type = 'error';
            $message = 'Tu n\'as pes les droits pour supprimer ce commentaire.';
        }
    }
}

echo json_encode([
    'type' => $type,
    'message' => $message
]);
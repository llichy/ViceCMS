<?php
include '../../global.php';

header('Content-Type: application/json');

$type = 'error';
$message = null;

if (!$user->isOnline()) {
    $message = 'Il faut être connecté sur le site pour faire ça.';
} else {
    if (!strlen($_POST['newslot']) || empty($_POST['badgeid'])) {
        $message = 'Une erreur est survenue, merci d\'actualiser ta page';
    } else {
        if ($user->inClient()) {
            $message = 'Il faut te déconnecter du client pour faire ceci.';
        } else {
            $slot = $_POST['newslot'];
            $badgeid = $_POST['badgeid'];

            if ($slot != '1' && $slot != '0') {
                $message = 'Une erreur est survenue, merci d\'actualiser ta page';
            } else {
                $query = $db->connect()->prepare('SELECT * FROM user_badges WHERE user_id = ? AND badge_id = ?');
                $query->execute([$user->get('id'), $badgeid]);

                $fetch = $query->fetchAll();

                if (count($fetch) < 1) {
                    $message = 'Tu ne possède pas ce badge.';
                } else {
                    $req = false;

                    if ($slot == '1') {
                        $query2 = $db->connect()->prepare('SELECT * FROM user_badges WHERE user_id = ? AND badge_slot > ?');
                        $query2->execute([$user->get('id'), "0"]);

                        $fetch2 = $query2->fetchAll();

                        if (count($fetch2) >= 5) {
                            $message = 'Tu peux posseder 5 badges au maximum.';
                        } else {
                            $req = true;
                        }
                    } else {
                        $req = true;
                    }

                    if ($req) {
                        $query3 = $db->connect()->prepare('SELECT * FROM user_badges WHERE user_id = ? AND badge_slot > ?');
                        $query3->execute([$user->get('id'), "0"]);

                        $fetch3 = $query3->fetchAll();

                        $badgesInsert = [];
                        $j = 1;

                        for ($i = 0; $i < count($fetch3); $i++) {
                            if (!in_array($fetch3[$i]['badge_id'], $badgesInsert[$i])) {
                                array_push($badgesInsert, [
                                    'badge_id' => $fetch3[$i]['badge_id'],
                                    'badge_slot' => ($fetch3[$i]['badge_id'] == $badgeid) ? '0' : $j
                                ]);

                                if ($fetch3[$i]['badge_id'] != $badgeid) {
                                    $j++;
                                }
                            }
                        }

                        if (!in_array($badgeid, $badgesInsert[$s])) {
                            array_push($badgesInsert, [
                                'badge_id' => $badgeid,
                                'badge_slot' => ($slot == 1) ? $j : '0'
                            ]);
                        }

                        print_r($badgesInsert);

                        for ($i = 0; $i < count($badgesInsert); $i++) {
                            $query4 = $db->connect()->prepare('UPDATE user_badges SET badge_slot = ? WHERE user_id = ? AND badge_id = ?');
                            $query4->execute([$badgesInsert[$i]['badge_slot'], $user->get('id'), $badgesInsert[$i]['badge_id']]);

                            // $add->badgeSlot($badgeInsert[$i]['badge_code'], $badgeInsert[$i]['slot']);
                        }

                        $type = 'success';
                    }
                }
            }
        }
    }
}

echo json_encode([
    'type' => $type,
    'message' => $message
]);
?>
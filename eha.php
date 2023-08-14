<?php
include 'global.php'; 

    if (!$user->isOnline()) {
        $system->redirect('index');
    }


if(isset($_GET['getBanner'])) {


			$query = $db->connect()->prepare('SELECT * FROM users WHERE username = ? LIMIT 1');
			$query->execute(array($_GET['getBanner']));
			$userbanner = $query->fetch();

	echo $userbanner['banner'];

		
	}

if(isset($_GET['setBanner'])) {

	if ($us['auth_ticket'] == $_GET['sso']) {

		$req = $db->connect()->prepare('UPDATE users SET banner = ? WHERE auth_ticket = ?');
		$req->execute(array($_GET['setBanner'], $_GET['sso']));
	}

	}


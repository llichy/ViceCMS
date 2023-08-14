<?php
/**
 * User
 * Pour executer des actions sur les joueurs
 *
 * Liste des fonctions
 *  - convertCookies
 *  - isOnline
 *  - token
 *  - updatesession
 *  - newsession
 *  - getbyusername
 *  - getSettings
 *  - getStats
 * 	- getVip
 *  - colorPseudo
 *  - exist
 *  - inClient
 *  - newNotif
 *  - newNotifHotel
 *  - end
 *  - LoginError
 *  - CheckLoginError
 *  - removeJetons
 *  - addJetons
 */

class User extends Database
{
    static function convertCookies()
    {
        if (isset($_COOKIE['Pseudo']) && isset($_COOKIE['MDP'])) {
            $_COOKIE['username'] = $_COOKIE['Pseudo'];
            $_COOKIE['password'] = $_COOKIE['MDP'];

            unset($_COOKIE['Pseudo']);
            unset($_COOKIE['MDP']);
            setcookie('Pseudo', null, -1, '/');
            setcookie('MDP', null, -1, '/');
        }
    }

    static function isOnline()
    {
        self::convertCookies();

        $query = Database::connect()->prepare('SELECT user_id FROM cms_sessions WHERE token = ?');
        $query->execute([@$_COOKIE['session']]);

        $fetch = $query->fetchAll();

        if (count($fetch) > 0) {
            return true;
        } else {
            return false;
        }
    }              

	static function token($lenght = 50) {
		
		$characts    = 'abcdefghijklmnopqrstuvwxyz';
        $characts   .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
		$characts   .= '1234567890'; 
		$code_aleatoire      = null; 
		for($i=0;$i < $lenght;$i++)
		{ 
			$code_aleatoire .= substr($characts,rand()%(strlen($characts)),1); 
		} 
		return $code_aleatoire;
    }
	
	static function updatesession() {
		
		/*$query = Database::connect()->prepare('SELECT user_id FROM cms_sessions WHERE token = ? AND times < ?');
        $query->execute([$_COOKIE['session'], time()-3600]);
        $nb = $query->rowCount();

        if ($nb > 0) {*/
			
			$session = $_COOKIE['session'];	
			$token = self::token(150);
			
			$_COOKIE['session'] = $token;		
		    setcookie('session', $token, time() + (10 * 365 * 24 * 60 * 60), '/');
			
			$query = Database::connect()->prepare('UPDATE cms_sessions SET token = ?, times = ? WHERE token = ?');
			$query->execute([$token, time(), $session]);
		
		//}
    }

	static function newsession($userid, $usergent, $ip) {
		
		$query = Database::connect()->prepare('SELECT token FROM cms_sessions WHERE user_id = ? AND navigateur = ? AND user_agent = ?');
		$query->execute([$userid, System::get_browser_name($usergent), $usergent]);

		$fetch14 = $query->fetchAll();

		if(count($fetch14) > 0) {
			setcookie('session', $fetch14[0]['token'], time() + (10 * 365 * 24 * 60 * 60), '/');
		} else {
			$TokenSession = self::token(150);
			$query15 = Database::connect()->prepare('INSERT INTO cms_sessions (user_id, token, navigateur, user_agent, ip, times) VALUE (?, ?, ?, ?, ?, ?)');
			$query15->execute([$userid, $TokenSession, System::get_browser_name($usergent), $usergent, $ip, time()]);

			setcookie('session', $TokenSession, time() + (10 * 365 * 24 * 60 * 60), '/');
		}
    }
	
    static function get($information, $userid = null)
    {
        if ($userid === null) {
            if (self::isOnline()) {
                $token = $_COOKIE['session'];

                $query0 = Database::connect()->prepare('SELECT `user_id` FROM `cms_sessions` WHERE token = ?');
                $query0->execute([$_COOKIE['session']]);

                $fetch0 = $query0->fetchAll();
                $userid = $fetch0[0]['user_id'];
            }
        }


        $query = Database::connect()->prepare('SELECT `' . $information . '`,`id` FROM `users` WHERE id = ?');
        $query->execute([$userid]);

        $fetch = $query->fetchAll();

        return (count($fetch) > 0) ? htmlspecialchars($fetch[0][$information]) : "Erreur";
    }

    static function getcurrency($information, $type, $userid = null) {

        if ($userid === null) {
        if (self::isOnline()) {
        $token = $_COOKIE['session'];

        $query0 = Database::connect()->prepare('SELECT user_id FROM cms_sessions WHERE token = ?');
        $query0->execute([$_COOKIE['session']]);

        $fetch0 = $query0->fetchAll();
        $userid = $fetch0[0]['user_id'];
        }
        }

        $query = Database::connect()->prepare('SELECT `' . $information . '` FROM users_currency WHERE user_id = ? and type = ?');
        $query->execute([$userid, $type]);

        $fetch = $query->fetchAll();

        return (count($fetch) > 0) ? htmlentities($fetch[0][$information]) : "0";
    }
	
	static function getbyusername($information, $username)
    {
        $query = Database::connect()->prepare('SELECT `' . $information . '`,`id` FROM users WHERE username = ?');
        $query->execute([$username]);

        $fetch = $query->fetchAll();

        return (count($fetch) > 0) ? htmlspecialchars($fetch[0][$information]) : "Erreur";
    }
		
    static function getSettings($information, $userid = null)
    {
        if ($userid === null) {
            if (self::isOnline()) {
                $token = $_COOKIE['session'];

                $query0 = Database::connect()->prepare('SELECT user_id FROM cms_sessions WHERE token = ?');
                $query0->execute([$_COOKIE['session']]);

                $fetch0 = $query0->fetchAll();
                $userid = $fetch0[0]['user_id'];
            }
        }

        $query = Database::connect()->prepare('SELECT `' . $information . '` FROM `users_settings` WHERE user_id = ?');
        $query->execute([$userid]);

        $fetch = $query->fetchAll();

        return (count($fetch) > 0) ? htmlentities($fetch[0][$information]) : "Error";
    }

        static function getSocial($information, $userid = null)
    {
        if ($userid === null) {
            if (self::isOnline()) {
                $token = $_COOKIE['session'];

                $query0 = Database::connect()->prepare('SELECT `user_id` FROM `cms_sessions` WHERE token = ?');
                $query0->execute([$_COOKIE['session']]);

                $fetch0 = $query0->fetchAll();
                $userid = $fetch0[0]['user_id'];
            }
        }

        $query = Database::connect()->prepare('SELECT ' . $information . ' FROM player_networks WHERE player_id = ?');
        $query->execute([$userid]);

        $fetch = $query->fetchAll();

        return (count($fetch) > 0) ? htmlentities($fetch[0][$information]) : "Error";
    }


	static function getStats($information, $userid = null)
    {
        if ($userid === null) {
            if (self::isOnline()) {
                $token = $_COOKIE['session'];

                $query0 = Database::connect()->prepare('SELECT user_id FROM cms_sessions WHERE token = ?');
                $query0->execute([$_COOKIE['session']]);

                $fetch0 = $query0->fetchAll();
                $userid = $fetch0[0]['user_id'];
            }
        }

        $query = Database::connect()->prepare('SELECT ' . $information . ' FROM player_stats WHERE player_id = ?');
        $query->execute([$userid]);

        $fetch = $query->fetchAll();

        return (count($fetch) > 0) ? htmlentities($fetch[0][$information]) : "Error";
    }
	
	static function getVip($userid = null)
    {
        if ($userid === null) {
            if (self::isOnline()) {
                $token = $_COOKIE['session'];

                $query0 = Database::connect()->prepare('SELECT user_id FROM cms_sessions WHERE token = ?');
                $query0->execute([$_COOKIE['session']]);

                $fetch0 = $query0->fetchAll();
                $userid = $fetch0[0]['user_id'];
            }
        }

		$restant = 'Non VIP';
		if (self::get('is_vip', $userid) == 1) {
			$query56 = Database::connect()->prepare('SELECT * FROM club_subscription WHERE user_id = ? LIMIT 0,1');
			$query56->execute([$userid]);

			$fetch56 = $query56->fetchAll();

			if (count($fetch56) > 0 && $fetch56[0]['finish_date'] > time()) {
				$restant = System::restant($fetch56[0]['finish_date']);
			}
			
		}
		
		if(self::get('rank', $userid) > 3) {
			$restant = 'VIP illimité';
		}

        return $restant;
    }
	
    static function colorPseudo($id)
    {
        return self::get('colorpseudo', $id);
    }

    static function randomFaceLook($look, $other = null)
    {
        $avaible = ['std', 'spk', 'spk=1', 'eyb', 'sml', 'sad', 'srp', 'agr'];
        $slot = array_rand($avaible, 1);

        return AVATAR . $look . "&gesture=" . $avaible[$slot] . $other;
    }

    static function exist($info, $by)
    {
        $query = Database::connect()->prepare('SELECT COUNT(' . $by . ') FROM users WHERE ' . $by . ' = ?');
        $query->execute([$info]);

        $count = $query->fetchColumn();

        return ($count < 1) ? false : true;
    }

	static function exist1($info, $by)
    {
        $query = Database::connect()->prepare('SELECT COUNT(' . $info . ') FROM users WHERE ' . $info . ' = ?');
        $query->execute([$by]);

        $count = $query->fetchColumn();

        return ($count < 1) ? false : true;
    }
	
    static function inClient()
    {
        return (self::get('online') == 1) ? true : false;
    }

    static function newNotif($toid, $text) {
        if (self::isOnline()) {
            $query = Database::connect()->prepare('INSERT INTO player_notifications (player_id,text,date) VALUES (?, ?, ?)');
            $query->execute([$toid, $text, TIME]);
        } else {
            return false;
        }
    }
	
	static function newNotifHotel($toid, $text)
    {
        if (self::isOnline()) {
            if (self::get('online', $toid) == 1) {
                System::sendMusCommand('notifplayer', 'generic', $text, $toid);
            }

        } else {
            return false;
        }
    }
	
	static function end() {
		if (isset($_COOKIE['session'])) {
			$session = $_COOKIE['session'];

			$query = Database::connect()->prepare("DELETE FROM cms_sessions WHERE token = ?");
			$query->execute([$session]);

			unset($_COOKIE['session']);
			setcookie('session', null, -1, '/');
		}

		if (isset($_SESSION['pin'])) {
			unset($_SESSION['pin']);
		}	
		
		unset($_COOKIE['username']);
		unset($_COOKIE['password']);
		unset($_COOKIE['token']);
		setcookie('username', null, -1, '/');
		setcookie('password', null, -1, '/');
		session_destroy();

        header('Location: '.URL);
    }

	static function LoginError($userid = 0) 
	{
            $query = Database::connect()->prepare('INSERT INTO cms_login_error (ip,times,user_id) VALUES (?, ?, ?)');
            $query->execute([$_SERVER['REMOTE_ADDR'], time(), $userid]);        
    }
	
	static function CheckLoginError() 
	{
            $query = Database::connect()->prepare('SELECT COUNT(id) as tentatives FROM cms_login_error WHERE ip = ? AND times > ?');
            $query->execute([$_SERVER['REMOTE_ADDR'], time()-900]);
			$count = $query->fetchAll();
			return $count[0]['tentatives'];			
    }
	
    static function removeJetons($jetons)
    {
        if (self::isOnline()) {
            $query = Database::connect()->prepare('UPDATE users SET jetons = jetons - ? WHERE id = ?');
            $query->execute([$jetons, self::get('id')]);
        }
    }

    static function addJetons($jetons) {
        if (self::isOnline()) {
            $query = Database::connect()->prepare('UPDATE users SET jetons = jetons + ? WHERE id = ?');
            $query->execute([$jetons, self::get('id')]);
        }
    }
}
<?php
/**
 * User
 * Pour ajouter des éléments sur les joueurs
 *
 * Liste des fonctions
 *  - badge
 *  - removebadge
 *  - gift
 *  - giftmanager
 *  - respects
 *  - scratches
 *  - winwins
 *  - citycash
 *  - removecitycash
 *  - diamants
 *  - furni
 *  - newTransaction
 *  - Log
 *  - views
 */

class Add extends Database
{
    static function badge($code, $userid = null)
    {
        if ($userid === null)
            $userid = User::get('id');

        $query0 = Database::connect()->prepare('SELECT id FROM users_badges WHERE user_id = ? AND badge_code = ?');
        $query0->execute([$userid, $code]);

        if ($query0->rowCount() == 0) {
            $query1 = Database::connect()->prepare('INSERT INTO users_badges (user_id,badge_code) VALUES (?, ?)');
            $query1->execute([$userid, $code]);
			
            return true;
        }
        return false;
    }


    static function tokens($value, $userid = null)
    {
        if ($userid === null)
            $userid = User::get('id');

        $query = Database::connect()->prepare('UPDATE users SET tokens = tokens + ? WHERE id = ?');
        $query->execute([$value, $userid]);
    }

        static function xp($value, $userid = null)
    {
        if ($userid === null)
            $userid = User::get('id');

        $query = Database::connect()->prepare('UPDATE users SET ls_experience = ls_experience + ? WHERE id = ?');
        $query->execute([$value, $userid]);
    }

	static function removetokens($value, $userid = null)
    {
        if ($userid === null)
            $userid = User::get('id');

        $query = Database::connect()->prepare('UPDATE users SET tokens = tokens - ? WHERE id = ?');
        $query->execute([$value, $userid]);
    }

        static function furni($id, $userid = null)
    {
        if ($userid === null)
            $userid = User::get('id');
        
            $query = Database::connect()->prepare('INSERT INTO items (user_id,room_id,item_id) VALUE (?,?,?)');
            $query->execute([$userid, 0, $id]);
        
    }

    static function diamants($value, $userid = null)
    {
        if ($userid === null)
            $userid = User::get('id');

        $query0 = Database::connect()->prepare('SELECT * FROM users_currency WHERE user_id = ? AND type = ?');
        $query0->execute([$userid, 5]);
        $fetch52 = $query0->fetchAll();
        if (count($fetch52) < 1) {
        $query = Database::connect()->prepare('INSERT INTO users_currency (user_id,type,amount) VALUE (?,?,?)');
        $query->execute([$userid, 5, $value]);
        }else{
        $query = Database::connect()->prepare('UPDATE users_currency SET amount = amount + ? WHERE type = ? AND user_id = ?');
        $query->execute([$value, 5, $userid]);
        }
    }

        static function clefs($value, $userid = null)
    {
        if ($userid === null)
            $userid = User::get('id');

        $query0 = Database::connect()->prepare('SELECT * FROM users_currency WHERE user_id = ? AND type = ?');
        $query0->execute([$userid, 200]);
        $fetch52 = $query0->fetchAll();
        if (count($fetch52) < 1) {
        $query = Database::connect()->prepare('INSERT INTO users_currency (user_id,type,amount) VALUE (?,?,?)');
        $query->execute([$userid, 200, $value]);
        }else{
        $query = Database::connect()->prepare('UPDATE users_currency SET amount = amount + ? WHERE type = ? AND user_id = ?');
        $query->execute([$value, 200, $userid]);
        }
    }


    static function Log($string, $value = null, $userid = null)
    {
        if ($userid === null)
            $userid = User::get('id');

        $query = Database::connect()->prepare('INSERT INTO user_logs (user_id,log,value,ip,times) VALUES(?, ?, ?, ?, ?)');
        $query->execute([$userid, $string, $value, $_SERVER['REMOTE_ADDR'], TIME]);
    }

}
?>
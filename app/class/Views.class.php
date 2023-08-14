<?php
/**
 * Views
 * Pour les class globales
 *
 * Liste des fonctions:
 *  - add
 *  - count 
 *  - clean 
 */

class Views
{  
	static function add($postid, $type, $userid = null)
    {
        if ($userid === null)
            $userid = User::get('id');

		$query = Database::connect()->prepare('SELECT * FROM cms_views WHERE post_id = ? AND type = ? AND user_id = ?');
		$query->execute([$postid, $type, $userid]);
		$fetch = $query->fetchAll();
			
		if (count($fetch) == 0)
		{
			$queryinsert = Database::connect()->prepare('INSERT INTO cms_views (post_id, type, user_id) VALUES (?,?,?)');
			$queryinsert->execute([$postid, $type, $userid]);
		}		
    }
	
	static function count($postid, $type, $userid = null)
    {     
		if ($userid == null)
		{
			$query = Database::connect()->prepare('SELECT COUNT(*) FROM cms_views WHERE post_id = ? AND type = ?');
			$query->execute([$postid, $type]);
		} else {
			$query = Database::connect()->prepare('SELECT COUNT(*) FROM cms_views WHERE post_id = ? AND type = ? AND user_id = ?');
			$query->execute([$postid, $type, $userid]);
		}
	
        return $query->fetchColumn();
    }
	
	static function clean($postid, $type, $userid = null)
    {     
		if ($userid == null)
		{
			$query = Database::connect()->prepare('DELETE FROM cms_views WHERE post_id = ? AND type = ?');
			$query->execute([$postid, $type]);
		} else {
			$query = Database::connect()->prepare('DELETE FROM cms_views WHERE post_id = ? AND type = ? AND user_id = ?');
			$query->execute([$postid, $type, $userid]);
		}
	
    }
}
<?php

/**
 * Check
 * Vérifications dans les formulaires
 *
 * Liste des fonctions
 *  - IsNullOrEmptyString
 *  - antipub
 *  - validMail
 */

class Check
{

    static function IsNullOrEmptyString($str) {
        return (!isset($str) || trim($str) === '');
    }

    static function antipub($nameretro)
    {
        $mot = [" ", "/", "*", "-", "+", "=", "/", "^", "_", ".", ",", ";", "(", ")", "[", "]", "0"]; //etc
        $remplace = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "o"];

        $retro = str_replace($mot, $remplace, $nameretro);
        $retro1 = strtolower($retro);
        $retro2 = preg_replace('~\p{Mn}~u', '', $retro1);
		$retro3 = System::str_to_noaccent($retro2);
		
        $query = Database::connect()->prepare('SELECT `key` FROM `wordfilter`');
        $query->execute();
		$fetch = $query->fetchAll();
		for ($i = 0; $i < count($fetch); $i++) {
            if (strpos(trim($retro3), strtolower($fetch[$i]['key'])) !== FALSE) {
                return true;
            }
        }
        return false;
    }

    static function validMail($mail) {
        $exp = "/^[a-z\'0-9]+([._-][a-z\'0-9]+)*@([a-z0-9]+([._-][a-z0-9]+))/i";

        if (preg_match($exp, $mail)) {
            if (checkdnsrr(array_pop(explode("@", $mail)), "MX")){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

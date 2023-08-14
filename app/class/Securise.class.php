<?php

/**
 * Securise
 * Securiser les données
 *
 * Liste des fonctions
 *  - text
 *  - mdphash
 *  - EncryptMD5
 *  - UltimeText
 *  - setToken
 *  - getToken
 */

class Securise
{
    static function text($str, $avancee = false, $codeforum = false)
    {
        if ($avancee) {
            stripslashes($str);
        }

        $str = stripslashes(nl2br(htmlspecialchars($str)));
        $str = ($codeforum) ? System::bbcode_format($str) : $str;

        return $str;
    }

     static   function Hashage($s) 
    { 
    $config_hash = "xCg532%@%gdvf^5DGaa6&*rFTfg^FD4\$OIFThrR_gh(ugf*/";
    $mdp = sha1($s . $config_hash);
    return $mdp;
    }

    static function EncryptMD5($pass, $salt)
    {
        return md5(md5($salt . $pass) . md5($salt . $salt));
    }

    static function UltimeText($str, $advanced = false)
    {
        $str = stripslashes($str);

        if ($advanced != true) {
            $str = htmlspecialchars($str, ENT_COMPAT, "UTF-8");
        }

        return $str;
    }

    static function setToken()
    {
        $token = sha1(TIME . $_SERVER['HTTP_USER_AGENT'] . "xCg532%@%gdvf^5DGaa6&*rFTfg^FD4\$OIFThrR_gh(ugf*/" . $_SERVER['REMOTE_ADDR']);
        $_SESSION['token'] = $token;

        return $token;
    }

    static function getToken()
    {
        if (empty($_SESSION['token'])) {
            self::setToken();
        }

        return $_SESSION['token'];
    }

    static function encoding($str) {
        return mb_convert_encoding($str, "HTML-ENTITIES", "UTF-8");
    }
}
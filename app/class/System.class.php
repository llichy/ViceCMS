<?php
/**
 * System
 * Pour les class globales
 *
 * Liste des fonctions:
 *  - redirect
 *  - sendMusCommand
 *  - IsEven
 *  - bbcode_format
 *  - chaine_aleatoire
 *  - getCurrentFAI
 *  - UpdateSSO
 *  - remainingTime
 *  - specialreplace
 *  - timeago
 *  - UserLog
 *  - get_browser_name
 *  - toUrl
 *  - extractUTubeVidId
 *  - getSslPage
 *  - countTime
 *  - toTimestamp
 *  - mention
 *  - frenchdate
 *  - frenchdatemonth
 *  - decodeEKode
 *  - BadgeTitle
 *  - BadgeDescription
 *  - FurniTitle
 *  - FurniDescription
 *  - restant
 *  - generatePassword
 *  - str_to_noaccent
 *  - str_replace_e
 */

class System
{
    function redirect($direction, $local = true)
    {
        ob_start();

        if ($direction == 'reload') {
            header('Refresh: 0');
        } else {
            $goto = ($local) ? URL . $direction : $direction;

            header('Location: ' . $goto);
        }

        ob_end_flush();
    }

    static function sendMusCommand($command = 0, $datagive1 = 0, $datagive2 = 0, $datagive3 = 0)
    {
        $separateur = "§£";
        $data = $command . $separateur . $datagive1 . $separateur . base64_encode($datagive2) . $separateur . $datagive3;
        $connection = socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));
        socket_connect($connection, '192.168.16.52', 30008);
        if (!is_resource($connection)) {
            return false;
        } else {
            socket_send($connection, $data, strlen($data), MSG_DONTROUTE);
            return true;
        }
        socket_close($connection);
    }

    static function IsEven($int)
    {
        return ($int % 2 == 0) ? true : false;
    }

    static function smileys($message)
    {
        $mot = [":o", ":'(", ":s", ":(", ":|", ":p", ":a", ":angry", ":coeur", ":D", ":)", "(y)"];
        $remplace = ["<img src='".ASSETSURL."img/smileys/etonne_2.png'/>", "<img src='".ASSETSURL."img/smileys/cry_2.png'/>", "<img src='".ASSETSURL."img/smileys/goulou.png'/>", "<img src='".ASSETSURL."img/smileys/sad.png'/>", "<img src='".ASSETSURL."img/smileys/lost.png'/>", "<img src='".ASSETSURL."img/smileys/langue.png'/>", "<img src='".ASSETSURL."img/smileys/amoureux.png'/>", "<img src='".ASSETSURL."img/smileys/angry.png'/>", "<img src='".ASSETSURL."img/smileys/heart.png'/>", "<img src='".ASSETSURL."img/smileys/nice.png'/>", "<img src='".ASSETSURL."img/smileys/happy.png'/>", "<img src='".ASSETSURL."img/smileys/like.png'/>"];
        $message = str_replace($mot, $remplace, $message);  
        return $message;
    }

    static function bbcodes($str)
    {
        $str = nl2br(strip_tags($str));
        $simple_search = array('/\[url\=(.*?)\](.*?)\[\/url\]/is', '/\[B\](.*?)\[\/B\]/is', '/\[I\](.*?)\[\/I\]/is', '/\[U\](.*?)\[\/U\]/is');
        $simple_replace = array("<b>$1</b>", "<i>$1</i>", "<u>$1</u>");
        $str = preg_replace($simple_search, $simple_replace, $str);
        $str = self::smileys($str);
        return $str;
    }

    static function bbcode_format($str)
    {
        $simple_search = [
            '/\[b\](.*?)\[\/b\]/is',
            '/\[i\](.*?)\[\/i\]/is',
            '/\[u\](.*?)\[\/u\]/is',
            '/\[s\](.*?)\[\/s\]/is',
            '/\[quote\](.*?)\[\/quote\]/is',
            '/\[link\=(.*?)\](.*?)\[\/link\]/is',
            '/\[url\=(.*?)\](.*?)\[\/url\]/is',
			'/\[url\](.*?)\[\/url\]/is',
            '/\[img\](.*?)\[\/img\]/is',
            '/\[video_adm\](.*?)\[\/video_adm\]/is',
            '/\[center\](.*?)\[\/center\]/is',
            '/\[color\=(.*?)\](.*?)\[\/color\]/is',
            '/\[size=small\](.*?)\[\/size\]/is',
            '/\[size=large\](.*?)\[\/size\]/is',
            '/\[code\](.*?)\[\/code\]/is',
            '/\[habbo\=(.*?)\](.*?)\[\/habbo\]/is',
            '/\[room\=(.*?)\](.*?)\[\/room\]/is',
            '/\[youtube][a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)\[\/youtube]/is',
            '/\[group\=(.*?)\](.*?)\[\/group\]/is'
        ];

        $simple_replace = [
            "<strong>$1</strong>",
            "<em>$1</em>",
            "<u>$1</u>",
            "<s>$1</s>",
            "<div class=\"bbcode-quote\">$1</div>",
            "<a href=\"$1\" target=\"_blank\">$2</a>",
            "<a href=\"$1\" target=\"_blank\">$2</a>",
			"<a href=\"$1\" target=\"_blank\">$1</a>",
            "<img src=\"$1\">$2</img>",
            "<iframe width=\"250\" height=\"157\" src=\"$1\" frameborder=\"0\">$2</iframe>",
            "<center>$1</center>",
            "<span style=\"color: $1;\">$2</span>",
            "<span style=\"font-size: 9px;\">$1</span>",
            "<span style=\"font-size: 14px;\">$1</span>",
            "<pre>$1</pre>",
            "<a href=\"./profil/$1\">$2</a>",
            "<a onclick=\"roomForward(this, '$1', 'private'); return false;\" target=\"client\" href=\"./client?forwardId=2&roomId=$1\">$2</a>",
            "<iframe width=\"750\" height=\"422\" src=\"https://www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",
            "<a href=\"./groups/$1/id\">$2</a>"
        ];

        $str = preg_replace($simple_search, $simple_replace, $str);

        return $str;
    }

    static function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
    {
        $nb_lettres = strlen($chaine) - 1;
        $generation = '';

        for ($i = 0; $i < $nb_car; $i++) {
            $pos = mt_rand(0, $nb_lettres);
            $car = $chaine[$pos];
            $generation .= $car;
        }

        return $generation;
    }

    static function getCurrentFAI($ip)
    {
        $host = @gethostbyaddr($ip);
        $fai = false;

        if (substr_count($host, 'proxad')) $fai = 'free';
        if (substr_count($host, 'orange')) $fai = 'orange';
        if (substr_count($host, 'wanadoo')) $fai = 'orange';
        if (substr_count($host, 'sfr')) $fai = 'sfr';
        if (substr_count($host, 'club-internet')) $fai = 'sfr';
        if (substr_count($host, 'neuf')) $fai = 'neuf';
        if (substr_count($host, 'gaoland')) $fai = 'neuf';
        if (substr_count($host, 'bbox')) $fai = 'bouygues';
        if (substr_count($host, 'bouyg')) $fai = 'bouygues';
        if (substr_count($host, 'numericable')) $fai = 'numericable';
        if (substr_count($host, 'tele2')) $fai = 'tele2';
        if (substr_count($host, 'voo')) $fai = 'voo';
        if (substr_count($host, 'bellaliant')) $fai = 'bellaliant';
        if (substr_count($host, 'cloudmosa')) $fai = 'cloudmosa';
        if (substr_count($host, 'belgacom.be')) $fai = 'belgacom';
        if (substr_count($host, 'only')) $fai = 'only';
		if(substr_count($host, 'luxdsl')) $fai = 'luxdsl';
        return $fai;
    }

    static function getPalierLevel($xp) {
    if($xp > 105) 
    {
        $out['lvl'] = "20";
        $out['nextLvl'] = "21";
        $out['xpNxtLvl'] = "378000";
    } elseif ($xp >= 100) {
        $out['lvl'] = "19";
        $out['nextLvl'] = "20";
        $out['xpNxtLvl'] = "360000";
    } elseif ($xp >= 95) {
        $out['lvl'] = "18";
        $out['nextLvl'] = "19";
        $out['xpNxtLvl'] = "342000";
    } elseif ($xp >= 90) {
        $out['lvl'] = "17";
        $out['nextLvl'] = "18";
        $out['xpNxtLvl'] = "324000";
    } elseif ($xp >= 85) {
        $out['lvl'] = "16";
        $out['nextLvl'] = "17";
        $out['xpNxtLvl'] = "306000";
    } elseif ($xp >= 80) {
        $out['lvl'] = "15";
        $out['nextLvl'] = "16";
        $out['xpNxtLvl'] = "288000";
    } elseif ($xp >= 75) {
        $out['lvl'] = "14";
        $out['nextLvl'] = "15";
        $out['xpNxtLvl'] = "270000";
    } elseif ($xp >= 70) {
        $out['lvl'] = "13";
        $out['nextLvl'] = "14";
        $out['xpNxtLvl'] = "252000";
    } elseif ($xp >= 65) {
        $out['lvl'] = "12";
        $out['nextLvl'] = "13";
        $out['xpNxtLvl'] = "234000";
    } elseif ($xp >= 60) {
        $out['lvl'] = "11";
        $out['nextLvl'] = "12";
        $out['xpNxtLvl'] = "216000";
    } elseif ($xp >= 55) {
        $out['lvl'] = "10";
        $out['nextLvl'] = "11";
        $out['xpNxtLvl'] = "198000";
    } elseif ($xp >= 50) {
        $out['lvl'] = "9";
        $out['nextLvl'] = "10";
        $out['xpNxtLvl'] = "180000";
    } elseif ($xp >= 45) {
        $out['lvl'] = "9";
        $out['nextLvl'] = "10";
        $out['xpNxtLvl'] = "162000" ;  
    } elseif ($xp >= 40) {
        $out['lvl'] = "8";
        $out['nextLvl'] = "9";
        $out['xpNxtLvl'] = "144000";
    } elseif ($xp >= 35) {
        $out['lvl'] = "7";
        $out['nextLvl'] = "8";
        $out['xpNxtLvl'] = "126000";
    } elseif ($xp >= 30) {
        $out['lvl'] = "6";
        $out['nextLvl'] = "7";
        $out['xpNxtLvl'] = "108000";
    } elseif ($xp >= 25) {
        $out['lvl'] = "5";
        $out['nextLvl'] = "6";
        $out['xpNxtLvl'] = "90000";
  } elseif($xp >= 20) {
        $out['lvl'] = "4";
        $out['nextLvl'] = "5";
        $out['xpNxtLvl'] = "72000";
    } elseif($xp >= 15) {
        $out['lvl'] = "3";
        $out['nextLvl'] = "4";
        $out['xpNxtLvl'] = "54000";
} elseif($xp >= 10) {
        $out['lvl'] = "2";
        $out['nextLvl'] = "3";
        $out['xpNxtLvl'] = "36000";
    } else {
        $out['lvl'] = "1";
        $out['nextLvl'] = "2";
        $out['xpNxtLvl'] = "18000";
    }
 
    return $out;
}

 static function UpdateSSO($id)
    {
        $ticket = User::token(50);
        $query = Database::connect()->prepare('UPDATE users SET auth_ticket = ? WHERE id = ?');
        $query->execute([$ticket, $id]);
        return $ticket;
    }


    static function NumberFormat($n) {
        $n = (0+str_replace(",","",$n));
        if(!is_numeric($n)) return false;
        if($n>1000000000000) return round(($n/1000000000000),1).'M';
        else if($n>1000000000) return round(($n/1000000000),1).'M';
        else if($n>1000000) return round(($n/1000000),1).'M';
        else if($n>1000) return round(($n/1000),1).'K';
        return number_format($n);
    }

    static function remainingTime($date1, $date2)
    {
        $dureeSejour = intval($date1 - $date2);
        $jours = intval($dureeSejour / 86400);
        $minutes = intval($dureeSejour / 60);
        $heures = intval($minutes / 60);
        $reste = intval($minutes % 60);

        $date_finish = ($jours > 0 ? $jours . ($jours == 1 ? " jour, " : " jours") : "") . ($jours > 1 ? "" : ($jours == 1 ? ($heures > 0 ? $heures - (24) . ($heures == 1 ? " heure" : " heures et ") : "") : ($heures > 0 ? $heures . ($heures == 1 ? " heure" : " heures et ") : "")) . ($jours == 0 ? ($reste > 1 ? ($heures > 0 ? " et " : " ") . $reste . " minutes" : "") : $reste . " minute"));

        return $date_finish;
    }

    static function specialreplace($text)
    {
        $text = str_replace('-', '', $text);
        $text = str_replace('#', '', $text);
		$text = str_replace('&', '', $text);
        $text = str_replace('"', '', $text);
        $text = str_replace('\\', "", $text);
        $text = str_replace('+', '', $text);
        $text = str_replace('?', '', $text);
        $text = str_replace('&', '', $text);
        $text = str_replace('/', '', $text);
        $text = str_replace(',', '-', $text);
		$text = str_replace(':', '', $text);
        $text = str_replace('!', '', $text);
        $text = str_replace('?', '', $text);
        $text = str_replace('%', '', $text);
		$text = str_replace('[', '(', $text);
		$text = str_replace(']', ')', $text);
        $text = str_replace('>', '', $text);
        $text = str_replace('<', '', $text);
		$text = str_replace('\'', '', $text);
		$text = preg_replace ("/\s+/", " ", $text);
		$text = preg_replace('#(-)\1+#', '$1', $text);
		$text = str_replace(" ", "-", trim($text));
		
        return mb_strtolower(self::str_to_noaccent($text));
    }

static function number_format_short( $n, $precision = 1 ) {
    if ($n < 900) {
        // 0 - 900
        $n_format = number_format($n, $precision);
        $suffix = '';
    } else if ($n < 900000) {
        // 0.9k-850k
        $n_format = number_format($n / 1000, $precision);
        $suffix = 'K';
    } else if ($n < 900000000) {
        // 0.9m-850m
        $n_format = number_format($n / 1000000, $precision);
        $suffix = 'M';
    } else if ($n < 900000000000) {
        // 0.9b-850b
        $n_format = number_format($n / 1000000000, $precision);
        $suffix = 'B';
    } else {
        // 0.9t+
        $n_format = number_format($n / 1000000000000, $precision);
        $suffix = 'T';
    }

    if ( $precision > 0 ) {
        $dotzero = '.' . str_repeat( '0', $precision );
        $n_format = str_replace( $dotzero, '', $n_format );
    }
    return $n_format . $suffix;
}

    static function timeago($ptime)
    {
        $etime = time() - $ptime;

        if ($etime < 1) {
            return '0 seconde';
        }

        $a = [
            365 * 24 * 60 * 60 => 'an',
            30 * 24 * 60 * 60 => 'mois',
            24 * 60 * 60 => 'jour',
            60 * 60 => 'heure',
            60 => 'minute',
            1 => 'seconde'
        ];

        $a_plural = [
            'an' => 'ans',
            'mois' => 'mois',
            'jour' => 'jours',
            'heure' => 'heures',
            'minute' => 'minutes',
            'seconde' => 'secondes'
        ];

        foreach ($a as $secs => $str) {
            $d = $etime / $secs;

            if ($d >= 1) {
                $r = round($d);
                return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str);
            }
        }
    }

    static function UserLog($user_id, $log, $value = null)
    {
        $query = Database::connect()->prepare('INSERT INTO user_logs (user_id, log, value, ip, times) VALUE(?, ?, ?, ?, ?)');
        $query->execute([$user_id, $log, $value, $_SERVER['REMOTE_ADDR'], TIME]);
    }

    static function get_browser_name($user_agent)
    {
        if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
        elseif (strpos($user_agent, 'Edge')) return 'Edge';
        elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
        elseif (strpos($user_agent, 'Safari')) return 'Safari';
        elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
        elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Explorer';

        return 'Other';
    }

    static function toUrl($string)
    {	
		$entities = ['#', '+', '[', ']', '\\', '@', '=', '/', '$', ';', ',', '?', '!', '.','"', '\'', ':', '\''];
		$replacements = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''];
				
		$string = str_replace($entities, $replacements, $string);
		$string = preg_replace ("/\s+/", " ", $string);
		$string = preg_replace('#(-)\1+#', '$1', $string);
		$string = str_replace(" ", "-", trim($string));
	
        return mb_strtolower(self::str_to_noaccent($string));
    }

    static function extractUTubeVidId($url)
    {
        /*
        * type1: http://www.youtube.com/watch?v=9Jr6OtgiOIw
        * type2: http://www.youtube.com/watch?v=9Jr6OtgiOIw&feature=related
        * type3: http://youtu.be/9Jr6OtgiOIw
        */
        $vid_id = "";
        $flag = false;

        if (isset($url) && !empty($url)) {
            /*case1 and 2*/
            $parts = explode("?", $url);
            if (isset($parts) && !empty($parts) && is_array($parts) && count($parts) > 1) {
                $params = explode("&", $parts[1]);
                if (isset($params) && !empty($params) && is_array($params)) {
                    foreach ($params as $param) {
                        $kv = explode("=", $param);
                        if (isset($kv) && !empty($kv) && is_array($kv) && count($kv) > 1) {
                            if ($kv[0] == 'v') {
                                $vid_id = $kv[1];
                                $flag = true;
                                break;
                            }
                        }
                    }
                }
            }

            /*case 3*/
            if (!$flag) {
                $needle = "youtu.be/";
                $pos = null;
                $pos = strpos($url, $needle);
                if ($pos !== false) {
                    $start = $pos + strlen($needle);
                    $vid_id = substr($url, $start, 11);
                    $flag = true;
                }
            }
        }

        return $vid_id;
    }

    static function getSslPage($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_USERAGENT, "User-Agent: Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.49 Safari/537.36");

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    static function countTime($time)
    {
        $hours = intval(abs($time / 3600));
        $s = ($hours > 1) ? 's' : null;

        return $hours . ' heure' . $s;
    }

    static function toTimestamp($date)
    {
        $date = new DateTime($date);

        return $date->getTimestamp();
    }

    static function mention($string, $parameters = [])
    {
        $stringue = null;
        $explosion = explode("@", $string);
        $explosions = count($explosion);

        for ($i = 1; $i < $explosions; $i++) {
            $explosion2 = explode(" ", $explosion[$i]);
            $explosion2 = $explosion2[0];
            $explosion2 = preg_replace("/[^a-z\d\-=\?!@:\.]/i", "", $explosion2);

            $query6654 = Database::connect()->prepare('SELECT username,id FROM users WHERE username = ?');
            $query6654->execute([$explosion2]);

            $fetch6654 = $query6654->fetchAll();

            if (count($fetch6654) > 0) {
                if (count($parameters) > 0) {
                    if ($parameters['type'] == 'newPostForum') {
                        $sentence = 'un sujet du forum, clique ici, %a%_url_forum/' . $parameters['id'] . '-' . $parameters['stitle'] . '%' . $parameters['title'] . '%/a% pour voir le sujet.';
                        $sentencehotel = 'dans le sujet du forum suivant ' . $parameters['title'];
                    } else if ($parameters['type'] == 'newCommentForum') {
                        $sentence = 'un commentaire sur un sujet du forum, clique ici, %a%_url_forum/' . $parameters['id'] . '-' . $parameters['stitle'] . '/' . $parameters['page'] . '%' . $parameters['title'] . '%/a%, pour voir le commentaire.';
                        $sentencehotel = 'dans un commentaire sur un sujet du forum';
                    } else if ($parameters['type'] == 'newCommentNews') {
                        $sentence = 'un commentaire sur un article, pour voir celui-ci, clique ici %a%_url_news/' . $parameters['id'] . '-' . $parameters['stitle'] . '%' . $parameters['title'] . '%/a%';
                        $sentencehotel = 'dans un commentaire dans l\'article ' . $parameters['title'];
                    } else {
                        $sentence = 'Notification invalide...';
                        $sentencehotel = null;
                    }

                    if ($fetch6654[0]['id'] != user::get('id')) {
                        User::newNotif($fetch6654[0]['id'], User::get('username') . ' t\'as identifié sur ' . $sentence);

                        if ($sentencehotel != null) {
                            User::newNotifHotel($fetch6654[0]['id'], User::get('username') . " t'as identifié " . $sentencehotel);
                        }
                    }
                }

                $stringue = str_replace("@" . $explosion2, "<a class='mention' href='" . URL . "profil/" . $explosion2 . "' target='_blank'>@". $explosion2 . "</a>", $string);
            }
        }

        return ($stringue === null) ? $string : $stringue;
    }

    static function frenchdate($date)
    {
        $hour = date('G:i', $date);
        $day = date('d', $date);

        $jours = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
        $journ = date('w', $date);
        $jour = $jours[$journ];

        $moiss = ['', 'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
        $moisn = date('n', $date);
        $mois = $moiss[$moisn];

        $annee = date('Y', $date);

        return $jour . ' ' . $day . ' ' . $mois . ' ' . $annee . ' à ' . $hour;
    }
	
	static function frenchdatemonth($month)
    {    
        $moiss = ['', 'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];     
        $mois = $moiss[$month];
        return $mois;
    }

    static function decodeEKode($sentence)
    {
        $txt = null;
        $explosion = explode('%a%', $sentence);
        $explosions = count($explosion);

        if ($explosions > 1) {
            $txt = $explosion[0];

            for ($i = 0; $i < $explosions; $i++) {
                $explosion2 = explode('%/a%', $explosion[$i]);
                $explosion3 = explode('%', urldecode($explosion2[0]));

                $txt .= "<a href='";
                $txt .= $explosion3[0] . "' target='_blank'>" . $explosion3[1] . "</a>";
                $txt .= $explosion2[1];
            }

            $txt = str_replace('_url_', URL, $txt);
        }

        return ($txt === null) ? $sentence : $txt;
    }

    static function str_detect_utf8($str)
    {
        $utf8 = utf8_encode($str);
        $utf8 = mb_convert_encoding($utf8, "UTF-8");
        $contents = "Ã¡,Ã ,Ã¢,Ã¤,Ã£,Ã¥,Ã§,Ã©,Ã¨,Ãª,Ã«,Ã­,Ã¬,Ã®,Ã¯,Ã±,Ã³,Ã²,Ã´,Ã¶,Ãµ,Ãº,Ã¹,Ã»,Ã¼,Ã½,Ã¿";
        $list = explode(",", $contents);

        foreach ($list as $value) {
            if (strpos($utf8, $value) !== false) {
                return utf8_decode($utf8);
            }
        }
        return $utf8;
    }

    static function BadgeTitle($code)
    {
        $flashtext = file('/var/www/site/swf/gamedata/external_flash_texts.txt');
        $title = 'badge_name_' . $code . '=';
        $founded = $code;

        foreach ($flashtext as $text) {
            if (strpos($text, $title) !== FALSE) {
                $titlebadge = explode($title, $text);
                $founded = $titlebadge[1];
            }
        }

        return self::str_detect_utf8(trim($founded));
    }

    static function BadgeDescription($code)
    {
        $flashtext = file('/var/www/site/swf/gamedata/external_flash_texts.txt');
        $title = 'badge_desc_' . $code . '=';
        $founded = $code;

        foreach ($flashtext as $text) {
            if (strpos($text, $title) !== FALSE) {
                $titlebadge = explode($title, $text);
                $founded = $titlebadge[1];
            }
        }

        return self::str_detect_utf8(trim($founded));
    }
	
	static function FurniTitle($type, $sprite_id)
    {
        $furnidata = file_get_contents('/var/www/habbocity.me/public_html/swfs/gamedata/furnidata28.txt');
		$explodefurni = explode('["'.$type.'","'.$sprite_id.'","', $furnidata, 2);
		$explode = explode('","', $explodefurni[1]);
		
        return $explode[6];
    }
	
	static function FurniDescription($type, $sprite_id)
    {
        $furnidata = file_get_contents('/var/www/habbocity.me/public_html/swfs/gamedata/furnidata28.txt');
		$explodefurni = explode('["'.$type.'","'.$sprite_id.'","', $furnidata, 2);
		$explode = explode('","', $explodefurni[1]);
		
        return $explode[7];
    }

	static function furniIcon($name)
    {
		$name = str_replace("*","_", $name);
		$name = str_replace(".","_", $name);
		return FURNIICON.$name.'_icon.png';
    }
	
    static function restant($time)
    {
        $time2 = intval($time - TIME);

        $j = round($time2 / 86400);
        $j_r = floor($time2 % 86400);
        $h = round($j_r / 3600);
        $h_r = floor($j_r % 3600);
        $mn = round($h_r / 60);
        $mn_r = floor($h_r % 60);
        $s = round($mn_r % 60);

        $js = ($j < 2) ? null : 's';
        $hs = ($h < 2) ? null : 's';
        $mns = ($mn < 2) ? null : 's';
        $ss = ($s < 2) ? null : 's';

        $return = $j . ' jour' . $js . ' ';

        if ($j < 1)
            $return = $h . ' heure' . $hs . ' ';

        if ($j < 1 && $h < 1)
            $return = $mn . ' minute' . $mns . ' ';

        if ($j < 1 && $h < 1 && $mn < 1)
            $return = $s . ' seconde' . $ss;

        return $return;
    }

    static function generatePassword($length = 5)
    {
        $possibleChars = "123456789AZERTYUIOPQSDFGHJKLMWXCVBN";
        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $rand = rand(0, strlen($possibleChars) - 1);
            $password .= substr($possibleChars, $rand, 1);
        }

        return $password;
    }

    static function str_to_noaccent($str)
    {
        $url = $str;
        $url = preg_replace('#Ç#', 'C', $url);
        $url = preg_replace('#ç#', 'c', $url);
        $url = preg_replace('#è|é|ê|ë#', 'e', $url);
        $url = preg_replace('#È|É|Ê|Ë#', 'E', $url);
        $url = preg_replace('#à|á|â|ã|ä|å#', 'a', $url);
        $url = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $url);
        $url = preg_replace('#ì|í|î|ï#', 'i', $url);
        $url = preg_replace('#Ì|Í|Î|Ï#', 'I', $url);
        $url = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $url);
        $url = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $url);
        $url = preg_replace('#ù|ú|û|ü#', 'u', $url);
        $url = preg_replace('#Ù|Ú|Û|Ü#', 'U', $url);
        $url = preg_replace('#ý|ÿ#', 'y', $url);
        $url = preg_replace('#Ý#', 'Y', $url);

        return ($url);
    }
		
	static function description_forum_meta($str)
	{
		$str = preg_replace("#\n|\t|\r#","",$str);	
		$str = preg_replace("#[\"]+#","'", $str);		
		$str = preg_replace('`\s*(\.|,|:|\?|!)([^\.])`', '$1 $2', $str);
		$str = preg_replace('`([!\?\."])\s+([!\?\.])`', '$1$2', $str);		
		$str = preg_replace('#\[b\](.+)\[/b\]#isU', '$1 ', $str);
		$str = preg_replace('#\[i\](.+)\[/i\]#isU', '$1 ', $str);
		$str = preg_replace('#\[u\](.+)\[/u\]#isU', '$1 ', $str);
		$str = preg_replace('#\[s\](.+)\[/s\]#isU', '$1 ', $str);
		$str = preg_replace('#\[s\](.+)\[/s\]#isU', '$1 ', $str);
		$str = preg_replace('/\[center\](.*?)\[\/center\]/is', '$1 ', $str);
		$str = preg_replace('/\[color\=(.*?)\](.*?)\[\/color\]/is', '$2 ', $str);
		$str = preg_replace('/\[size=small\](.*?)\[\/size\]/is', '$2 ', $str);
		$str = preg_replace('/\[size=large\](.*?)\[\/size\]/is', '$2 ', $str);		
		$str = preg_replace('/\[quote\](.*?)\[\/quote\]/is', '', $str);
		$str = preg_replace('/\[link\=(.*?)\](.*?)\[\/link\]/is', '', $str);
		$str = preg_replace('/\[url\=(.*?)\](.*?)\[\/url\]/is', '', $str);
		$str = preg_replace('/\[img\](.*?)\[\/img\]/is', '', $str);		
		$str = preg_replace('/\[youtube][a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)\[\/youtube]/is', '', $str);
		$str = preg_replace('/\[group\=(.*?)\](.*?)\[\/group\]/is', '', $str);		
		$str = preg_replace('/\[video_adm\](.*?)\[\/video_adm\]/is', '', $str);		
		$str = preg_replace ("/\s+/", " ", $str);	
		
		$str = rtrim(strlen($str) > 305 ? substr($str, 0, 300).'...' : $str);
		$str = (strlen($str) < 10 ? 'HabboCity - Découvre le nouveau Habbo gratuitement sur HabboCity ! Crée ton Habbo et fais-toi un max d\'amis !' : $str);
		
		return $str;
	}
	
	static function str_replace_e($str)
	{
		if(preg_match('#^(a|e|i|o|u|y)#', $str))
		{
			return "'";
		}
		
		return "e ";
	}	


   static function choose($stuff, $prob0, $prob1, $prob2, $prob3, $prob4, $prob5) {
   $chance=rand(1,100);
   if ($chance<=$prob1) { $a=0; }
   elseif ($chance<=$prob2) { $a=1; }
   elseif ($chance<=$prob3) { $a=2; }
   elseif ($chance<=$prob4) { $a=3; }
   else { $a=4;}
   return $a;
   }
   
}
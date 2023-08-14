<?php

/**
 * Html
 * Charger des éléments HTML sans avoir à tout taper
 *
 * Liste des fonctions
 *  - meta
 */

class Html
{
    static function meta($page = null)
    {
        $keymeta = "habbozone, hzone, habbo-zone, ".sitename.", habbo-city, hbc, hcity, habbo city, jabbo, jabbo hotel, jabbonow, jabbohotel, jabborp, habbo-alpha, habbo alpha, habboalpha, habbolove, habbo-love, habbo love, hlove, habbolove inscription, habbo, HABBO, habboo, retro habbo, rétro habbo, serveur habbo, retro, jeux en ligne, jeu comme habbo, jeux comme habbo, site comme habbo, habbo site, serveur privé habbo, habbo beta, hbeta, habbobeta, habbo-beta, habbo-dreams, habbo dreams, habbo dream, habbo-dreams, cola-hotel, cola hotel, bobba, bobbaworld, bobba-world, world, worldhabbo, world-habbo, habbiworld, habbi-world, habbo-world, habbo world, hworld, zunny, abbo, habbi, abboz, habboz, habbo gratuit, habbo credit, habbo hotel, habbo hotel gratuit, jouer a habbo gratuitement, habbo en gratuit, habbo retro, recrutement staff, recrutement, mmorpg, vip, animateur, animation, jeu du celib, clack ou smack, staff, rencontre, celibataire, casino, rares, magots, enable, boutique, fifa, foot, cheval, chevaux, piscine, crédits gratuits, crédit gratuit, staff club, virtuel, monde, réseau social, gratuit, communauté, avatar, chat, connecté, adolescence, jeu de rôle, rejoindre, social, groupes, forums, jouer, jeux, amis, ados, jeunes, collector, créer, connecter, meuble, mobilier, animaux, déco, design, appart, décorer, partager, création, badges, musique, célébrité, chat vip, fun, sortir, mmo, chat, youtube, facebook, twitter";
        $titlemeta = "". sitename." - Découvre le nouveau Habbo gratuitement sur ". sitename." ! Crée ton Habbo et fais-toi un max d'amis !";
        
        if ($page == "forum" || $page == "room") {
            echo '<meta name="description" content="' . DESCRIPTION . '"/>';
            echo '<meta name="keywords" content="'.$keymeta.'" />';           
            echo '<meta name="google-site-verification" content="ZCAfn6XRei96Gbh_fucZKpZpBOKH4xo3QFn1sIzzZfU"/>';
            echo '<meta name="Geography" content="France"/>';
            echo '<meta name="country" content="France"/>';
            echo '<meta name="Language" content="French"/>';
            echo '<meta name="identifier-url" content="'. URL.'"/>';
            echo '<meta name="Copyright" content="'.sitename.'"/>';
            echo '<meta name="language" content="fr-FR"/>';
            echo '<meta name="hreflang" content="fr-FR"/>';
            echo '<meta name="category" content="Website">'; 
            echo '<meta name="reply-to" content="contact@habbo.fr">';                   
            echo '<meta property="og:site_name" content="'.sitename.'"/>';
            echo '<meta property="og:url" content="https://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] . '"/>';
            echo '<meta property="og:type" content="article"/>';
            echo '<meta property="og:title" content="' . TITLE . '"/>';
            echo '<meta property="og:description" content="' . DESCRIPTION . '"/>';
            echo '<meta property="og:image" content="'. ASSETSURL.'img/pub.png"/>';         
            echo '<meta property="og:locale" content="fr_FR"/>';
            echo '<meta property="fb:page_id" content=""/>';            
            echo '<meta name="twitter:title" content="' . TITLE . '"/>';
            echo '<meta name="twitter:description" content="' . DESCRIPTION . '"/>';                
            echo '<meta name="twitter:site" content="@HabboZoneFR"/>';
            echo '<meta name="twitter:card" content="summary"/>';
            echo '<meta name="twitter:image:src" content="'. ASSETSURL.'img/pub.png"/>';
            echo '<meta name="twitter:domain" content="'. URL.'"/>';
        } else if ($page == "news") {
            echo '<meta name="description" content="' . DESCRIPTION . '"/>';
            echo '<meta name="keywords" content="'.$keymeta.'" />';           
            echo '<meta name="google-site-verification" content="ZCAfn6XRei96Gbh_fucZKpZpBOKH4xo3QFn1sIzzZfU"/>';
            echo '<meta name="Geography" content="France"/>';
            echo '<meta name="country" content="France"/>';
            echo '<meta name="Language" content="French"/>';
            echo '<meta name="identifier-url" content="'. URL.'"/>';
            echo '<meta name="Copyright" content="'.sitename.'"/>';
            echo '<meta name="language" content="fr-FR"/>';
            echo '<meta name="hreflang" content="fr-FR"/>';
            echo '<meta name="category" content="Website">';   
            echo '<meta name="reply-to" content="contact@habbo.fr">';                   
            echo '<meta property="og:site_name" content="HabboZone"/>';
            echo '<meta property="og:url" content="https://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] . '"/>';
            echo '<meta property="og:type" content="article"/>';
            echo '<meta property="og:title" content="' . TITLE . '"/>';
            echo '<meta property="og:description" content="' . DESCRIPTION . '"/>';
            echo '<meta property="og:image" content="' . IMG . '"/>';           
            echo '<meta property="og:locale" content="fr_FR"/>';
            echo '<meta property="fb:page_id" content=""/>';            
            echo '<meta name="twitter:title" content="' . TITLE . '"/>';
            echo '<meta name="twitter:description" content="' . DESCRIPTION . '"/>';                
            echo '<meta name="twitter:site" content="@HabboZoneFR"/>';
            echo '<meta name="twitter:card" content="summary"/>';
            echo '<meta name="twitter:image:src" content="' . IMG . '"/>';
            echo '<meta name="twitter:domain" content="'. URL.'"/>';
        } else if ($page == "profil") {
            echo '<meta name="description" content="' . DESCRIPTION . '"/>';
            echo '<meta name="keywords" content="'.$keymeta.'" />';           
            echo '<meta name="google-site-verification" content="ZCAfn6XRei96Gbh_fucZKpZpBOKH4xo3QFn1sIzzZfU"/>';
            echo '<meta name="Geography" content="France"/>';
            echo '<meta name="country" content="France"/>';
            echo '<meta name="Language" content="French"/>';
            echo '<meta name="identifier-url" content="'. URL.'"/>';
            echo '<meta name="Copyright" content="'.sitename.'"/>';
            echo '<meta name="language" content="fr-FR"/>';
            echo '<meta name="hreflang" content="fr-FR"/>';
            echo '<meta name="category" content="Website">';   
            echo '<meta name="reply-to" content="contact@habbo.fr">';           
            echo '<meta property="og:site_name" content="'.sitename.'"/>';
            echo '<meta property="og:url" content="https://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] . '"/>';
            echo '<meta property="og:type" content="profile"/>';
            echo '<meta property="og:title" content="' . TITLE . '"/>';
            echo '<meta property="og:description" content="' . DESCRIPTION . '"/>';
            echo '<meta property="og:image" content="'. ASSETSURL.'img/pub.png"/>';     
            echo '<meta property="og:locale" content="fr_FR"/>';
            echo '<meta property="fb:page_id" content=""/>';            
            echo '<meta name="twitter:title" content="' . TITLE . '"/>';
            echo '<meta name="twitter:description" content="' . DESCRIPTION . '"/>';                
            echo '<meta name="twitter:site" content="@HabboZoneFR"/>';
            echo '<meta name="twitter:card" content="summary"/>';
             echo '<meta name="twitter:image:src" content="'. ASSETSURL.'img/pub.png"/>';
            echo '<meta name="twitter:domain" content="'. URL.'"/>';
        } else if ($page == "staff" || $page == "staff_secondaire" || $page == "rpg" || $page == "classement") {
            echo '<meta name="description" content="' . DESCRIPTION . '"/>';
            echo '<meta name="keywords" content="'.$keymeta.'" />';           
            echo '<meta name="google-site-verification" content="ZCAfn6XRei96Gbh_fucZKpZpBOKH4xo3QFn1sIzzZfU"/>';
            echo '<meta name="Geography" content="France"/>';
            echo '<meta name="country" content="France"/>';
            echo '<meta name="Language" content="French"/>';
            echo '<meta name="identifier-url" content="'. URL.'"/>';
            echo '<meta name="Copyright" content="'.sitename.'"/>';
            echo '<meta name="language" content="fr-FR"/>';
            echo '<meta name="hreflang" content="fr-FR"/>';
            echo '<meta name="category" content="Website">';   
            echo '<meta name="reply-to" content="contact@habbo.fr">';           
            echo '<meta property="og:site_name" content="'.sitename.'"/>';
            echo '<meta property="og:url" content="https://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] . '"/>';
            echo '<meta property="og:type" content="profile"/>';
            echo '<meta property="og:title" content="'.sitename.': ' . TITLE . '"/>';
            echo '<meta property="og:description" content="' . DESCRIPTION . '"/>';
            echo '<meta property="og:image" content="'. ASSETSURL.'img/pub.png"/>';     
            echo '<meta property="og:locale" content="fr_FR"/>';
            echo '<meta property="fb:page_id" content=""/>';            
            echo '<meta name="twitter:title" content="'.sitename.': ' . TITLE . '"/>';
            echo '<meta name="twitter:description" content="' . DESCRIPTION . '"/>';                
            echo '<meta name="twitter:site" content="@HabboZoneFR"/>';
            echo '<meta name="twitter:card" content="summary"/>';
            echo '<meta name="twitter:image:src" content="'. ASSETSURL.'img/pub.png"/>';
            echo '<meta name="twitter:domain" content="'. URL.'"/>';
        } else {            
            echo '<meta name="description" content="'.$titlemeta.'"/>';    
            echo '<meta name="keywords" content="'.$keymeta.'" />';   
            echo '<meta name="google-site-verification" content="ZCAfn6XRei96Gbh_fucZKpZpBOKH4xo3QFn1sIzzZfU"/>';
            echo '<meta name="Geography" content="France"/>';
            echo '<meta name="country" content="France"/>';
            echo '<meta name="Language" content="French"/>';
            echo '<meta name="identifier-url" content="'. URL.'"/>';
            echo '<meta name="Copyright" content="'. sitename.'"/>';
            echo '<meta name="language" content="fr-FR"/>';
            echo '<meta name="hreflang" content="fr-FR"/>';
            echo '<meta name="category" content="Website">';
            echo '<meta name="reply-to" content="contact@habbo.fr">';                   
            echo '<meta property="og:site_name" content="'. sitename.'"/>';
            echo '<meta property="og:url" content="'. URL.'"/>';
            echo '<meta property="og:type" content="website"/>';
            echo '<meta property="og:title" content="'. sitename.' Hôtel"/>';
            echo '<meta property="og:description" content="'. sitename.' est un jeu gratuit qui te permet de créer ton propre personnage et d\'accéder à un monde où tu pourras y faire des milliers de rencontres. Des animations sont proposées tous les jours par notre équipe d\'animateurs. Deviendras-tu le joueur le plus populaire de l\'hôtel ?"/>';
            echo '<meta property="og:image" content="'. ASSETSURL.'img/pub.png"/>';
            echo '<meta property="og:locale" content="fr_FR"/>';
            echo '<meta property="fb:page_id" content=""/>';
            echo '<meta name="twitter:title" content="'. sitename.' Hôtel"/>';
            echo '<meta name="twitter:description" content="'. sitename.' est un jeu gratuit qui te permet de créer ton propre personnage et d\'accéder à un monde où tu pourras y faire des milliers de rencontres. Des animations sont proposées tous les jours par notre équipe d\'animateurs. Deviendras-tu le joueur le plus populaire de l\'hôtel ?"/>';
            echo '<meta name="twitter:site" content="@HabboZoneFR"/>';
            echo '<meta name="twitter:card" content="summary"/>';
            echo '<meta name="twitter:image:src" content="'. ASSETSURL.'img/pub.png"/>';
            echo '<meta name="twitter:domain" content="'. URL.'"/>';                                     
        }
    }

    static function smileys($str)
    {
        $src = array(
            array(0x2600),        # BLACK SUN WITH RAYS
            array(0x1F494),        # BROKEN HEART (was U+1F493)
            array(0x1F197),        # OK SIGN (was U+1F502)
            array(0x32, 0x20E3),    # KEYCAP 2
        );

        foreach ($src as $unified) {
            $bytes = '';
            $hex = array();
            foreach ($unified as $cp) {
                $bytes .= utf8_bytes($cp);
                $hex[] = sprintf('U+%04X', $cp);
            }

            // echo "<tr>\n";
            // echo "<td>" . implode(' ', $hex) . "</td>\n";
            // echo "<td>" . HtmlSpecialChars(emoji_get_name($bytes)) . "</td>\n";
            // echo "<td>$str</td>\n";
            return "<td>" . emoji_unified_to_html($str) . "</td>\n";
            // echo "<td>" . emoji_html_to_unified(emoji_unified_to_html($str)) . "</td>\n";
            // echo "</tr>\n";
        }
    }
}
?>

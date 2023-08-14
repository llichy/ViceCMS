<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);

  $maintenance = 1;

  // DEFINE
  define('URL', 'https://vicehabbo.fr/');
  define('ADMINURL', 'https://vicehabbo.fr/admin5429');
  define('ROOTDIR', __DIR__);
  define('TIME', time());
  define('DEBUG', 4);
  define('sitename', 'ViceHabbo');

  define('CLASSDIR', ROOTDIR . '/app/class/');
  define('VIEWDIR', ROOTDIR . '/app/views/');
  define('ACTIONDIR', ROOTDIR . '/app/actions/');
  define('ACTIONURL', URL . 'app/actions/');
  define('ASSETSDIR', ROOTDIR . '/app/assets/');
  define('ASSETSURL', URL . 'app/assets/');

  define('AVATAR', 'https://avatar.vicehabbo.fr/imaging/?figure=');
  define('LINKBADGE', 'http://localhost/pack/dcr/c_images/album1584/');
  define('FURNIICON', 'hhttp://localhost/pack//dcr/hof_furni/icons/');
  define('DATAACTUELLE', date('d-m-Y'));
  define('ADM_MINRANK', 5);

  define('FILES_LOAD_LEVEL', "LVL212");

  // USE FRENCH FOR LOCALE LANGUAGE
  mb_internal_encoding('UTF-8');
  setlocale(LC_TIME, 'fr','fr_FR','fr_FR@euro','fr_FR.utf8','fr-FR','fra');
  
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $_SERVER['REMOTE_ADDR'] =  $_SERVER['HTTP_X_FORWARDED_FOR'];
$_SERVER['REMOTE_ADDR'] = (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) ? $_SERVER['HTTP_CF_CONNECTING_IP'] : $_SERVER['REMOTE_ADDR'];


  // CLASS LOADER
  include CLASSDIR . 'Autoloader.class.php';

  Autoloader::load();

  $db = new Database;
  $system = new System;
  $securise = new Securise;
  $check = new Check;
  $add = new Add;
  $user = new User;
  $html = new Html;
  $views = new Views;

  if($user->get('rank') >= 2){if($user->isOnline()) {$rank['iAdmin'] = "1";} else {$rank['iAdmin'] = "0";}} else { $rank['iAdmin'] = "0";}

  if($maintenance == "1" && !$is_maintenance && $rank['iAdmin'] < 1){
  header("Location: maintenance");
  exit;
  } elseif($rank['iAdmin'] == 1 && $maintenance == 1){
  $notify_maintenance = true;
  }
?>
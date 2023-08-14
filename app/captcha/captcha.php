<?php
session_start();
$characts = 'abdefghjklmnprstuvwxy';
$code_aleatoire = null; 
for($i=0;$i < 5;$i++) { 
	$code_aleatoire .= substr($characts,rand()%(strlen($characts)),1); 
} 
$_SESSION['captcha'] = $code_aleatoire;
$img = imagecreate(210, 60);
$bg = imagecolorallocatealpha($img, 0, 255, 0, 0);
imagecolortransparent($img, $bg);
$x = 10;
for ($i = 0; $i < strlen($code_aleatoire); $i++) {
	$y = rand(13,15);
	$l = substr($code_aleatoire, $i, 1);
	if (preg_match("/[a-zA-Z ]/", $l)) {
		($l == ' ' ? $l = '+' : $l);
		$l_img = imagecreatefromgif('img/'.$l.'.gif'); 
		$l_img_w = ImageSX($l_img); 
		$l_img_h = ImageSY($l_img);
		imagecopy($img, $l_img, $x, $y, 0, 0, $l_img_w, $l_img_h); 
		$x = $x + $l_img_w + rand(1,5);
	}
	else {
		$x = $x + 5;
	}
}
header('Content-type: image/gif');
return imagegif($img);
?>
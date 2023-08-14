<?php
/* cloudflare.php
 * by daif alotaibi (http://daif.net)
 * daif55@gmail.com 
*/

header ("Content-type: image/gif"); // L'image que l'on va créer est un jpeg

	$direction = $_GET['direction'];
	
	 $options = array('1','2','3');
	
	if(!in_array($direction, $options)) {
		
		 $direction = 1;
	}	

	if($direction == 1)
	{
		$ladirection = "&size=b&direction=3&head_direction=3&gesture=sml&img_format=png";
	}	
	if($direction == 3)
	{
		$ladirection = "&gesture=sml&img_format=png";
	}
	if($direction == 2)
	{
		$ladirection = "&size=b&direction=4&head_direction=4&gesture=sml&img_format=png";
	}	

$url = 'https://swf.habbozone.fr/habbo-imaging/avatarimage.php?figure='.$_GET['figure'].$ladirection.'&img_format=png';
$data = OpenURLcloudflare($url);
//print $data;



function OpenURLcloudflare($url) {
    //get cloudflare ChallengeForm
    $data = OpenURL($url);
    preg_match('/<form id="ChallengeForm" .+ name="act" value="(.+)".+name="jschl_vc" value="(.+)".+<\/form>.+jschl_answer.+\(([0-9\+\-\*]+)\);/Uis',$data,$out);
    if(count($out)>0) {
        eval("\$jschl_answer=$out[3];");
        $post['act']            = $out[1];
        $post['jschl_vc']        = $out[2];
        $post['jschl_answer']    = $jschl_answer;
        //send jschl_answer to the website
        $data = OpenURL($url, $post);
    }
    return($data);
}

function OpenURL($url, $post=array()) {
    $headers[] = 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:13.0) Gecko/20100101 Firefox/13.0.1';
    $headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
    $headers[] = 'Accept-Language: ar,en;q=0.5';
    $headers[] = 'Connection: keep-alive';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    if(count($post)>0) {
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/curl.cookie');
    curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/curl.cookie');
    $data = curl_exec($ch);
    return($data);
}

//echo OpenURLcloudflare($url);


   $source = imagecreatefromstring($data);

   $fond = $_GET['fond'];
   
 /*  $options = array('1','2','3');
	
	if(!in_array($fond, $options)) {*/
	if($fond > 42 || $fond < 1)
	{
		 $fond = 999;
	}	
  
	if($fond != 999) {  
	//$source = imagecreatefrompng("logo.png"); // Le logo est la source
	$destination = imagecreatefrompng("https://hzone.fr/app/assets/img/badge-perso/".$fond.".png"); // La photo est la destination

	imagecopy($destination, $source, 0, 0, 13, 18, 80, 70);

	// On affiche l'image de destination qui a été fusionnée avec le logo
	imagegif($destination);

	} else {

	$dest = imageCreate(40, 40);
	imagecopy($dest, $source, 0, 0, 13, 18, 80, 70);
	imagepng($dest);

	}
?>
<?php
include '../../global.php';

header('Content-Type: application/json');


$type = $_POST['type'];
$gender = $_POST['gender'];


if($_POST['gender'] == "M") {
	$id = 1;
$look = "https://cdn.vicehabbo.fr/imaging/?figure=hr-831-39.lg-270-1189.ch-255-76.hd-190-1.sh-39483457-62.ea-987462998-62.fa-990000214-62&direction=3&action=sml,wav&size=l";
$code = "hr-831-39.lg-270-1189.ch-255-76.hd-190-1.sh-39483457-62.ea-987462998-62.fa-990000214-62";
}elseif($_POST['gender'] == "F"){
	$id = 2;
$look = "https://cdn.vicehabbo.fr/imaging/?figure=hd-600-1.ch-987463158-76.lg-3136-76.hr-3020-56.he-989999916-99-1273.ca-990000119-1337.ea-1401-63.sh-6010262-76.ha-3173-1188&direction=3&action=sml,wav&size=l";	
$code= "hd-600-1.ch-987463158-76.lg-3136-76.hr-3020-56.he-989999916-99-1273.ca-990000119-1337.ea-1401-63.sh-6010262-76.ha-3173-1188";
}

echo json_encode([
    'id' => $id,
    'look' => $look,
    'type' => $type,
    'gender' => $gender,
    'code' => $code,
]);
?>

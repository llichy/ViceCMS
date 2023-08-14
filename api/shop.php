<?php
include '../global.php'; 

$action = isset($_GET['action']);

if($action=="check") {
		$code = isset($_GET['code']) ? preg_replace("/[^a-zA-Z0-9]+/", "", $_GET['code']) : "";
		$user_price = isset($_GET['user_price']) ? floatval($_GET['user_price']) : "";
		if(!empty($code)) {
			$dedipass = file_get_contents('http://api.dedipass.com/v1/pay/?public_key=90b1df9d708cf8ab5de6c9899f429eb0&private_key=eb6d5c983000d9247203492cedd1a5bbcc7ac687&code=' . $code);			$dedipass = json_decode($dedipass);
			if($dedipass->status=="success") {
				

			$query74 = $db->connect()->prepare('INSERT INTO cms_boutique_log (user_id,times,ip,target,type,prix) VALUES (?, ?, ?, ?, ?,?)');
			$query74->execute([$user->get('id'), TIME, $_SERVER['REMOTE_ADDR'], $code, 'DEDIPASS', $dedipass->virtual_currency]);

			$add->tokens($dedipass->virtual_currency);

				$return = array("status"=>"success", "tokens"=>$dedipass->virtual_currency, "purse_tokens"=>$user->get("tokens"));
			} else $return = array("status"=>"error");
		} else $return = array("status"=>"error");

	echo json_encode($return);

unset($_SESSION['shopapi-currency']);
} else exit;
?>
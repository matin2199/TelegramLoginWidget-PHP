<?php
$token = "BOT-TOKEN-HERE";1671434251:AAHxMdbO0Np00xcd8pGdW1OvXfeOU0iM8n0keys = array("id", "first_name", "last_name", "username", "photo_url", "auth_date");

if (isset($_GET['hash'])) {
	foreach ($_GET as $key => $value) {
		if (in_array($key, $keys)) {
			$data[] = $key."=".$value;
		}
	}

	sort($data);
	$data = implode("\n", $data);
	$secretKey = hash('sha256', $token, true);
	$hash = hash_hmac('sha256', $data, $secretKey);

	if (hash_equals($hash, $_GET['hash'])) {
		echo "Telegram data integrity check success!";
	}
}
?>

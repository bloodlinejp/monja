<?php
$authOK = false;

$user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';
$password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';

if (!empty($user) && !empty($password) && $user === strrev($password)){
	$authOK = true;
}

if (!$authOK){
	header('WWW-Authenticate: Basic realm="Top Secret Files"');
	header('HTTP/1.0 401 Unauthorized');
?>
	<html>
		<head>
			<title>認証失敗</title>
		</head>
		<body>
			<p>ダイアログがキャンセルされました。</p>
		</body>
	</html>
<?php
	exit;
} ?>

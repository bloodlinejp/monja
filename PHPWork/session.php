<?php
session_cache_limiter("private");
ini_set('use_only_cookies' , '0');
ini_set('session.use_cookies', '0');
ini_set('session.use_trans_sid' , '1');
session_start();

print("REQUEST: \n");
print_r($_REQUEST);
print("<br>\n");
print("COOKIE: \n");
print_r($_COOKIE);
print("<br>\n");

if (!isset($_SESSION["cnt"])) {
	// 新規セッション開始直後ならカウンタをクリア
	$cnt = 0;
} else {
	// そうでなければセッション変数から前回のカンタの値を得る
	$cnt = $_SESSION["cnt"];
}

if (isset($_REQUEST["countup"])) {
	// カウントアップ要求
	$cnt++;
	print("カウントアップしました<br>\n");
} else if (isset($_REQUEST["logout"])) {
	// ログアウト要求
	session_destroy();
	print("ログアウトしました<br>\n");
	exit;
}
?>

<a href="foo.php">foo</a><br>

<?php 
print<<<EOF
カウント： $cnt<br>
<a href="{$_SERVER["PHP_SELF"]}?countup=true">カウントアップ</a>
<br>
<a href="{$_SERVER["PHP_SELF"]}?logout=true">ログアウト</a>
<form method="post" action="{$_SERVER["PHP_SELF"]}">
<input type="submit" name="countup" value="カウントアップ">
<input type="submit" name="logout" value="ログアウト">
</form>
EOF;

// セッション変数を登録
$_SESSION["cnt"] = $cnt;

?>
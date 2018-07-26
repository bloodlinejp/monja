<?php
include_once "Log.php";
session_start();
?>

<html>
<head>
	<title>フロントページ</title>
</head>
<body>

<?php
$now = strftime("%c");

if(!isset($_SESSION['log1'])){
	$logger = new Log("/tmp/persistent_log");
	$_SESSION['log1'] = "";
	$logger->write("作成時刻 $now");

	echo("<p>セッションおよびログオブジェクトを作成しました。</p>");
}

$logger->write("最初のページの読み込み時刻 {$now}");

echo "<p>ログの内容</p>";
echo nl2br($logger->read());
?>

<a href="next.php">次のページへ</a>

</body>
</html>

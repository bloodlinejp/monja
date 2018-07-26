<?php
include_once "Log.php";
session_start();
?>

<html>
<head>
	<title>次のページ</title>
</head>
<body>

<?php
$now = strftime("%c");
$logger->write("2ページ目の表示時刻 {$now}");

echo "<p>ログの内容</p>";
echo nl2br($logger->read());
?>

</body>
</html>

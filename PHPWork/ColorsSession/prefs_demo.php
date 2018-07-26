<html>
<head>
	<title>玄関</title>
</head>
<?php
session_start();

$backgroundName = $_SESSION['bg'];
$foregroundName = $_SESSION['fg'];
?>

	<body bgcolor="<?= $backgroundName; ?>" text="<?= $foregroundName; ?>">

<h1>いらっしゃいませ</h1>

<p>キャプションキャプションキャプションキャプション<br />
キャプションキャプションキャプションキャプション<br />
キャプションキャプションキャプションキャプション<br />
キャプションキャプションキャプションキャプション</p>

<p><a href="colors.php">設定を変更</a>しますか？</p>

</body>
</html>


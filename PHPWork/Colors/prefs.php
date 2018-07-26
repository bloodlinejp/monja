<html>
<head>
	<title>設定の登録</title>
</head>
<body>

<?php
$colors = array(
	'black' => "#000000",
	'white' => "#ffffff",
	'red'   => "#ff0000",
	'blue'  => "#0000ff"
);

$backgroundName = $_POST['background'];
$foregroundName = $_POST['foreground'];

setcookie('bg', $colors[$backgroundName]);
setcookie('fg', $colors[$foregroundName]);
?>

<p>ありがとうございました。以下のように設定を変更しました。<br />
背景色： <?= $backgroundName; ?><br />
文字色： <?= $foregroundName; ?></p>

<p><a href="prefs_demo.php">ここ</a>をクリックすると、
設定が有効になります。</p>

</body>
</html>

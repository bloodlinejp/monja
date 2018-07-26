<?php
if(isset($_POST['bgcolor'])){
	setcookie('bgcolor', $_POST['bgcolor'], time() + (60 * 60 *24 *7));
}

if(isset($_POST['bgcolor'])){
	$backgroundName = $_POST['bgcolor'];
}
elseif(isset($_COOKIE['bgcolor'])){
	$backgroundName = $_COOKIE['bgcolor'];
}
else{
	$backgroundName = "gray";
} ?>

<html>
<head><title>Save It</title></head>
<body bgcolor="<?= $backgroundName; ?>">
<p>COOKIE : <?= isset($_COOKIE['bgcolor']) ? $_COOKIE['bgcolor'] : ''; ?></p>
<p>POST : <?= isset($_POST['bgcolor']) ? $_POST['bgcolor'] : ''; ?></p>
<p>$backgroundName : <?= $backgroundName; ?></p>
<br />

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<p>背景色：
	<select name="bgcolor">
		<option value="gray">グレー</option>
		<option value="white">白</option>
		<option value="black">黒</option>
		<option value="blue">青</option>
		<option value="green">緑</option>
		<option value="red">赤</option>
	</select>

	<input type="submit" />
</form>

</body>
</html>


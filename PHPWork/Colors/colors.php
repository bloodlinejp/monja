<html>
<head>
	<title>色の選択</title>
</head>
<body>
<form action="prefs.php" method="POST">
	<p>背景色：
		<select name="background">
			<option value="black">黒</option>
			<option value="white">白</option>
			<option value="red">赤</option>
			<option value="blue">青</option>
		</select><br />

	文字色：
		<select name="foreground">
			<option value="black">黒</option>
			<option value="white">白</option>
			<option value="red">赤</option>
			<option value="blue">青</option>
		</select><p>

		<input type="submit" value="設定の変更">
</form>

</body>
</html>


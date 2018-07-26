<html>
<head>
	<title>温度の変換</title>
</head>

<body>
<?php 
if(!isset($_GET['fahrenheit'])){ ?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
	華氏の温度を入力します。
		<input type="text" name="fahrenheit" /><br />
		<input type="submit" value="摂氏に変換！" />
	</form>
<?php }
else{
	$fahrenheit = $_GET['fahrenheit'];
	$celsius = ($fahrenheit - 32) * 5 / 9;
	printf("%.2fF は %.2fC です", $fahrenheit, $celsius);
}
?>
</body>
</html>

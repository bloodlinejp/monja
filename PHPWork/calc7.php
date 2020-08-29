<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
<head><title>複数値の足し算スクリプト。フォームVer</title></head>
<body>
<?php
	define("NUMVALS",5);

	if (isset($_GET["val"]) == FALSE) {
		print ("<form>\n");
		for ($i = 0; $i < NUMVALS; $i++) {
			print ("<input type=\"text\" name=\"val[]\">\n");
			if ($i != (NUMVALS - 1)) {
				print ("+");
			}
		}
?>
	<br>
	<input type="submit" value="計算">
	</form>
<?php
} else {
	$result = 0;
	for ($i = 0; $i < NUMVALS; $i++) {
		$v = $_GET["val"];
		$result += $v[$i];
		print ("$v[$i] ");
		if ($i != (NUMVALS - 1)) {
			print ("+ ");
		}
	}
	print (" は $result です。");
}
?>
</body>
</html>

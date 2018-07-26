<html>
	<head>
		<title>PHP MySQL Connection Test</title>
	</head>
<body>
	<?php
		$conn = new mysqli("localhost", "root", "direct01" , "mysql");
		  
		/* 接続状況チェック */
		if ($conn->connect_errno) {
    		printf("Connect failed: %s\n", $conn->connect_error);
    		exit();
		}
		
		$str="select User,Host from user";
		
		/* 連想配列取得 */
		/*
		$result = $conn->query($str);
		while ($row = $result->fetch_assoc()) {
		printf ("%s (%s)<br />\n", $row["User"] , $row["Host"]);
		}
		*/
		$result = $conn->query($str);

print<<<EOF
<style type="text/css">
.tbl {
	border-collapse: collapse;
}
</style>
<table class="tbl" border=1>\n
EOF;
		while ($row = $result->fetch_assoc()) {
		print("<tr><td>".$row["User"]."</td><td>".$row["Host"]."</td></tr>\n");
		}
		print("</table>");
		
		/* 結果セット開放 */
    	$result->free();

	/* 接続を閉じる */
	$conn->close();
	
	?>
</body>
</html>
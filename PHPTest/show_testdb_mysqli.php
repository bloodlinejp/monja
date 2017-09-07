<html>
	<head>
		<title>Show Test Database</title>
	</head>
<body>
	<?php
		$conn = new mysqli("localhost", "webapp", "direct01" , "testdb");
		  
		/* 接続状況チェック */
		if ($conn->connect_errno) {
    		printf("Connect failed: %s\n", $conn->connect_error);
    		exit();
		}
		
		$str="select * from id_master";
		
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
		print("<tr>\n".
				"<td>".$row["id"]."</td>\n".
				"<td>".$row["l_name"]."</td>\n".
				"<td>".$row["f_name"]."</td>\n".
				"<td>".$row["mail_address_1"]."</td>\n".
				"<td>".$row["mail_address_2"]."</td>\n".
				"<td>".$row["phone_number_1"]."</td>\n".
				"<td>".$row["phone_number_2"]."</td>\n".
				"<td>".$row["zipcode_1"]."</td>\n".
				"<td>".$row["zipcode_2"]."</td>\n".
				"<td>".$row["address"]."</td>\n".
				"<td>".$row["country"]."</td>\n".
				"<td>".$row["update_time_stamp"]."</td>\n".
			"</tr>\n");
		}
		print("</table>");
		
		/* 結果セット開放 */
    	$result->free();

	/* 接続を閉じる */
	$conn->close();
	
	?>
</body>
</html>
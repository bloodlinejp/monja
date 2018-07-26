<html>
	<head>
		<title>Show Test Database PDO pgsql</title>
	</head>
<body>
	<?php
		$dsn = 'pgsql:dbname=testdb host=localhost port=5432';
		$user = 'webapp';
		$password = 'direct01';

		try{
			$dbh = new PDO($dsn, $user, $password);
		}catch (PDOException $e){
			print('Error:'.$e->getMessage());
			die();
		}
		$dbh = null;

		try{
			$dbh = new PDO($dsn, $user, $password);

			print('接続に成功しました。<br>');

    		$sql = 'select * from id_master';
// 		    foreach ($dbh->query($sql) as $row) {
//         		print($row['id']);
//         		print($row['l_name']);
//         		print($row['f_name']);
//         		print($row['mail_address_1']);
//         		print($row['mail_address_2']);
//         		print($row['phone_number_1'].'<br>');
//     		}

print<<<EOF
<br>
<style type="text/css">
.tbl {
	border-collapse: collapse;
}
</style>
<table class="tbl" border=1>\n
EOF;
			$result = $dbh->query($sql);
    		while ($row = $result->fetch()) {
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

	}catch (PDOException $e){
	    print('Error:'.$e->getMessage());
    	die();
}


$dbh = null;

?>

</body>
</html>
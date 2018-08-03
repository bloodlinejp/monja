<?php
$xml = "books.xml";
$xmlObject = simplexml_load_file($xml);
$xmlArray = json_decode(json_encode($xmlObject), true);

// echo "========= Object ==========\n";
// print_r($xmlObject);
// echo "\n";
// echo "========= Array ==========\n";
// print_r($xmlArray);
// echo "{$xmlArray['book'][0]['title']}";
?>

<html>
<head>
	<title>ブックXML</title>
</head>
<body>
	<table border="1">
		<tbody>
			<tr>
				<tr>
					<th>タイトル：</th>
					<td>著者：</td>
					<td>ISBN：</td>
					<td>コメント：</td>
				</tr>
<?php
foreach ($xmlArray['book'] as $bookArray) {
	echo "<tr>\n";
	echo "<th>{$bookArray['title']}</th>\n";
	echo "<td>" . (is_array($bookArray['authors']['author']) ? join(', ', $bookArray['authors']['author']) : $bookArray['authors']['author']) . "</td>\n";
	echo "<td>{$bookArray['isbn']}</td>\n";
	echo "<td>{$bookArray['comment']}</td>\n";
	echo "</tr>\n";
} ?>
		</tbody>
	</table>
</body>
</html>

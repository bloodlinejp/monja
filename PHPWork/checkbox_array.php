<html>
<head>
	<title>性格診断</title>
</head>
<body>

<?php
$attrs = isset($_GET['attributes']) ? $_GET['attributes'] : array();

function makeCheckboxes($name, $query, $options)
{
	foreach($options as $key => $value){
		$checked = in_array($key, $query) ? "checked" : '';

		echo "<input type=\"checkbox\" name=\"{$name}[]\" value=\"{$key}\" {$checked} />";
		echo "{$value}<br />\n";
   	}
}

$personalityAttributes = array(
	'perky'    => "生意気",
	'morse'    => "気難しい",
	'thinking' => "理性的",
	'feeling'  => "感情的",
	'thrifty'  => "倹約家",
	'prodigal' => "浪費家"
	);
?>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
	当てはまる項目を選択してください。<br />
		<?php makeCheckboxes('attributes', $attrs, $personalityAttributes); ?><br />
		<input type="submit" name="s" value="記録する" />
	</form>

	<?php if(array_key_exists('s', $_GET)){
		$description = join(' ', $_GET['attributes']);
		echo "あなたの性格は {$description} です。";
	} ?>

</body>
</html>

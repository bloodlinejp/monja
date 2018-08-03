<?php
include_once("func_template.php");

$bindings['DESTINATION'] = $_SERVER['PHP_SELF'];

$name = isset($_GET['name']) ? $_GET['name'] : '';

if (!empty($name)) {
	$template = "thankyou.template";
	$bindings['NAME'] = $name;
}
else {
	$template = "user.template";
}

echo fillTemplate($template, $bindings);
?>

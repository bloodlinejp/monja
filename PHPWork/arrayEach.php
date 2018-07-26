<?php

$ages = array(
	'Person' => "Age",
	'Fred' => 35,
	'Barney' => 30,
	'Tigger' => 8,
	'Pooh' => 40
);

reset($ages);

list($c1, $c2) = each($ages);

echo("<table>\n<tr><th>{$c1}</th><th>{$c2}</th></tr>\n");

while (list($c1, $c2) = each($ages)) {
	echo("<tr><td>{$c1}</td><td>{$c2}</td></tr>\n");
}

echo("</table>");

?>

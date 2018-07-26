<?php
function doubler(&$value)
{
	$value = $value << 1;
	echo '$value = ' . $value;
	echo '<br />';

}

$a = 3;
echo '$a = ' . $a;
echo '<br />';
doubler($a);
echo 'doubler($a)';
echo '<br />';
echo '$a = ' . $a;

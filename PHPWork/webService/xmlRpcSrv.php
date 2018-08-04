<?php
function times ($method, $args)
{
	return $args[0] * $args[1];
}

// $request = $HTTP_RAW_POST_DATA;
$request = file_get_contents("php://input");

if (!$request && isset($_POST['xml'])) {
	$requestXml = $_POST['xml'];
}

$server = xmlrpc_server_create() or die("Couldn't create server");

xmlrpc_server_register_method($server, "multiply", "times");

$options = array(
	'output_type' => 'xml',
	'version'=> 'auto',
);

echo xmlrpc_server_call_method($server, $request, null, $options);

xmlrpc_server_destroy($server);
?>

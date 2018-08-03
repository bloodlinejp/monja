<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['mode' => 'ja']);
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->WriteHTML("<h1>ようこそ！カタカナ・漢字</h1>");
$mpdf->Output();

?>

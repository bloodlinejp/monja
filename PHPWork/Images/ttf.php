<?php
$image = imagecreate(350, 70);
$white = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
$black = imagecolorallocate($image, 0x00, 0x00, 0x00);

// putenv("GDFONTPATH=" . realpath('.'));
// echo ("GDFONTPATH=" . realpath('.'));

imagettftext($image, 20, 0, 10, 40, $black, 'courbi', "Courier TrueType");

header("Content-Type: image/png");
imagepng($image);


<?php
$image = imagecreate(200, 200);
$white = imagecolorallocate($image, 0xFF, 0xFF,  0xFF);
$black = imagecolorallocate($image, 0x00, 0x00,  0x00);

imagestring($image, 1, 10, 10, "Font 1: ABCDEfghij", $black);
imagestring($image, 2, 10, 30, "Font 1: ABCDEfghij", $black);
imagestring($image, 3, 10, 50, "Font 1: ABCDEfghij", $black);
imagestring($image, 4, 10, 70, "Font 1: ABCDEfghij", $black);
imagestring($image, 5, 10, 90, "Font 1: ABCDEfghij", $black);

header("Content-Type: image/png");
imagepng($image);


<?php

$image = imagecreatetruecolor(256, 150);

for($x = 0; $x < 256; $x++){
	imageline($image, $x, 0, $x, 49, $x);
	imageline($image, 255 - $x, 50, 255 - $x, 99, $x << 8);
	imageline($image, $x, 100, $x, 149, $x << 16);
}

header("Content-Type: image/png");
imagepng($image);

<?php
$size = 500;
$color = $_GET['color'];
$red = hexdec(substr($color, 1, 2));
$green = hexdec(substr($color, 3, 2));
$blue = hexdec(substr($color, 5, 2));

$gdImage = imagecreate($size, $size);
imagecolorallocate($gdImage, $red, $green, $blue);

header('Content-Type: image/png');

// and finally, output the result
imagepng($gdImage);
// imagedestroy($gdImage);
?>
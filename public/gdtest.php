<?php
if (isset($_GET['color'])) {
    $color = $_GET['color'];
    $red = hexdec(substr($color, 1, 2));
    $green = hexdec(substr($color, 3, 2));
    $blue = hexdec(substr($color, 5, 2));
    
    
    $size = 500;
    $gdImage = imagecreate($size, $size);
    imagecolorallocate($gdImage, $red, $green, $blue);
    
    
    header('Content-Type: image/png');
    imagepng($gdImage);
    imagedestroy($gdImage);
    return;
}
?>

<form>
    <input type="color" name="color">
    <input type="submit">
</form>
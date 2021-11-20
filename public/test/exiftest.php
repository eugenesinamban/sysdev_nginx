<?php

$imagePath = "./img/2.jpg";

$exif_imagetype = exif_imagetype($imagePath);

$exif_thumbnail =  exif_thumbnail($imagePath);

$exif_data = (exif_read_data($imagePath));
?>
<img src="./img/2.jpg" style="width: 350px;"></img><br></br>
この画像のExifは <br>
<?php 
foreach ($exif_data as $key => $data) {
    ?>

    [<?php echo $key; ?>] => <?php echo $data, "\n"; ?><br>

    <?php
}?>
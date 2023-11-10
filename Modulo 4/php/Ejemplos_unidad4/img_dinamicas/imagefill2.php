<?php
header("Content-type: image/png");
$im = imagecreate(300,200);
$fondo=imagecolorallocate ($im, 0, 0, 200);
imagefill ($im, 0, 0, $fondo); 
imagepng($im);
imagedestroy($im);
?>
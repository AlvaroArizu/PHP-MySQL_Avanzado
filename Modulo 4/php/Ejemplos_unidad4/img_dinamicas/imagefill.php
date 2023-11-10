<?php
header("Content-type: image/jpeg");
$im = imagecreate(200,200);
$fondo=imagecolorallocate ($im, 0, 0, 200);
imagefill ($im, 0, 0, $fondo); 
imagejpeg($im);
imagedestroy($im);
?>
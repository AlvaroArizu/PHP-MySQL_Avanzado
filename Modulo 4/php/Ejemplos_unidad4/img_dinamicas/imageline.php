<?php
header("content-type: image/png");
$im = imagecreate(200,200);
$fondo=imagecolorallocate ($im,0,0,255);
$linea=imagecolorallocate ($im,255,255,255); 
imageline($im,0,0,200,200,$linea);
imagepng($im);
imagedestroy($im);  
?>
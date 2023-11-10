<?php
header("Content-type: image/jpeg");
$im = imagecreate(200,200);
$fondo=imagecolorallocate ($im, 0, 0, 200);
$blanco=imagecolorallocate ($im, 255, 255, 255);
imagefill ($im, 0, 0, $fondo); 
imagerectangle ($im, 10, 10, 190, 190, $blanco);
imagejpeg($im);
imagedestroy($im);
?>
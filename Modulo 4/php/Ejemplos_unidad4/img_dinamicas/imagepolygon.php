<?php
header("Content-type: image/jpeg");
$esquinas=array(20,100,100,180,180,100,100,20);
$im = imagecreate(200,200);
$fondo=imagecolorallocate ($im, 0, 0, 200);
$blanco=imagecolorallocate ($im, 255, 255, 255);
$negro=imagecolorallocate ($im, 0, 0, 0);
$amarillo=imagecolorallocate ($im, 255, 255,0);
imagefill ($im, 0, 0, $fondo); 
imagerectangle ($im, 10, 10, 190, 190, $blanco);
imagefilledrectangle ($im, 20, 20, 180, 180, $amarillo);
imagepolygon ($im, $esquinas, 4, $negro);
imagejpeg($im);
imagedestroy($im);  
?>
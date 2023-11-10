<?php
header("Content-type: image/jpg");
$esquinas=array(20,100,100,180,180,100,100,20);
$fondo_img="pink.jpg";
$im = imagecreatefromjpeg($fondo_img);
$fondo=imagecolorallocate ($im, 0, 0, 200);
$blanco=imagecolorallocate ($im, 255, 255, 255);
$amarillo=imagecolorallocate ($im, 255, 255,0);
$negro=imagecolorallocate($im, 0, 0,0);
$rojo=imagecolorallocate ($im, 255, 0, 0);
imagefill ($im, 0, 0, $fondo); 
imagerectangle ($im, 10, 10, 190, 190, $blanco);
imagefilledrectangle ($im, 20, 20, 180, 180, $amarillo);
imagepolygon ($im, $esquinas, 4, $blanco);
imagearc ($im, 100, 100, 160, 160, 0, 360, $fondo);
imagearc ($im, 100, 100, 160, 100, 0, 360, $rojo);
imagejpeg($im);
imagedestroy($im);  
?>

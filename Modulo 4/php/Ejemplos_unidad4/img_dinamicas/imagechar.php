<?php
    header("content-type: image/png");
	$im = imagecreate(150,150);
	$t1="A";
	$t2="B";
	$t3="C";
	$t4="D";
	$t5="E";
   
    $fondo=imagecolorallocate ($im, 0, 0, 200);
    $amarillo=imagecolorallocate ($im, 255, 255,0);

    imagechar ($im, 1, 0, 0, $t1, $amarillo);
    imagechar ($im, 2, 20, 20, $t2, $amarillo);
    imagechar ($im, 3, 40, 40, $t3, $amarillo);
    imagechar ($im, 4, 60, 60, $t4, $amarillo);
    imagechar ($im, 5, 80, 80, $t5, $amarillo);

    imagepng($im);
    imagedestroy($im);
   
?>


<?php
    header("content-type: image/png");
    $im = imagecreate(150,150);
	$t1="Antonio";
	$t2="Beatriz";
	$t3="Carlos";
	$t4="Diana";
	$t5="Eugenia"; 
    $fondo=imagecolorallocate ($im, 0, 0, 200);
    $amarillo=imagecolorallocate ($im, 255, 255,0);

    imagestring ($im, 1, 10, 20, $t1, $amarillo);
    imagestring ($im, 2, 10, 40, $t2, $amarillo);
    imagestring ($im, 3, 10, 60, $t3, $amarillo);
    imagestring ($im, 4, 10, 80, $t4, $amarillo);
    imagestring ($im, 5, 10, 100, $t5, $amarillo);

    imagepng($im);
    imagedestroy($im); 
?>


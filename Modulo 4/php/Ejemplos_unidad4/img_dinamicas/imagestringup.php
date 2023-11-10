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

    imagestringup ($im, 1, 10, 100, $t1, $amarillo);
    imagestringup ($im, 2, 20, 100, $t2, $amarillo);
    imagestringup ($im, 3, 40, 100, $t3, $amarillo);
    imagestringup ($im, 4, 60, 100, $t4, $amarillo);
    imagestringup ($im, 5, 80, 100, $t5, $amarillo);

    imagepng($im);
    imagedestroy($im);
   
?>




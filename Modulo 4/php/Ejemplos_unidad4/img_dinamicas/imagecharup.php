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

    imagecharup ($im, 1, 10, 10, $t1, $amarillo);
    imagecharup ($im, 2, 20, 20, $t2, $amarillo);
    imagecharup ($im, 3, 40, 40, $t3, $amarillo);
    imagecharup ($im, 4, 60, 60, $t4, $amarillo);
    imagecharup ($im, 5, 80, 80, $t5, $amarillo);

    imagepng($im);
    imagedestroy($im);
   
?>



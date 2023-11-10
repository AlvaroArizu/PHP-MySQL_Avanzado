<?php

$image = "php_avanzado.jpg";
$repeat = true; //true or false
$watermark = "marca_de_agua.png";

$im = imagecreatefrompng($watermark);

$ext = substr($image, -3);


if(strtolower($ext) == "gif") {
if (!$im2 = imagecreatefromgif($image)) {
echo "Error opening $image!"; exit;
}
} else if(strtolower($ext) == "jpg") {
if (!$im2 = imagecreatefromjpeg($image)) {
echo "Error opening $image!"; exit;
}
} else if(strtolower($ext) == "png") {
if (!$im2 = imagecreatefrompng($image)) {
echo "Error opening $image!"; exit;
}
} else {
die;
}

imagecopy($im2, $im, (imagesx($im2)/2)-(imagesx($im)/2), (imagesy($im2)/2)-(imagesy($im)/2), 0, 0, imagesx($im), imagesy($im));

if($repeat) {
$waterless = imagesx($im2) - imagesx($im);
$rest = ceil($waterless/imagesx($im)/2);

for($n=1; $n<=$rest; $n++) {
imagecopy($im2, $im, ((imagesx($im2)/2)-(imagesx($im)/2))-(imagesx($im)*$n), (imagesy($im2)/2)-(imagesy($im)/2), 0, 0, imagesx($im), imagesy($im));
imagecopy($im2, $im, ((imagesx($im2)/2)-(imagesx($im)/2))+(imagesx($im)*$n), (imagesy($im2)/2)-(imagesy($im)/2), 0, 0, imagesx($im), imagesy($im));
}
}

header("Content-Type: image/jpeg");
imagejpeg($im2);
imagedestroy($im);
imagedestroy($im2);

?> 
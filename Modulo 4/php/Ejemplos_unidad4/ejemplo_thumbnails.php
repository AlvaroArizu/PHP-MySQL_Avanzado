<!DOCTYPE html>
<html>
<head>
	<title>Ejemplos Unidad 4</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<main class="container">
<?php
include("botonera_uni4.php");
?>
<section>
	<h1>Imágenes PHP</h1>
	<?php
$alto=300;
$ancho=400;
$src_img= @imagecreatefromjpeg('space.jpg');
$dst_img = @imagecreatetruecolor($ancho,$alto);
$imagen = @imagecreate($ancho,$alto);

@imagecopyresized($dst_img, $src_img, 0,0,0,0, $ancho, $alto, ImageSX($src_img), ImageSY($src_img));
@imagejpeg($dst_img,"space_thumb.jpg");

@imagecopyresized($imagen, $src_img, 0,0,0,0, $ancho, $alto, ImageSX($src_img), ImageSY($src_img));
@imagejpeg($imagen,"space_thumb2.jpg");

@imagedestroy($dst_img);
?>
<img src="space.jpg" class="imagen">
<img src="space_thumb.jpg">
<img src="space_thumb2.jpg">


</section>
</main>
</body>
</html>
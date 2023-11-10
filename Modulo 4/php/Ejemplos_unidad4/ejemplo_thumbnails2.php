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
$ruta="prog.gif";
$fuente = @imagecreatefromgif($ruta);
$alto=200;
$ancho=200;
$imgAncho = imagesx($fuente);
$imgAlto =imagesy($fuente);
$imagen = ImageCreate($ancho,$alto);

ImageCopyResized($imagen,$fuente,0,0,0,0,$ancho,$alto,$imgAncho,$imgAlto);

imageGif($imagen,"01_thumb.gif");
?>
<img src="01_thumb.gif">

<img src="prog.gif">


</section>
</main>
</body>
</html>
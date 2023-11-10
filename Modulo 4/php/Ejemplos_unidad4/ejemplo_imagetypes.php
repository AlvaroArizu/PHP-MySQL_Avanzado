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
	<h1>Función imagetypes()</h1>
<?php

if (imagetypes() & IMG_GIF) {
    echo "<p>El tipo GIF es soportado</p>";
                   }else{
    echo "<p>El tipo GIF NO ES SOPORTADO</p>";
}
if (imagetypes() & IMG_PNG) {
    echo "<p>El tipo PNG es soportado</p>";
                   }else{
    echo "<p>El tipo PNG NO ES SOPORTADO</p>";
}
if (imagetypes() & IMG_JPG) {
    echo "<p>El tipo JPG es soportado</p>";
                   }else{
    echo "<p>El tipo JPG NO ES SOPORTADO</p>";
}
if (imagetypes() & IMG_WBMP) {
    echo "<p>El tipo WBMP es soportado</p>";
                   }else{
    echo "<p>El tipo WBMP NO ES SOPORTADO</p>";
}
?>

</section>
</main>
</body>
</html>
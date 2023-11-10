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
	<h1>GD</h1>
<?php

if (function_exists("gd_info")){
	echo "GD está disponible";
	echo "<pre>";
	print_r(gd_info()); 
	echo "</pre>";
} else {
	echo "GD no está disponible";
}

?>

</section>
</main>
</body>
</html>
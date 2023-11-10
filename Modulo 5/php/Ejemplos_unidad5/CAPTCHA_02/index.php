<?php
session_start(); // Iniciamos la sesion
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ejemplos Unidad 5</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../estilos.css">
</head>
<body>
	<main class="container">
<?php
include("../botonera_uni5.php");
?>
<section>
	<h1>Captcha 1</h1>
<form action="verificacion.php">
	<img src="captcha.php" /><br/>
	<input type="text" size="16" name="captcha" />
	<input type="submit" />
</form>

</section>
</main>
</body>
</html>
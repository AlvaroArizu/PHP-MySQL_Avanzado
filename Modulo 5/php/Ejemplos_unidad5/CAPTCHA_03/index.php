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
	<h1>Captcha 3</h1>
<img src="captcha.php" border="0" />

<form name="captcha-form" method="POST" action="captcha-verify.php">

         <input type="text" name="code" width="25" />

         <input type="submit" name="submit" value="submit" />

</form>

</section>
</main>
</body>
</html>
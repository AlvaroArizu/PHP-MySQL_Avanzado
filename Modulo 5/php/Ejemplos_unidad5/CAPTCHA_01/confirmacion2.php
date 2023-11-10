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
<?php
$confirmacion = $_POST['confirmacion'];
if($confirmacion == $_SESSION['codigos'])
{
echo "<p>Codigo correcto</p>";
}else{
echo "<p>Error</p>";
echo "<a href='index.php'>Volver</a>";
}
?>

</section>
</main>
</body>
</html>
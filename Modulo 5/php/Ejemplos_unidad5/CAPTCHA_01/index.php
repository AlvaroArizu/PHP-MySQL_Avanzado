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

$numero1= rand(0,9);
$numero2= rand(0,9);
$numero3= rand(0,9);
$minus = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","ñ","o","p","q","r","s","t","u","v","w","x","y","z");
$mayus = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","Y","Z");
$signos = array("!","#","$","%","&","=");

$generador_min = rand(0,26);
$generador_may = rand(0,26);
$generador_sig = rand(0,5);


$_SESSION["codigos"] = ($numero1).($minus[$generador_min]).($numero2).($mayus[$generador_may]).($signos[$generador_sig]).($numero3); // Guardamos el texto del CAPTCHA en la sesion
echo "<img src=imagen2.php>";
?>
<form action="confirmacion2.php" method="post">
  <label>Escriba código de seguridad: </label>
  <input name="confirmacion" type="text" id="confirmacion" />
    <input type="submit" name="Submit" value="Comprobar" />
</form>

</section>
</main>
</body>
</html>
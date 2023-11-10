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
<?php
/* 

Primero encriptar la clave pasada por el formulario, luego compartirla con la clave ya encriptada que hemos almacenado dentro de nuestra variable de sesión

*/

if( md5( $_POST[ 'code' ] ) != $_SESSION[ 'key' ] ) {

       echo "Ingresó el código incorrecto. Vuelva a intentarlo.";

} else {

       echo "Éxito, has introducido el código correcto!";

}

?>

</section>
</main>
</body>
</html>
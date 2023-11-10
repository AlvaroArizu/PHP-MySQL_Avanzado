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
	<?php
	  if(strtoupper($_REQUEST["captcha"]) == $_SESSION["captcha"]){
		 // REMPLAZO EL CAPTCHA USADO POR UN TEXTO LARGO PARA EVITAR QUE SE VUELVA A INTENTAR
		 $_SESSION["captcha"] = md5(rand()*time());
	 	 // INSERTA EL CÓDIGO EXITOSO AQUI
		 echo "Correcto";
	  }else{
		 // REMPLAZO EL CAPTCHA USADO POR UN TEXTO LARGO PARA EVITAR QUE SE VUELVA A INTENTAR
		 $_SESSION["captcha"] = md5(rand()*time());
	 	 // INSERTA EL CÓDIGO DE ERROR AQUÍ
		 echo "Incorrecto";
	  }
?>

</section>
</main>
</body>
</html>
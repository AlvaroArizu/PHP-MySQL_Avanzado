<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" >
<title>Funciones</title>
</head>

<body>


<?php
function iva($base,$porcentaje=21){//creo la funcion iva y declaro 21 como valor por defecto de $porcentaje
   return $base * $porcentaje /100;
}

echo "<p>El iva 21% de 1.000 es:  " .iva(1000) . "</p>";// como no paso el valor del iva toma el que definì por defecto (21)
echo "<p>El iva 10.5% de 1.000 es:  " .iva(1000,10.5) . "</p>";
echo "<p>El iva excento de 1.000 es:  " .iva(10,0) . "</p>";
?>




</body>
</html>

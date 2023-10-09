<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" >
<title>Funciones</title>
</head>

<body>
<?php

function cuadrado($numero){
return $numero * $numero;
}

$num = 6;
$resultado = cuadrado($num);
echo($num." al cuadrado es: ".$resultado."<br />");
//imprime 36
?>

</body>
</html>

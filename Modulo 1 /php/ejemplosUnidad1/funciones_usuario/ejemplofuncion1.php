<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" >
<title>Funciones</title>
</head>

<body>
<?php

function sumaRecursiva($a, $b){//creo la funcion sumaRecursiva
$suma = $a + $b;
return $suma;
} 

function dosmasdos(){ //creo la funcion dosmasdos
$sumatoria = sumaRecursiva(2,2);
echo $sumatoria;
}

echo sumaRecursiva(5,2)."<br/>"; // muestro el resultado de la funcion sumaRecursiva con los paràmetros 5 y 2
dosmasdos(); // llamo a la funcion dosmasdos que ademàs de hacer el càlculo muestra el resultado

?> 

</body>
</html>

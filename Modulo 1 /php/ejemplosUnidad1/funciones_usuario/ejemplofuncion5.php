<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Funciones</title>
</head>

<body><?php
function agregar($string) {// Paso por referencia del parámetro. Los cambios también se verán reflejados fuera de la funcián.

$string .= ' y otro texto.</p>';
}

$str = '<p>Esto es una cadena, ';

agregar($str);//llamo a la función agregar y paso como parámetro $str

echo $str; // Escribe 'Esto es una cadena, y algo más.'
?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Funciones</title>
</head>

<body><?php
function cafe($tipo="cappucino") {/*El valor por defecto 
del parámetro $tipo es cappucino*/
return "<p>Haciendo una taza de $tipo.</p>";
}
echo cafe();

/*Llamada a la función sin parámetro. 
El parámetro tomará su valor por defecto: cappucino*/ 
echo cafe("espresso");//El parámetro tomará el valor espresso
?>
</body>
</html>
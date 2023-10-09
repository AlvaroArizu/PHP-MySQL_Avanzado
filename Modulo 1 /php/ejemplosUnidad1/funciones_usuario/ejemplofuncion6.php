<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Funciones</title>
</head>

<body><?php
function cafe($temp,$tipo="con leche") {
return "<p>Haciendo capuccino $tipo $temp.</p>";
}
echo cafe("caliente"); //Escribe: 'Haciendo café con leche caliente'
?>
</body>
</html>
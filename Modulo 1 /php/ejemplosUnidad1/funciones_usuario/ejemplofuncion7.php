<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Funciones</title>
</head>

<body><?php
function numeros() {
return array (0,1,2,3);
}

list ($cero, $uno, $dos, $tres) = numeros(); 
echo ($cero.',');
echo ($uno.',');
echo ($dos.',');
echo ($tres);

?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" >
<title>Funciones</title>
</head>

<body>
<?php 
function suma($num1, $num2){  
$suma = $num1 + $num2;  
return $suma;  
}  
$variable1 = suma(10,3); // $variable1 valdra 13 (10+3)  
$variable2 = suma(17,3); // $variable2 valdra 20  

echo "<p>Suma 1: ".$variable1."</p>"; 
echo "<p>Suma 2: ".$variable2."</p>";
?>
</body>
</html>

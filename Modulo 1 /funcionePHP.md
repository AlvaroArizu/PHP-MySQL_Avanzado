
- Integracion PHP y MySQL
  
# Funciones en PHP
Una función en PHP es un conjunto de instrucciones que permiten procesar las variables para obtener un resultado. Se definen con la palabra "function" seguida del nombre de la función, paréntesis que pueden o no contener parámetros, y las instrucciones de la función que van entre llaves {}. Para utilizar una función, simplemente se llama por su nombre seguido de paréntesis y los parámetros necesarios, si los hay.

### Tendríamos que seguir el siguiente razonamiento:  
1. definir función  
2. suma(art1,art2,art3)  
3. suma=art1+art2+art3  
4. imprimir(suma)  
5. fin función  

```php
<?php 
function mifuncion(){ 
instrucciones; 
} 
?>
```

### Ejemplo de una funcion que acepta 2 parametros
```php
<?php 
function producto($num1, $num2){ 
$producto = $num1 * $num2; 
return $producto; } 
?>
```

## Parametro de la funciones 
Los parámetros de una función son valores que se pasan a la función para que los procese y devuelva un resultado. Estos parámetros se definen entre los paréntesis de la función y pueden ser utilizados dentro de la función como variables internas. Para que una función acepte parámetros, estos deben ser definidos entre los paréntesis de la función

```php
<?php 
function agregar(&$string) { 
/* Paso por referencia del parámetro. Los cambios también se verán reflejados fuera de la 
función*/ 
$string .= ' y algo más.'; 
} 
$str = 'Esto es una cadena, '; 
agregar($str); 
echo $str;  
// Escribe 'Esto es una cadena, y algo más.' 
?> 
```
```php
<?php 
function agregar($string) { 
/ Paso por valor del parámetro. 
$string .= ' y algo más.'; 
} 
$str = 'Esto es una cadena, '; 
agregar($str); 
echo $str."<br/>"; // Escribe 'Esto es una cadena, ' 
function agregarporreferencia(&$str) { 
// Paso por referencia del parámetro. 
$str .= ' y algo más.'; 
} 
agregarporreferencia($str); 
echo($str); 
// Escribe 'Esto es una cadena, y algo más.' 
?> 
```

## Parametros por defecto 
Los parámetros por defecto son valores que se asignan a los parámetros de una función en caso de que no se les pase un valor al llamar la función. Estos valores se definen en la definición de la función y se asignan automáticamente a los parámetros si no se les pasa un valor al llamar la función. Para utilizar parámetros por defecto, se deben definir a la derecha de cualquier parámetro sin valor por defecto.

```php
<?php 
function cafe($tipo="cappucino") {  
/*El valor por defecto del parámetro $tipo es cappucino*/ 
return "Haciendo una taza de $tipo.<br>"; 
} 
echo cafe(); 
/*Llamada a la función sin parámetro. El parámetro tomará su valor por defecto: 
cappucino*/ 
echo cafe("espresso"); 
//El parámetro tomará el valor espresso 
?>
```

## Devolver valores
Para devolver valores desde una función en PHP, se utiliza la instrucción "return". Esta instrucción devuelve el valor especificado y finaliza la ejecución de la función. Puede devolverse cualquier tipo de valor, incluyendo listas y objetos. Si se desea devolver múltiples valores, se puede devolver una lista utilizando la función "list()". 

```php
<?php 
function cuadrado($num) { 
return $num * $num; // Devuelve el cuadrado de $num 
} 
echo cuadrado (5); //Escribe: 25 
?> 
```

```php
<?php 
function numeros() { 
return array (0,1,2,3); 
} 
list ($cero, $uno, dos, $tres) = numeros(); 
echo ($cero.‟,‟); 
echo ($uno.‟,‟); 
echo ($dos.‟,‟); 
echo ($tres); 
?>
```

## Funciones para PHP para MySQL
PHP tiene varias extensiones para acceder a las tablas MySQL, siendo la más conocida la extensión "mysql". Sin embargo, esta extensión ha sido declarada como obsoleta a partir de PHP 5.5 y se recomienda no escribir código nuevo con ella. En su lugar, se recomienda utilizar la extensión "mysqli" o "PDO". "mysqli" tiene dos versiones, una procedimental y otra orientada a objetos, mientras que "PDO" es solo orientada a objetos. En el manual de PHP se recomienda reemplazar la extensión "mysql" por "mysqli" o "PDO".

## Funciones de la extensión Mysqli 
La extensión "mysqli" en su versión procedimental cuenta con varias funciones, entre las cuales se encuentran:

- mysqli_connect(): establece la conexión con el servidor y selecciona la base de datos con la que se va a trabajar.
- mysqli_query(): ejecuta el query pasado como parámetro.
- mysqli_fetch_assoc(): devuelve una fila de resultados como un array asociativo.
- mysqli_num_rows(): devuelve el número de filas en un resultado.
- mysqli_affected_rows(): devuelve el número de filas afectadas por la última consulta.
- mysqli_error(): devuelve una cadena con la descripción del último error ocurrido en la conexión.
- mysqli_close(): cierra la conexión con la base de datos.

Puedes encontrar una lista completa de todas las funciones de la extensión "mysqli" en el siguiente enlace: http://php.net/manual/en/mysqli.summary.php


### 1.mysqli_connect() 
- Establece la conexión con el servidor y selecciona la base de datos con la que se va a trabajar.
```php
<?php 
//conection: 
$link = mysqli_connect("myhost","myuser","mypassw","mybd") or 
die("Error " . mysqli_error($link)); 
?> 
```
### 2. mysqli_query() 
- Ejecuta el query pasado como parámetro.
```php
<?php 
//conection: 
$link = mysqli_connect("myhost","myuser","mypassw","mybd") or 
die("Error " . mysqli_error($link)); 
//consulta: 
$result = mysqli_query($link, "SELECT * FROM table") or die("Error " . 
mysqli_error($link)); 
?> 
```
### 3.mysqli_fetch_array()
- Devuelve una fila de resultados como un array numérico y asociativo.
```php
<?php 
//conection: 
$link = mysqli_connect("myhost","myuser","mypassw","mybd") or 
die("Error " . mysqli_error($link)); 
//consulta: 
$result = mysqli_query($link, "SELECT * FROM table") or die("Error " . 
mysqli_error($link)); 
//lectura: 
while ($row = mysqli_fetch_array($result)){ 
Var_dump($row); 
}; 
?>
```
### 4.mysqli_fetch_row()
- Devuelve una fila de resultados como un array numérico.
```php
<?php 
//conection: 
$link = mysqli_connect("myhost","myuser","mypassw","mybd") or 
die("Error " . mysqli_error($link)); 
//consulta: 
$result = mysqli_query($link, "SELECT * FROM table") or die("Error " . 
mysqli_error($link)); 
//lectura: 
while ($row = mysqli_fetch_row($result)){ 
Var_dump($row); 
}; 
?> 
```
### 5.mysqli_num_rows()
- Devuelve el número de filas en un resultado.
```php
<?php 
//conection: 
$link = mysqli_connect("myhost","myuser","mypassw","mybd") or 
die("Error " . mysqli_error($link)); 
//consulta: 
$result = mysqli_query($link, "SELECT * FROM table") or die("Error " . 
mysqli_error($link)); 
//lectura: 
if (mysqli_num_rows($result)){ 
while ($row = mysqli_fetch_row($result)){ 
Var_dump($row); 
}; 
}else{ 
Echo “No se encontraron datos”; 
} 
?>
```
### 6.mysqli_error() 
- Devuelve una cadena con la descripción del último error ocurrido en la conexión. 
```php
<?php 
//conection: 
$link = mysqli_connect("myhost","myuser","mypassw","mybd") or 
die("Error " . mysqli_error($link)); 
//consulta: 
$result = mysqli_query($link, "SELECT * FROM table") or die("Error " . 
mysqli_error($link)); 
//lectura: 
if (mysqli_num_rows($result)){ 
while ($row = mysqli_fetch_row($result)){ 
Var_dump($row); 
}; 
}else{ 
Echo “No se encontraron datos”; 
} 
?> 
```



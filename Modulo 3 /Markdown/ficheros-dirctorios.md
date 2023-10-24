# FUNCIONES PARA EL MANEJO DE ARCHIVOS
## Abrir Archivos
Para abrir archivos, se utiliza la función fopen, cuya sintaxis es la siguiente:
### fopen (nombre_archivo, modo);
- `En donde, nombre_archivo es el nombre del archivo que se quiere abrir o crear y el modo indica
de qué forma se procederá a la apertura del archivo. Los distintos modos se comentan en los`
ejemplos siguientes:
### fopen (archivo.txt, ‘a’)
- Abre el archivo en modo de agregar información. Los datos que se ingresen se agregarán al final
del mismo, sin eliminar el contenido que tuviera. En este modo, si el archivo no existe, lo creará
en ese momento.
### fopen (archivo.txt, ‘a+’)
- Abre el archivo en modo de agregar información y además leerlo. Los datos que se ingresen se
agregarán al final del mismo, sin eliminar el contenido que tuviera. En este modo, si el archivo no
existe, lo creará en ese momento.
### fopen (archivo.txt, ‘r’)
- Abre el archivo en modo lectura solamente. El archivo debe existir.
### fopen (archivo.txt, ‘r+’)
- Abre el archivo en modo lectura y escritura. La información que se agregue, será insertada al
principio del archivo.
### fopen (archivo.txt, ‘w’)
- Abre el archivo en modo escritura solamente. Si el archivo no existe, lo crea, y si existe con algún
contenido, elimina toda su información, dejándolo en blanco.
### fopen (archivo.txt, ‘w+’)
- Abre el archivo en modo escritura y lectura. Si el archivo no existe, lo crea, y si existe con algún
contenido, elimina toda su información, dejándolo en blanco.

## Cerrar Archivos
- Luego de abrir un archivo y realizar las operaciones necesarias en él, se debe cerrarlo. Para cerrar un archivo se utiliza la función `fclose()` que recibe como parámetro la variable del archivo que se
está utilizando.

```php
$f = fopen("archi.txt", ‘r’);
fclose($f);
```
## Escritura en un Archivo
### fputs()
- Permite escribir en un archivo. Recibe tres parámetros, de los cuales los dos primeros son obligatorios y el tercero es opcional. La sintaxis es la siguiente:

- `fputs ( variable_fichero, texto, largo)`
    - El primer parámetro es el puntero al archivo, es decir la variable de trabajo.
    - El segundo parámetroes el texto que se desea escribir.
    - El tercer parámetro es el largo de la cadena, si no se coloca, se grabará la cadena entera.

```php
<?php
$texto = "La materia se transforma consumiendo o liberando energía.";
$f = fopen("texto1.txt", "w");
fputs($f, $texto);
echo "Texto almacenado correctamente";
fclose($f);
?>
```

## Lectura de un Archivo

### fpassthru()

La función `fpassthru()` permite ver el contenido completo de un archivo. Para usarla, primero debes abrir el archivo en modo lectura ("r") y luego utilizar `fpassthru()` para mostrar su contenido.

**Ejemplo:**
```php
$nombre = "texto1.txt";
$f = fopen($nombre, "r") or die("Error al abrir el archivo: $nombre");
echo "Texto:<br/>";
fpassthru($f);
echo "<br><br>";
echo "El texto se ha leído correctamente";
fclose($f);
```

### fread()

La función `fread()` se utiliza para leer parte de un archivo abierto. Debes proporcionar el puntero al archivo abierto y la cantidad de caracteres que deseas leer.
```php
$nombre = "texto1.txt";
$f = fopen($nombre, "r") or die("Error al abrir el archivo: $nombre");
echo "<h3>";
echo "Texto leído:<br>";
echo fread($f, 24); // Lee los primeros 24 caracteres
echo "<br><br>";
echo "Se han leído los 24 primeros caracteres";
fclose($f);
echo "</h3>";
```

### fgetc()
La función `fgetc()` permite leer un archivo de texto carácter por carácter. Puedes recorrer el archivo parcial o totalmente.
```php
$nombre = "texto1.txt";
$f = fopen($nombre, "r") or die("Error al abrir el archivo: $nombre");
echo "<h3>";
echo "Texto leído:<br>";
while (!feof($f)) {
    echo fgetc($f);
}
echo "<br><br>";
echo "Texto leído completamente";
fclose($f);
echo "</h3>";
```

### fgets()
La función `fgets()` permite leer una cadena de texto de un archivo. Debes proporcionar el puntero al archivo abierto y, de forma opcional, la longitud de la cadena que deseas leer.
```php
$nombre = "texto1.txt";
$f = fopen($nombre, "r") or die("Error al abrir el archivo: $nombre");
echo "<h3>";
echo "Texto leído:<br>";
echo fgets($f, 25); // Lee hasta 25 caracteres
fclose($f);
echo "</h3>";
```

### file()
La función `file()` permite almacenar un texto en un vector, donde cada elemento del vector contiene una línea de texto. Primero, guarda el texto en un archivo, luego lo almacena línea por línea en un vector.
```php
$texto = "En el universo hay materia y energía, la materia se halla en ciertos cuerpos llamados cuerpos celestes. Algunos cuerpos son fríos y no emiten energía, otros son calientes y emiten luz y calor.";
$f = fopen("texto2.txt", "w");
fwrite($f, $texto);
fclose($f);

$nombre = "texto2.txt";
$f = fopen($nombre, "r") or die("Error al abrir el archivo: $nombre");
fclose($f);
$v = file($nombre);
$cantidad = count($v);
echo "<h3>";
echo "Vector generado:<br>";
for ($i = 0; $i < $cantidad; $i++) {
    echo "Posición [$i]: $v[$i]<br>";
}
echo "</h3>";
```
## Recorrido de un Archivo en PHP

### rewind()
La función rewind() mueve el puntero al inicio del archivo. Debes proporcionar como parámetro la variable de archivo previamente abierta
```php
$nombre = "texto2.txt";
$f = fopen($nombre, "r") or die("Error al abrir el archivo: $nombre");
echo "<h3>";
rewind($f); // Mueve el puntero al inicio del archivo
echo fread($f, 18); // Lee los primeros 18 caracteres
echo "<br/>";
fseek($f, 15); // Mueve el puntero al carácter número 15
echo fread($f, 4); // Lee los siguientes 4 caracteres
echo "<br/>";
rewind($f); // Mueve el puntero al inicio del archivo nuevamente
echo fread($f, 14); // Lee los primeros 14 caracteres
fclose($f);
echo "<h3>";
```

### seek()
La función fseek() permite situar el puntero en un lugar específico dentro del archivo. Tiene dos parámetros: la variable de archivo y el número de carácter donde se quiere posicionar (considerando que el primer carácter es el número 0)

### ftell()
La función ftell() permite obtener la posición actual del puntero en el archivo. Debes proporcionar como parámetro la variable de archivo y obtendrás el valor numérico de la posición del puntero.
```php
$nombre = "texto1.txt";
$f = fopen($nombre, "r") or die("Error al abrir el archivo: $nombre");
echo "<h3>";
echo "Archivo: ";
echo fgets($f);
echo "<br/>";
rewind($f);
while (!feof($f)) {
    echo "Posición (" . ftell($f) . "): ";
    echo fgetc($f);
    echo "<br>";
}
fclose($f);
echo "<h3>";
```
## Funciones Útiles para el Manejo de Archivos en PHP

### copy()
- La función `copy()` permite realizar una copia de un archivo. Debes proporcionar dos parámetros: el nombre del archivo origen y el nombre del archivo destino. Devuelve `true` si la copia se realiza con éxito, de lo contrario, devuelve `false`.
```php
$origen = "texto1.txt";
$f = fopen($origen, "r") or die("Error al abrir el archivo: $origen");
fclose($f);

$destino = "texto1.bak";
if (copy($origen, $destino)) {
    echo "La copia se realizó con éxito";
} else {
    echo "No se pudo realizar la copia";
}
```

### file_exists()
- La función `file_exists()` permite verificar si un archivo existe. Devuelve `true `si el archivo existe y `false` en caso contrario. Se utiliza generalmente antes de realizar operaciones como borrar, renombrar o abrir un archivo.
```php
$nombre = "texto1.txt";
if (file_exists($nombre)) {
    echo "El archivo $nombre existe";
} else {
    echo "El archivo $nombre no existe";
}
```

### rename()
- La función `rename()` permite cambiar el nombre de un archivo. Debes proporcionar dos parámetros: el nombre actual del archivo y el nombre nuevo que deseas asignar.
```php
$nombreactual = "texto1.bak";
$nombrenuevo = "archi1.txt";
if (file_exists($nombreactual)) {
    rename($nombreactual, $nombrenuevo);
    echo "El nombre se cambió correctamente";
} else {
    echo "No se encontró el archivo $nombreactual";
}
```

### unlink()
- La función `unlink()` se utiliza para borrar un archivo. Debes proporcionar el nombre del archivo a borrar.
```php
$nombre = "archi1.txt";
if (file_exists($nombre)) {
    unlink($nombre);
    echo "El archivo $nombre se borró correctamente";
} else {
    echo "No se encontró el archivo $nombre";
}
```

### fileatime() y filemtime()
- Las funciones `fileatime()` y `filemtime()` permiten obtener la última fecha de acceso y modificación de un archivo, respectivamente. Ambas reciben como parámetro el nombre del archivo y devuelven un valor de tiempo que puedes formatear según tus necesidades.
```php
$nombre = "texto2.txt";
if (file_exists($nombre)) {
    echo "Archivo: $nombre<br/><br/>";
    echo "Última fecha de acceso: " . date("d/m/y", fileatime($nombre)) . "<br/><br/>";
    echo "Última fecha de modificación: " . date("d/m/y", filemtime($nombre));
} else {
    echo "No se encontró el archivo $nombre";
}
```

### filesize()
- La función `filesize()` devuelve el tamaño de un archivo en la cantidad de caracteres.
```php
$nombre = "texto1.txt";
if (file_exists($nombre)) {
    echo "Tamaño de $nombre: " . filesize($nombre);
} else {
    echo "No se encontró el archivo $nombre";
}
```

### move_uploaded_file()
- La función `move_uploaded_file()` se utiliza para mover un archivo subido al servidor. Requiere dos parámetros: el nombre del archivo subido y la ubicación de destino en el servidor.

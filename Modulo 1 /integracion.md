# Integracion PHP y MySQL
Desde PHP es posible invocar funciones y ejecutar sentencias especificas de MySQL

Lo primer que tenemos que hacer es conectar con la base de datos, para esto usaremos la funicon `mysqli_connect()`

```php
$conexion=mysqli_connect("servidor ", "usuario_mysql ", "contraseña_mysql ",
"nombre_base_datos ")
```
`mysqli_query ($conexion, consulta)` envía una consulta a la base activa asociada al identificador de
enlace $conexion.

Devuelve TRUE si la sentencia se ha ejecutado correctamente y FALSE en caso contrario.

# Conexión a una Base de Datos MySQL con PHP

Para interactuar con una base de datos MySQL utilizando PHP, primero debemos establecer una conexión con el servidor MySQL. Esto se hace utilizando la función `mysqli_connect()`. A continuación se muestra cómo hacerlo:

### 1. **Establecer una conexión con el servidor MySQL:**

   ```php
   <?php
   // Parámetros de conexión
   $host = "nombre_del_host";
   $usuario = "nombre_de_usuario";
   $contrasena = "contraseña";
   $base_de_datos = "nombre_de_la_base_de_datos";

   // Establecer la conexión
   $conexion = mysqli_connect($host, $usuario, $contrasena, $base_de_datos);

   // Verificar la conexión
   if (!$conexion) {
       die("Error en la conexión: " . mysqli_connect_error());
   }
   ?>
   ```

### 2. **Ejecutar consultas en la base de datos:**

Una vez que hemos establecido la conexión, podemos ejecutar consultas en la base de datos utilizando las funciones proporcionadas por la extensión MySQLi de PHP. Aquí tienes un ejemplo de consulta SELECT:
```php
// Consulta SQL
$sql = "SELECT * FROM tabla";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si la consulta se realizó con éxito
if ($resultado) {
    // Procesar los resultados
    while ($fila = mysqli_fetch_assoc($resultado)) {
        // Acceder a los datos de la fila
        $nombre = $fila['nombre'];
        $edad = $fila['edad'];
        // ...
    }

    // Liberar el resultado
    mysqli_free_result($resultado);
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}
```
### 3. Cerrar la conexión cuando hayamos terminado:
Es importante cerrar la conexión cuando ya no la necesitemos para liberar recursos. Esto se hace de la siguiente manera:

```php
// Cerrar la conexión
mysqli_close($conexion);
```

# Selección y lectura de registros con PHP


### 1. **Conexión a la base de datos:** 
Establece una conexión con la base de datos utilizando la función `mysqli_connect()`. Esto se hace una vez y proporciona acceso a la base de datos.
```php
<?php
$host = "localhost";
$usuario = "tu_usuario";
$password = "tu_contraseña";
$base_de_datos = "nombre_de_la_base_de_datos";

// Conexión a la base de datos
$conexion = mysqli_connect($host, $usuario, $password, $base_de_datos);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
```

### 2. **Ejecución de la consulta:** 
Utiliza el comando SQL `SELECT` para crear una selección de registros de una tabla en la base de datos. La información de la consulta se almacena en una variable, por ejemplo, `$result`.
```php
<?php
// Ejecución de la consulta SQL
$consulta = "SELECT * FROM clientes";
$resultado = mysqli_query($conexion, $consulta);

// Verificar si la consulta fue exitosa
if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>
```

### 3. **Recuperación de registros:** 
Utiliza un bucle (por ejemplo, `while`) junto con la función `mysqli_fetch_array()` para recuperar registros de la consulta uno por uno. Esta función devuelve un array con los datos de un registro y se desplaza al siguiente.
```php
<?php
// Recuperación y procesamiento de registros
while ($fila = mysqli_fetch_array($resultado)) {
    $id = $fila['id'];
    $nombre = $fila['nombre'];
    $apellido = $fila['apellido'];
    $email = $fila['email'];

    // Mostrar los datos en pantalla
    echo "ID: $id<br>";
    echo "Nombre: $nombre<br>";
    echo "Apellido: $apellido<br>";
    echo "Email: $email<br><br>";
}
?>
```

### 4. **Procesamiento de registros:** 
Dentro del bucle, procesa y muestra en pantalla los registros recuperados según tus necesidades. Puedes acceder a los campos de cada registro utilizando la sintaxis de array.
```php
<?php
// Liberar la memoria utilizada para la consulta
mysqli_free_result($resultado);

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
```

### 5. **Liberación de memoria:** 
Después de haber procesado todos los registros, utiliza la función `mysqli_free_result()` para liberar la memoria utilizada para la consulta. Aunque no es obligatorio, es una buena práctica hacerlo.

Lo más importante es entender que debes establecer una conexión, ejecutar una consulta, recuperar y procesar los registros, y finalmente, liberar la memoria cuando hayas terminado.

Este proceso te permite interactuar con la base de datos y mostrar los datos en pantalla de acuerdo con tus necesidades específicas.


### EJEMPLO EN HTML
```PHP
<!doctype html>
<html>
<head>
<title>Lectura de datos</title>
</head>
<body>
<h1>Lectura de la tabla</h1>
<?php
//conexion con la base y seleccion de la basede datos
$conexion = mysqli_connect("localhost","root","","unidad2_php");
//ejecutamos la sentencia sql
$result=mysqli_query($conexion, "SELECT * from clientes");
?>
<table align="center" border="1">
<tr>
<th>Nombre</th>
<th>Actividad</th>
<th>Web</th>
</tr>
<?php
//mostramos los registros
while ($row=mysqli_fetch_array($result))
{
echo '<tr><td>'.$row['nombre'].'</td>';
echo '<td>'.$row['actividad'].'</td>';
echo '<td>'.$row['web'].'</td></tr>';
}
mysqli_free_result($result)
?>
</table>
<nav>
<ul>
<li><a href="insertar.html">añadir un nuevo registro</a></li>
<li><a href="actualizar.php">actualizar un registro existente</a></li>
<li><a href="borrar.php">borrar un registro</a></li>
</ul>
</nav>
</body>
</html>
```

# Introducción de nuevos registros con PHP
### 1. Crear un Formulario HTML
Primero, crea un formulario HTML donde los usuarios puedan ingresar los datos que deseas insertar en la base de datos. El formulario debe tener un atributo "action" que apunte a la página PHP que procesará los datos.
```php
<!DOCTYPE html>
<html>
<head>
    <title>Insertar datos</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Insertar un registro</h1>
    <form method="post" action="insertar_registro.php">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="actividad" placeholder="Actividad">
        <input type="text" name="web" placeholder="Sitio Web">
        <input type="submit" value="Insertar">
    </form>
    <ul>
        <li><a href="mostrar_datos.php">Volver al listado de Clientes</a></li>
    </ul>
</body>
</html>
```
### 2. Procesar el Formulario en PHP (insertar_registro.php)
Cuando el usuario envía el formulario, los datos se envían a la página "insertar_registro.php". En esta página PHP, debes realizar la conexión a la base de datos y luego insertar los datos ingresados por el usuario en la base de datos.
```php
<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "unidad2_php");

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$actividad = $_POST['actividad'];
$web = $_POST["web"];

// Ejecución de la sentencia SQL para insertar el registro
mysqli_query($conexion, "INSERT INTO clientes (nombre, actividad, web) VALUES ('$nombre','$actividad','$web')");

// Redireccionar a la página que muestra los datos
header("Location: mostrar_datos.php");
?>
```
### 3. Mostrar los Datos Insertados (mostrar_datos.php)
Después de insertar los datos en la base de datos, puedes redireccionar al usuario a una página donde se muestren los datos, si así lo deseas. En este ejemplo, hemos redirigido al usuario a "mostrar_datos.php".

# Borrado de un registro con PHP
El borrado de registros en una base de datos MySQL mediante PHP implica el uso de sentencias SQL del tipo DELETE. A continuación, se describe cómo realizar este proceso:
### `PASO 1` Crear un Formulario HTML para Seleccionar el Registro a Borrar
Primero, crea un formulario HTML que permita al usuario seleccionar el registro que desea eliminar. Puedes usar un menú desplegable para mostrar los registros disponibles.
```PHP
<!DOCTYPE html>
<html>
<head>
    <title>Borrar Datos</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Borrar un registro</h1>
    <?php
    // Conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "unidad2_php");
    ?>
    <form method="post" action="borrar_registro.php">
        <?php
        // Crear la sentencia SQL para seleccionar los registros
        $ssql = "SELECT id, nombre FROM clientes ORDER BY nombre";
        $result = mysqli_query($conexion, $ssql);
        ?>
        <select name="id">
            <?php
            // Mostrar los registros en un menú desplegable
            while ($row = mysqli_fetch_array($result)) {
                echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
            }
            mysqli_free_result($result);
            ?>
        </select>
        <input type="submit" value="Borrar">
    </form>
    <ul>
        <li><a href="mostrar_datos.php">Volver al listado de Clientes</a></li>
    </ul>
</body>
</html>
```
### `PASO 2`  Procesar el Borrado en PHP (borrar_registro.php)
Cuando el usuario selecciona un registro y envía el formulario, los datos se envían a la página "borrar_registro.php". En esta página PHP, se debe establecer una conexión a la base de datos y ejecutar una sentencia SQL DELETE para eliminar el registro seleccionado.
```PHP
<?php
// Pasar los datos del formulario
$id = $_POST["id"];

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "unidad2_php");

// Crear la sentencia SQL para eliminar el registro
$ssql = "DELETE FROM clientes WHERE id='$id'";
mysqli_query($conexion, $ssql);

// Redireccionar a la página que muestra los datos actualizados
header("Location: mostrar_datos.php");
?>
```

### EJEMPLO 
```PHP
<!doctype html>
<html>
<head>
<title>Borrar Datos</title>
<meta charset="utf-8">
</head>
<body>
<h1>Borrar un registro</h1>
<?php
//conexion con la base y seleccion de la basede datos
$conexion = mysqli_connect("localhost","root","","unidad2_php");
?>
<form method="post" action="borrar_registro.php">
<?php
//creamos la sentencia sql y la ejecutamos
$ssql="SELECT id, nombre FROM clientes ORDER BY nombre";
$result=mysqli_query($conexion, $ssql);
?>
<select name="id">
<?php
//mostramos los registros en forma de menú desplegable
while ($row=mysqli_fetch_array($result)){
echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
}
mysqli_free_result($result);
?>
</select>
<input type="submit" value="borrar">
</form>
<ul>
<li><a href="mostrar_datos.php">Volver al listado de Clientes</a></li>
</ul>
</body>
</html>
<?php
//pasamos los datos del formulario
$id = $_POST["id"];
//conexion con la base y seleccion de la basede datos
$conexion = mysqli_connect("localhost","root","","unidad2_php");
//creamos la sentencia sql y la ejecutamos
$ssql="DELETE FROM clientes WHERE id='$id'";
mysqli_query($conexion,$ssql);
?>
```

## Actualización de un Registro en la Base de Datos con PHP

Para actualizar un registro en una base de datos MySQL utilizando PHP, sigue estos pasos:

### Paso 1: Crear un Formulario HTML para Seleccionar y Actualizar el Registro

Crea un formulario HTML que permita al usuario seleccionar el registro que desea actualizar y proporcionar los nuevos valores para los campos que desea modificar. El formulario debe incluir un menú desplegable con los nombres de los registros existentes.

```html
<!DOCTYPE html>
<html>
<head>
    <title>Actualizar datos</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Actualizar un registro</h1>
    <?php
    // Conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "unidad2_php");
    ?>
    <form method="post" action="actualizar_registro.php">
        <?php
        // Crear la sentencia SQL para seleccionar los registros y ejecutarla
        $ssql = "SELECT id, nombre FROM clientes ORDER BY nombre";
        $result = mysqli_query($conexion, $ssql);
        ?>
        <select name="id">
            <?php
            // Generar el menú desplegable con los nombres de los registros
            while ($row = mysqli_fetch_array($result)) {
                echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
            }
            ?>
        </select>
        <input type="text" name="actividad" placeholder="Actividad">
        <input type="text" name="web" placeholder="Web">
        <input type="submit" value="Actualizar">
    </form>
    <ul>
        <li><a href="mostrar_datos.php">Volver al listado de Clientes</a></li>
    </ul>
</body>
</html>
```
### Paso 2: Procesar la Actualización en PHP (actualizar_registro.php)
Cuando el usuario selecciona un registro y proporciona nuevos valores en el formulario, los datos se envían a la página "actualizar_registro.php". En esta página PHP, se debe establecer una conexión a la base de datos y ejecutar una sentencia SQL UPDATE para actualizar el registro seleccionado con los nuevos valores.

```php
<?php
// Pasar los datos del formulario
$id = $_POST['id'];
$actividad = $_POST['actividad'];
$web = $_POST['web'];

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "unidad2_php");

// Crear la sentencia SQL para actualizar el registro
$ssql = "UPDATE clientes SET actividad='$actividad', web='$web' WHERE id=$id";
mysqli_query($conexion, $ssql);

// Redireccionar a la página que muestra los datos actualizados
header("Location: mostrar_datos.php");
?>
```
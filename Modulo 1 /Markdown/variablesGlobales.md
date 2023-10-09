# Variables Globales 

## Variables de sistema en PHP 
En PHP, las variables de sistema son proporcionadas por el servidor y nos ofrecen información sobre el servidor y el cliente. Estas variables son de solo lectura y no podemos modificar sus valores directamente desde el script. Algunas de estas variables son útiles y tienen aplicaciones específicas en nuestros sitios web. 

### 1. $HTTP_USER_AGENT
-  Contiene información sobre el agente de usuario (navegador) que realiza la solicitud al servidor. Puede utilizarse para adaptar la respuesta del servidor según el navegador.
```php
$user_agent = $_SERVER['HTTP_USER_AGENT'];
echo "El agente de usuario es: $user_agent";
```
### 2. $HTTP_ACCEPT_LANGUAGE
- Indica el idioma preferido por el cliente que realiza la solicitud al servidor. Se utiliza para determinar el idioma de respuesta más adecuado.
```php
$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
echo "El idioma preferido del cliente es: $language";
```
### 3. $HTTP_REFERER
-  Contiene la URL de la página que enlazó a la página actual. Puede ser útil para rastrear la fuente de tráfico.
```php
$referer = $_SERVER['HTTP_REFERER'];
echo "La URL de referencia es: $referer";
```
### 4. $PHP_SELF 
- Contiene el nombre del script actual que se está ejecutando. Puede ser útil para construir enlaces a sí mismo.
```php
$self = $_SERVER['PHP_SELF'];
echo "El nombre del script actual es: $self";
```
### 5. $HTTP_GET_VARS 
- Anteriormente, almacenaba datos enviados a través del método GET, pero se recomienda usar $_GET en su lugar
```php
// Supongamos que tienes una URL como: http://ejemplo.com/mipagina.php?nombre=Juan&edad=30
// Utilizando $HTTP_GET_VARS para obtener datos de la URL

$nombre = $HTTP_GET_VARS['nombre'];
$edad = $HTTP_GET_VARS['edad'];

echo "Nombre: $nombre<br>";
echo "Edad: $edad<br>";
```
### 6. $HTTP_POST_VARS
- Anteriormente, almacenaba datos enviados a través del método POST, pero se recomienda usar $_POST en su lugar.
```php
// Supongamos que tienes un formulario HTML con campos 'nombre' y 'edad' enviados mediante POST
// Utilizando $HTTP_POST_VARS para obtener datos del formulario

$nombre = $HTTP_POST_VARS['nombre'];
$edad = $HTTP_POST_VARS['edad'];

echo "Nombre: $nombre<br>";
echo "Edad: $edad<br>";
```
### 7. $HTTP_COOKIES_VARS
- Esta variable está obsoleta. Anteriormente, almacenaba datos de cookies, pero se recomienda usar $_COOKIE en su lugar.
### 7.1  $_COOKIE
```php
// Establecer una cookie
setcookie("usuario", "Juan", time() + 3600, "/");

// Acceder a la cookie utilizando $_COOKIE
if (isset($_COOKIE["usuario"])) {
    $usuario = $_COOKIE["usuario"];
    echo "Bienvenido, $usuario.";
} else {
    echo "Cookie 'usuario' no encontrada.";
}

```
### 8. $PHP_AUTH_USER 
- Contiene el nombre de usuario proporcionado por el cliente al utilizar autenticación HTTP.
```php
$username = $_SERVER['PHP_AUTH_USER'];
echo "El nombre de usuario es: $username";
```
### 9. $PHP_AUTH_PW
- Contiene la contraseña proporcionada por el cliente al utilizar autenticación HTTP.
```php
$password = $_SERVER['PHP_AUTH_PW'];
echo "La contraseña es: $password";
```
### 10. $REMOTE_ADDR  
- Almacena la dirección IP del cliente que realiza la solicitud al servidor. Puede utilizarse para rastrear la ubicación del cliente
```php
$client_ip = $_SERVER['REMOTE_ADDR'];
echo "La dirección IP del cliente es: $client_ip";
```
### 11. $DOCUMENT_ROOT
- Contiene la ruta del sistema de archivos del servidor al directorio raíz del sitio web. Puede ser útil para construir rutas de archivos.
```php
$document_root = $_SERVER['DOCUMENT_ROOT'];
echo "La ruta del documento raíz es: $document_root";
```
### 12. $PHPSESSID
- Almacena el ID de sesión de PHP cuando se utilizan sesiones. Puede utilizarse para mantener el estado del usuario a través de múltiples páginas.
```php
$session_id = $_COOKIE['PHPSESSID'];
echo "El ID de sesión es: $session_id";
```


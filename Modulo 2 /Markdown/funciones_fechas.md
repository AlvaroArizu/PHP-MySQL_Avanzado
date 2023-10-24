# Manejo de fechas
## FUNCIONES PARA EL MANEJO DE FECHA Y HORA
Estas funciones le permiten obtener la fecha y hora del servidor en donde están siendo ejecutados los scripts PHP. 

Podemos usar estas funciones para dar formato a las fechas y horas en muchas maneras diferentes.

### date()
-  Permite formatear la fecha y la hora en diversas maneras
```php
$fecha = date("d/m/Y");
echo "Hoy es: " . date("d/m/Y");

if ($fecha < "2020/11/01") {
    echo "Sitio web en mantenimiento hasta el 01/11/2020";
} else {
    echo "Bienvenido a nuestro sitio!";
}
```
- La función date() te permite formatear las fechas y horas utilizando códigos como "Y" para el año con cuatro dígitos, "d" para el día del mes y otros. Puedes consultar la lista completa de códigos en el manual de PHP.
### time()
- Esta función devuelve el tiempo actual en forma de un timestamp, que es la cantidad de segundos transcurridos desde el 1 de enero de 1970.
```php
$hora = time();
echo($hora);
```
- Puedes utilizar time() en combinación con la función getdate() para obtener la hora de una manera más legible:
```php
$hora = getdate(time());
echo ($hora['hours'] . ":" . $hora['minutes'] . ":" . $hora['seconds']);
```
### getdate()
- Esta función devuelve un array con la fecha en formato timestamp y elementos como "seconds" para los segundos, "hours" para las horas, etc. Aquí tienes un ejemplo:
```php
$fecha = getdate();
echo ("Día: " . $fecha["mday"] . "<br/>");
echo ("Mes: " . $fecha["mon"] . "<br/>");
echo ("Año: " . $fecha["year"] . "<br/>");
echo ("Hora: " . $fecha["hours"] . "<br/>");
echo ("Minutos: " . $fecha["minutes"] . "<br/>");
echo ("Segundos: " . $fecha["seconds"] . "<br/>");
```
### date_default_timezone_set()
- Esta función se utiliza para establecer el huso horario que las funciones de fecha y hora utilizarán. Debes proporcionar un identificador de huso horario válido. Aquí tienes un ejemplo:
```php
date_default_timezone_set("America/Argentina/Buenos_Aires");
echo "<p>" . date('h:m:i') . "</p>";
```
### strftime()
- Esta función permite generar una cadena que incluye la fecha y/o la hora en el idioma deseado. Utiliza un formato y, opcionalmente, un instante en el tiempo. Aquí tienes un ejemplo:
```php
date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME, 'spanish');
echo "<h1>" . strftime("Ejemplo 1: %A, %d de %B de %Y") . "</h1>";
```
- Esto generaría una salida como "Ejemplo 1: jueves, 04 de Julio de 2019"

## Calcular fechas facilmente con php
En PHP, puedes calcular fechas fácilmente utilizando la función `strtotime()`, que te permite trabajar con fechas en formato inglés y convertirlas en marcas de tiempo Unix. Aquí tienes algunos ejemplos de cómo usar `strtotime()`:

### 1. Restar horas, días y años a la fecha actual:
- Esto te permite restar 12 horas, 2 días y 1 año a la fecha actual.
```php
echo $date = date("d-m-Y H:i:s", strtotime("-12 hours")) . "<br/>";
echo $date2 = date("d-m-Y H:i:s", strtotime("-2 days")) . "<br/>";
echo $date3 = date("d-m-Y H:i:s", strtotime("-1 years")) . "<br/>";
```
### 2. Especificar fechas relativas:
- Puedes especificar fechas relativas, como "next Thursday" (próximo jueves) o "last Monday" (lunes pasado).
```php
echo $date4 = date("d-m-Y H:i:s", strtotime("next Thursday")) . "<br/>";
echo $date5 = date("d-m-Y H:i:s", strtotime("last Monday"));
```
### 3. Otros ejemplos con `strtotime():`
- En estos ejemplos, puedes ver cómo strtotime() interpreta varias cadenas de fecha y hora, lo que facilita el cálculo de fechas en tus scripts.
```php
echo strtotime("now"), "\n";
echo strtotime("10 September 2000"), "\n";
echo strtotime("+1 day"), "\n";
echo strtotime("+1 week"), "\n";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo strtotime("next Thursday"), "\n";
echo strtotime("last Monday"), "\n";
```
` La función strtotime() es muy versátil y útil para realizar operaciones con fechas en PHP. Te permite realizar cálculos de tiempo de manera sencilla y trabajar con fechas relativas`

## Diferencia entre dos fechas en días y horas
Puedes calcular la diferencia entre dos fechas en días y horas utilizando la siguiente función:

```php
function dias_restantes($fecha_final) {
    $fecha_actual = date("Y-m-d");
    $s = strtotime($fecha_final) - strtotime($fecha_actual);
    $d = intval($s / 86400);
    echo "Días restantes hasta la fecha $fecha_final: $d";
}
```
Para usar esta función, simplemente llama a dias_restantes("2020-11-01"); y te mostrará los días restantes hasta esa fecha.

### Fecha y hora actual con la función localtime()
- Puedes obtener información detallada sobre la fecha y hora actual utilizando la función localtime():
```php
$fecha_actual = localtime(time(), 1);
$anio_actual = $fecha_actual['tm_year'] + 1900;
$mes_actual = $fecha_actual['tm_mon'] + 1;
$dia_actual = $fecha_actual['tm_mday'];
echo "<p>Hoy es el $dia_actual/$mes_actual/$anio_actual.</p>";
```
- Esta función devuelve un vector con información detallada de la fecha y hora actual.

### Mostrar fecha actual en español
- Si deseas mostrar la fecha actual en español con PHP, puedes utilizar la siguiente función:
```php
function fecha_actual() {
    $week_days = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
    $months = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $year_now = date("Y");
    $month_now = date("n");
    $day_now = date("j");
    $week_day_now = date("w");
    $date = $week_days[$week_day_now] . ", " . $day_now . " de " . $months[$month_now] . " de " . $year_now;
    echo $date;
}
```
- Llamando a fecha_actual();, obtendrás la fecha actual en formato "Día de la semana, día de mes de mes de año".

## Validación de fecha: `función checkdate()`
Puedes utilizar la función `checkdate($mes, $dia, $anio)` para validar si una fecha es correcta en el calendario gregoriano. Devolverá `true` si la fecha es válida y `false `si no lo es.
```php
$dia = 29;
$mes = 10;
$anio = 2020;

if (checkdate($mes, $dia, $anio)) {
    echo "<p>El día $dia/$mes/$anio existe.</p>";
} else {
    echo "<p>El día $dia/$mes/$anio no existe.</p>";
}

$dia = 29;
$mes = 10;
$anio = 2019;

if (checkdate($mes, $dia, $anio)) {
    echo "<p>El día $dia/$mes/$anio existe.</p>";
} else {
    echo "<p>El día $dia/$mes/$anio no existe.</p>";
}
```

`En este ejemplo, primero verificamos si la fecha 29/10/2020 es válida, lo cual es cierto, por lo que muestra "El día 29/10/2020 existe". Luego, verificamos la fecha 29/10/2019, que no es válida, y muestra "El día 29/10/2019 no existe".`
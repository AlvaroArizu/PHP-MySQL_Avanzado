<?php
//Iniciar la session
session_start( );

// Establecer el tamaño o seleccionar aleatoriamente para mayor seguridad

$captchaTextSize = 7;

do {

    // Generar una cadena aleatoria y encriptar con md5

    $md5Hash = md5( microtime( ) * time( ) );

    // Eliminar cualquier carácter difícil de distinguir de nuestro hash

    preg_replace( '([1aeilou0])', "", $md5Hash );

} while( strlen( $md5Hash ) < $captchaTextSize );

// Solo necesitamos 7 caracteres para este captcha

$key = substr( $md5Hash, 0, $captchaTextSize );

// Agregar la clave recién generada a la sesión. Tener en cuenta que está encriptado.

$_SESSION['key'] = md5( $key );

// Tomar la imagen base de nuestro fondo de imagen captcha pregenerado

$captchaImage = imagecreatefrompng( "images/captcha.png" );

/* 

Seleccionar un color para el texto. Dado que nuestro fondo es de un color verdoso, elegimos un color de texto que se destacará, pero no por completo.

*/ 

$textColor = imagecolorallocate( $captchaImage, 31, 118, 92 );

/* 

Seleccionar un color para las líneas aleatorias que queremos dibujar en la parte superior de la imagen, en este caso, usaremos otro tono de verde / azul.

*/

$lineColor = imagecolorallocate( $captchaImage, 15, 103, 103 );

// obtener los parámetros de tamaño de nuestra imagen

$imageInfo = getimagesize( "images/captcha.png" );

// decidir cuántas líneas queremos dibujar

$linesToDraw = 10;

// Agregar las líneas al azar a la imagen.

for( $i = 0; $i < $linesToDraw; $i++ )  {

	// generar puntos de inicio y finalización aleatorios

    $xStart = mt_rand( 0, $imageInfo[ 0 ] );
    $xEnd = mt_rand( 0, $imageInfo[ 0 ] );

    // Dibujar la línea hacia el captcha

    imageline( $captchaImage, $xStart, 0, $xEnd, $imageInfo[1], $lineColor );

}

/* 

Dibujar nuestra cadena generada aleatoriamente a nuestro captcha usando la fuente de tipo verdadero dada. En este caso, estoy usando BitStream Vera Sans Bold, pero puedes modificarlo a cualquier otra fuente que quieras usar.

*/

imagettftext( $captchaImage, 20, 0, 35, 35, $textColor, "fonts/VeraBd.ttf", $key );

// Enviar la imagen al navegador, la configuración del encabezado evita el almacenamiento en caché

header ( "Content-type: image/png" );

header("Cache-Control: no-cache, must-revalidate");
header("Expires: Fri, 19 Jan 1994 05:00:00 GMT");
header("Pragma: no-cache");

imagepng( $captchaImage );

?>
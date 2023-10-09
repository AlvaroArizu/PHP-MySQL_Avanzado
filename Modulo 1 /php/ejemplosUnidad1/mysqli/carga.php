<?php
include ("conect.php");

switch ($_GET['p']) {
	case 'sc':
		$producto = 'Sillón Capri';
		$precio = 14500;
		$caracteristicas = 'Concebida para ser utilizada tanto bajo techo como a la intemperie. La madera de origen brasilera está acabada con un recubrimiento de Resina Polisten que la embellece';
		break;

	case 'mi':
		$producto = 'Mesa Ipanema';
		$precio = 25900;
		$caracteristicas = 'Se trata de una colección de muebles de madera de eucaliptos, certificada con el sello FSC y concebida para ser utilizada tanto bajo techo como a la intemperie. La madera es de origen brasilera. Las medidas son: 120 cms ';
		break;
	case 'bv':
		$producto = 'Banco Venecia';
		$precio = 25900;
		$caracteristicas = 'Se trata de una colección de muebles de madera de eucaliptos, certificada con el sello FSC (SWCOC-091) y concebida para ser utilizada tanto bajo techado como a la intemperie. La madera es de origen brasilera. Las medidas son: 120 cms.';
		break;
	
	default:
		// code...
		break;
}

$result = mysqli_query($conexion, "INSERT INTO productos VALUES (DEFAULT, '$producto', $precio, '$caracteristicas')");

header("Location: index.php?ok");


?>


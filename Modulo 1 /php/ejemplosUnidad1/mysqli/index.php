<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Funciones</title>
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>

<?php include("encabezado.html"); ?>
<section>
	<div id="productos">
		<h2>Cargar datos en la Base de Datos</h2>
		<nav>
			<ul>
				<li><a href="carga.php?p=sc">Sillón Capri</a></li>
				<li><a href="carga.php?p=mi">Mesa Ipanema</a></li>
				<li><a href="carga.php?p=bv">Banco Venecia</a></li>
			</ul>
		</nav>
		<div id="txt_ejemplo">
			<?php
			if(isset($_GET['ok'])){
				echo '<p class="txt_destacado">Producto cargado!</p>';
			}
			?>
		</div>
	</div>
</section>
<?php include("pie.html"); ?>

</body>
</html>

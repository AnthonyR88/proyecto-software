<?php

session_start();
require_once('../controller/controller.php');

?>

<!-- le dice al navegador que se esta usando la ultima verion de html -->
<!DOCTYPE html>
<!-- abre el documento html -->
<html lang="es">
<!-- cabeza del documento html -->
<head>
	<!-- titulo del documento -->
	<title>Campeonatos Futbol</title>
	<!-- icono de la pagina web -->
	<link rel="icon" href="imagenes/logo1.ico">
	<!-- evita errores de tildes y ñ -->
	<meta charset="utf-8">
	<!-- link de boostrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- link de boostrap -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!-- link de boostrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<!-- link de boostrap -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<!-- link de boostrap -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!-- etiqueta para el diseño responsivo -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
</head>

    <?php
    if (isset($_SESSION['Id'])) 
    {
        include('navbar.php');
    }
    else
    {
    ?>

<!-- cabecera del documento que permite la navegabilidad de la pagina web -->
<header>
	<!-- etiqueta para las opciones de navegavilidad -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<!-- imagen corporativa de la empresa -->
		<a href="index.php"><img src="imagenes/LogoN.ico" class="img_corp"></a>
		<!-- enlace de navegabilidad -->
		<a class="navbar-brand" href="login.php">Ingresar</a>
        <!-- boton de la navegabilidad en diseño responsivo -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>  	
    <!-- etiqueta para agrupar los links de la navegabilidad -->
  	<div class="collapse navbar-collapse" id="navbarNav">
  	<!-- lista de los links de la navegabilidad -->
    <ul class="navbar-nav">
    	<!-- link de navegabilidad -->
        <li class="nav-item">
        	<a class="nav-link" href="fechas.php">Fechas</a>
        </li>
    <!-- cierre de la lista de los links de la navegabilidad -->
    </ul>
	<ul class="navbar-nav">
    	<!-- link de navegabilidad -->
        <li class="nav-item">
        	<a class="nav-link" href="tabla_posiciones.php">Tabla De Posiciones</a>
        </li>
    <!-- cierre de la lista de los links de la navegabilidad -->
    </ul>
  	</div>

    <?php
    }
    ?>

  	<!-- cierre de la etiqueta de los links de navegabilidad -->
	</nav>
<!-- cierre de la cabecera del documento -->
</header>
<!-- cierre del cuerpo del documento -->
<body>
	<!-- link para el estilo de css -->
	<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
	<!-- imagen -->
	<img src="imagenes/Campeonato.jpg" id="imagen_colegio">
<!-- cierre del cuerpo del documento -->
</body>

	<!-- Incluye el footer -->
	<?php
	include('footer.html');
	?>

<!-- cierre del documento html -->
</html>
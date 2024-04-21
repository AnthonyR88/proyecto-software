<?php

/* Inicia la sesion */
session_start();

/* si existe una sesion activa lo devolverá a la pagina principal */
if (isset($_SESSION['Nombre']) AND (isset($_SESSION['Cargo'])) ) 
{
    header('location:index.php');
}

?>

<!-- le dice al navegador que se esta usando la ultima verion de html -->
<!DOCTYPE html>
<!-- abre el documento html -->
<html>
<!-- cabeza del documento html -->
<head>
	<!-- titulo del documento -->
	<title>Ingreso Al Sistema</title>
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
<!-- cierre de la cabeza del documento -->
</head>
<!-- cabecera del documento que permite la navegabilidad de la pagina web -->
<header>
	<!-- etiqueta para las opciones de navegavilidad -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<!-- imagen corporativa de la empresa -->
		<a href="index.php"><img src="imagenes/LogoN.ico" class="img_corp"></a>
		<!-- enlace de navegabilidad -->
		<a class="navbar-brand" href="index.php">Inicio</a>
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
  	<!-- cierre de la etiqueta de los links de navegabilidad -->
	</nav>
<!-- cierre de la cabecera del documento -->
</header>
<!-- se abre el cuerpo del documento -->
<body>
	<!-- link para el estilo de css -->
	<link rel="stylesheet" type="text/css" href="../assets/css/login.css">
    <!-- formulario para pedir imformacion al usuario -->
	<form action="../controller/controlador_sesiones.php" method="POST">
		<!-- etiqueta para mostrar el contenido en un contenedor -->
		<div class="container" id="div">
			<!-- titulo de mayor importancia -->
			<h1 align="center">Ingreso</h1>

			<?php 
			if (isset($_GET['error'])) 
			{
				echo "<p id='error'>Usuario o Contraseña Incorrectas</p>";
			}
			?>

			<!-- etiqueta para agrupar elementos en uno solo elemento --> 
			<div class="form-group">
				<!-- label para mostrar un texto -->
				<label for="usuario_login">Usuario</label><br>
				<!-- etiqueta para campo de texto -->
				<input type="text" class="form-control" id="usuario_login" placeholder="usuario" name="cuenta" required="" maxlength="50">
				<div id="error1"></div>
			</div>
			<!-- etiqueta para agrupar elementos en uno solo elemento --> 
			<div class="form-group">
				<!-- label para mostrar un texto -->
				<label for="password_login">Contraseña</label>
				<!-- etiqueta para campo de texto -->
				<input type="password" class="form-control" id="password_login" placeholder="contraseña" name="clave" required="" minlength="8" maxlength="12">
			</div>

			<?php /* ?>
			<!-- etiqueta para agrupar elementos en uno solo elemento --> 
			<div class="form-group">
				<!-- etiqueta para agrupar elementos en uno solo elemento de tipo checkbox --> 
				<div class="form-check">
					<!-- checkbox para recordarme la clavey usuario -->
					<input type="checkbox" class="form-check-input" id="recordar_login">
					<!-- label para mostrar un texto -->
					<label class="form-check-label" for="recordar_login">Recordarme</label>
			    </div>
		    </div>
		    <?php */ ?>
		    <!-- boton para entrar al sistema -->
		    <input type="submit" name="enviar" class="btn btn-success" value="Ingresar">
		<!-- cierre de la etiqueta del contenedor -->
		</div>
    <!-- cierre de la etiqueta del formulario -->
	</form>
<!-- cierre del cuerpo del documento -->
</body>

	<!-- Incluye el footer -->
	<?php
	include('footer.html');
	?>

<!-- cierre del documento html -->
</html>
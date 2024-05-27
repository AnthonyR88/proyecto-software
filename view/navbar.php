<?php

if (!isset($_SESSION['Nombre']) AND (!isset($_SESSION['Cargo'])) ) 
{
    header('location:index.php');
}

/* Codigo que analiza la inctividad de la pagina, si es mayor a 10min se cierra sesion automaticamente */
$inactivo = 600;
$vida = time() - $_SESSION['time'];
if ($vida > $inactivo) 
{
    header('location:../controller/controlador_sesiones.php?cerrar_sesion');
}
else
{
    $_SESSION['time'] = time();
}

?>

<header>
	<!-- etiqueta para las opciones de navegavilidad -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<!-- imagen corporativa de la empresa -->
		<a href="index.php"><img src="imagenes/logoN.ico" class="img_corp"></a>
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
        <li class="nav-item <?php if($nav==1){ echo 'active'; } ?> ">
        	<a class="nav-link" href="fechas.php">Fechas</a>
        </li>

    	<!-- link de navegabilidad -->
    	<li class="nav-item <?php if($nav==2){ echo 'active'; } ?> ">
        	<a class="nav-link" href="tabla_posiciones.php">Tabla De Posiciones</a>
        </li>

        <?php
        if ($_SESSION['Cargo'] == 'Administrador') 
        {
        ?>
        <!-- link de navegabilidad -->
        <li class="nav-item <?php if($nav==3){ echo 'active'; } ?> ">
            <a class="nav-link" href="campeonatos.php">Campeonato</a>
        </li>
        <?php
        }
        ?>

        <?php
        if ($_SESSION['Cargo'] == 'Administrador') 
        {
        ?>
        <!-- link de navegabilidad -->
        <li class="nav-item <?php if($nav==4){ echo 'active'; } ?> ">
            <a class="nav-link" href="servicios.php">Equipos</a>
        </li>
        <?php
        }
        ?>

        <?php
        if ($_SESSION['Cargo'] == 'Administrador' Or $_SESSION['Cargo'] == 'Capitan') 
        {
        ?>
        <!-- link de navegabilidad -->
        <li class="nav-item <?php if($nav==5){ echo 'active'; } ?> ">
            <a class="nav-link" href="servicios.php">Jugadores</a>
        </li>
        <?php
        }
        ?>

        <?php
        if ($_SESSION['Cargo'] == 'Administrador') 
        {
        ?>
        <!-- link de navegabilidad -->
        <li class="nav-item <?php if($nav==6){ echo 'active'; } ?> ">
            <a class="nav-link" href="estadios.php">Estadios</a>
        </li>
        <?php
        }
        ?>

    <!-- cierre de la lista de los links de la navegabilidad -->
    </ul>
  	</div>

    <?php
    if (isset($_SESSION['Nombre']) AND (isset($_SESSION['Cargo']))) 
    {
    ?>

    <!-- Muestra que usuario ingreso y la opcion para cerrar la sesion -->
    <div id="usuario">
        <p id="texto"><?php echo $_SESSION['Nombre'] ?> - <?php echo $_SESSION['Cargo'] ?><br>
        <a id="link" href="../controller/controlador_sesiones.php?cerrar_sesion" class="badge badge-pill badge-danger">&laquo;&laquo;&laquo; Cerrar Sesión &raquo;&raquo;&raquo;</a></p>
    </div>

    <?php
    }
    ?>

  	<!-- cierre de la etiqueta de los links de navegabilidad -->
	</nav>
<!-- cierre de la cabecera del documento -->
</header>
<link rel="stylesheet" type="text/css" href="../assets/css/navbar.css">
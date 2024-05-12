<?php

/* Inicia la sesion */
session_start();
/* Incluye el controlador */
require_once('../controller/controller.php');
/* Incluye el modelo del usuario */
require_once('../model/modelo_estadios.php');
$nav = 6;

/* Muestra un aviso que envia el controlador */
if (isset($_SESSION['aviso'])) 
{
	echo $_SESSION['aviso'];
	unset($_SESSION['aviso']);
}

?>

<!-- le dice al navegador que se esta usando la ultima verion de html -->
<!DOCTYPE html>
<!-- abre el documento html -->
<html lang="es">
<!-- cabeza del documento html -->
<head>
	<!-- titulo del documento -->
	<title>Estadios Campeonato</title>
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
<?php
include('navbar.php');
?>
<!-- se abre el cuerpo del documento -->
<body>
	<!-- estilos de css -->
	<link rel="stylesheet" type="text/css" href="../assets/css/estadios.css">
	<!-- titulo de mayor importancia -->
	<h1>Estadios<span class="badge badge-secondary"></span></h1>
	<!-- formulario para pedir imformacion al usuario -->
	<form action="../controller/controlador_estadios.php" method="POST"> 
		<!-- etiqueta para mostrar el contenido en un contenedor -->
		<div class="container">	
			<?php

			if (isset($_GET['Modificar']) AND $_SESSION['Cargo'] == 'Administrador') 
			{
				if (isset($_GET['Modificar'])) 
				{
					$mysqli_mod = new Estadio();
					$filasEst = $mysqli_mod->Consultar_Estadio($_GET['Modificar']);
				}
			?>

			<!-- etiqueta para agrupar elementos --> 
			<div hidden class="form-group">
				<!-- label para mostrar un texto -->
				<label for="codigo_usuario">Código De Estadio</label>
				<!-- etiqueta para campo de texto -->
				<input name="Codigo" type="text" class="form-control" id="codigo_usuario" placeholder="Digite el codigo" required="" readonly="" value="<?php if(isset($filasEst[0])){ echo $filasEst[0]; } ?>">
			<!-- cierre de la etiqueta de agrupar elementos -->
			</div>
			
			<?php
			}
			if (isset($_GET['cons'])) 
			{
				$mysqli_mod = new Estadio();
				$fila3 = $mysqli_mod->Consultar_Usuario2($_SESSION['Id']);
			}
			?>

			<!-- etiqueta para agrupar elementos --> 
			<div class="form-group">
				<!-- label para mostrar un texto -->
				<label for="user_usuario">Nombre Estadio</label>
				<!-- etiqueta para campo de texto -->
				<input name="Nombre" type="text" class="form-control" id="user_usuario" placeholder="Escriba El Nombre" required="" minlength="8" maxlength="50" title="Entre 8 y 50 caracteres" value="<?php if(isset($filasEst[1])){ echo $filasEst[1]; } ?>" >
			<!-- cierre de la etiqueta de agrupar elementos -->
			</div>

			<!-- etiqueta para agrupar elementos --> 
			<div class="form-group">
				<!-- label para mostrar un texto -->
				<label for="contraseña_usuario">Ciudad Estadio</label>	
				<!-- etiqueta para campo de texto -->
				<input name="Ciudad" type="text" class="form-control" id="contraseña_usuario" placeholder="Escriba La Ciudad" required="" minlength="8" maxlength="50" title="Debe entre 8 y 50 caracteres" value="<?php if(isset($filasEst[2])){ echo $filasEst[2]; } ?>">	
			<!-- cierre de la etiqueta de agrupar elementos -->
			</div>	
			
			<!-- etiqueta para agrupar elementos --> 
			<div class="form-group">
				<!-- label para mostrar un texto -->
				<label for="nombre_usuario">Dirección</label>	
				<!-- etiqueta para campo de texto -->
				<input name="Direccion" type="text" class="form-control" id="nombre_usuario" placeholder="Escriba La Dirección" required="" minlength="8" maxlength="50" title="Solo letras, entre 8 y 50 caracteres" value="<?php if(isset($filasEst[3])){ echo $filasEst[3]; } ?>">	
			<!-- cierre de la etiqueta de agrupar elementos -->
			</div>	

			<!-- etiqueta para agrupar elementos --> 
			<div class="form-group">
				<!-- label para mostrar un texto -->
				<label for="apellido_usuario">Capacidad</label>	
				<!-- etiqueta para campo de texto -->
				<input name="Capacidad" type="number" class="form-control" id="apellido_usuario" placeholder="Ingrese el Apellido" required="" title="Digite La Capacidad" value="<?php if(isset($filasEst[4])){ echo $filasEst[4]; } ?>">	
			<!-- cierre de la etiqueta de agrupar elementos -->
			</div>

		<!-- cierre de la etiqueta del contenedor -->
		</div>
		<!-- etiqueta para agrupar elementos --> 
		<div class="container" id="boton">
			<?php
			if ($_SESSION['Cargo'] == 'Administrador' AND !isset($_GET['Modificar'])) 
			{
			?>

			<!-- Botón Para Registrar Usuario -->
			<button type="submit" name="submit_crear" class="btn btn-success" id="botones">Registrar Estadio</button>

			<?php
			}
			?>

			<?php
			if (isset($_GET['Modificar'])) 
			{
			?>
			<!-- Botón Para Actualizar Usuario -->
			<button type="submit" name="submit_modificar" class="btn btn-success" id="botones">Actualizar Estadio</button><br>
			<?php
			}
			?>

			<?php /*
			if ($cargo_estud == 'Estudiante' AND $_SESSION['Cargo'] == 'Administrador') 
			{
			?>
			<!-- botones de los procesos de las clases -->
			<button type="submit" name="submit_asignacion" class="btn btn-success" id="botones">Registrar Asignación</button><br>
			<!-- botones de los procesos de las clases -->
			<button type="submit" name="submit_seguimiento" class="btn btn-success" id="botones">Registrar Seguimiento</button>
			<?php
			}
			*/ ?>

		<!-- cierre de la etiqueta de agrupar elementos -->
		</div>
	<!-- cierre de la etiqueta del formulario -->
	</form>

	<!-- -------------------------------------------------------------------------------------------------- -->

	<?php

	if (isset($_GET['filtro']))
	{
		/*$sql = " SELECT id_Usuario,Usuario,Contrasena,nombre_Usuario,apellido_Usuario,tipo_Doc_Usuario,Doc_Usuario,nombre_Cargo,nombre_Especialidad FROM Usuario 
        INNER JOIN Cargo ON Usuario.tipo_Usuario = Cargo.id_Cargo 
        INNER JOIN Especialidad ON Usuario.id_EspecialidadFK = Especialidad.id_Especialidad 
        WHERE estado_Usuario = 'Activo'".$nombre."".$apelli."".$documento."".$tipo."".$esp." ";*/
        $sql = " CALL SP_Filtro('".$_GET['nombre']."%','".$_GET['apellido']."%','".$_GET['doc']."%','".$_GET['tipo']."%','".$_GET['esp']."%') ";
        $res = mysqli_query($conexion,$sql);

        $_SESSION['consultar_usuarios'] = '';
	}

	?>

	<!-- -------------------------------------------------------------------------------------------------- -->

	<!-- Tabla que muestra todos los registros de la tabla usuario -->
	<?php

	if (isset($_SESSION['consultar_estadios'])) 
	{
	?>

	<div class="table-responsive">
	<table id="tabla" class="table table-striped table-bordered table-hover w-auto">
	    <thead>
	        <tr class="table-active">
                <th>Nombre</td>
                <th>Ciudad</td>
                <th>Dirección</td>
                <th>Capacidad</td>
                <th>Edición</td>
                <th>Inactivación</td>
	        </tr>
	    </thead>
        <tbody>
            <?php 
			
			$res = 0;
            if (isset($res))
            {
            	$mysqli_cons = new Estadio();
  				$res = $mysqli_cons->Consultar_Estadios();
            }
            
            while ($estadio = mysqli_fetch_array($res,MYSQLI_BOTH)) 
            {   
            	?>
                <tr>
                	<td><?php echo $estadio[1] ?></td>
                	<td><?php echo $estadio[2] ?></td>
                	<td><?php echo $estadio[3] ?></td>
                	<td><?php echo $estadio[4] ?></td>
                	<td><a href="estadios.php?Modificar='<?php echo $estadio[0] ?>'" class='btn btn-warning'>Editar</a></td>
                	<td><a onclick="return confirm('¿Estas seguro de Inactivar este registro?');" href="../controller/controlador_estadios.php?Inactivar='<?php echo $estadio[0] ?>'" class='btn btn-danger'>Inactivar</a></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
	</table>
	</div>

	<?php
	}
	elseif ($_SESSION['Cargo'] == 'Administrador') 
	{   
	?>

	<!-- Boton para consultar los Usuarios -->
	<center><a href="../controller/controlador_estadios.php?consultar=''#tabla" class="btn btn-info">Consultar Estadios</a></center><br>

	<?php
	}
	unset($_SESSION['consultar_estadios']);
	?>

<!-- cierre del cuerpo del documento -->
</body>

	<!-- Incluye el footer -->
	<?php
	include('footer.html');
	?>

<!-- cierre del documento html -->
</html>
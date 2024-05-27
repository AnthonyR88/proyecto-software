<?php

/* Inicia la sesion */
session_start();
/* Incluye el controlador */
require_once('../controller/controller.php');
/* Incluye el modelo del campeonato */
require_once('../model/modelo_campeonatos.php');
$nav = 3;

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
	<title>Campeonatos</title>
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
	<link rel="stylesheet" type="text/css" href="../assets/css/campeonatos.css">
	<!-- titulo de mayor importancia -->
	<h1>Campeonatos<span class="badge badge-secondary"></span></h1>
	<!-- formulario para pedir imformacion al usuario -->
	<form action="../controller/controlador_campeonatos.php" method="POST"> 
		<!-- etiqueta para mostrar el contenido en un contenedor -->
		<div class="container">	
			<?php

			$fila3[5] = null;
			$fila3[8] = null;
			$fila3[9] = null;


			if (isset($_GET['Modificar'])) 
			{
				$mysqli_mod = new Campeonato();
				$fila3 = $mysqli_mod->Consultar_Campeonato($_GET['Modificar']);
			}

			?>

			<!-- etiqueta para agrupar elementos --> 
			<div hidden class="form-group">
				<!-- label para mostrar un texto -->
				<label for="codigo_usuario">Código Del Campeonato</label>
				<!-- etiqueta para campo de texto -->
				<input name="Codigo" type="text" class="form-control" id="codigo_usuario" placeholder="Digite el codigo" required="" readonly="" value="<?php if(isset($fila3[0])){ echo $fila3[0]; } ?>">
			<!-- cierre de la etiqueta de agrupar elementos -->
			</div>

			<?php

			if (!isset($_GET['equipo']))
			{

			?>

			<!-- etiqueta para agrupar elementos --> 
			<div class="form-group">
				<!-- label para mostrar un texto -->
				<label for="user_usuario">Nombre</label>
				<!-- etiqueta para campo de texto -->
				<input name="Nombre" type="text" class="form-control" id="user_usuario" placeholder="Ingrese el nombre" required="" minlength="10" maxlength="50" title="Entre 10 y 50 caracteres" value="<?php if(isset($fila3[1])){ echo $fila3[1]; } ?>" >
			<!-- cierre de la etiqueta de agrupar elementos -->
			</div>

			<!-- etiqueta para agrupar elementos --> 
			<div class="form-group">
				<!-- label para mostrar un texto -->
				<label for="contraseña_usuario">Ciudad</label>	
				<!-- etiqueta para campo de texto -->
				<input name="Ciudad" type="tetx" class="form-control" id="contraseña_usuario" placeholder="Ingrese la ciudad" required="" minlength="8" maxlength="16" title="Debe entre 8 y 50 caracteres" value="<?php if(isset($fila3[2])){ echo $fila3[2]; } ?>">	
			<!-- cierre de la etiqueta de agrupar elementos -->
			</div>	
			
			<!-- etiqueta para agrupar elementos --> 
			<div class="form-group">
				<!-- label para mostrar un texto -->
				<label for="nombre_usuario">Año</label>	
				<!-- etiqueta para campo de texto -->
				<input name="Anio" type="number" class="form-control" id="nombre_usuario" placeholder="Ingrese el año" required="" title="Solo números" value="<?php if(isset($fila3[3])){ echo $fila3[3]; } ?>">	
			<!-- cierre de la etiqueta de agrupar elementos -->
			</div>	

			<?php /*
			<!-- etiqueta para agrupar elementos --> 
			<div class="form-group">
				<!-- label para mostrar un texto -->
				<label for="apellido_usuario">Apellido</label>	
				<!-- etiqueta para campo de texto -->
				<input name="Apellido" type="text" class="form-control" id="apellido_usuario" placeholder="Ingrese el Apellido" required="" pattern="[a-zA-ZñÑ ]{3,50}" title="Solo letras, entre 8 y 50 caracteres" value="<?php if(isset($fila3[4])){ echo $fila3[4]; } ?>">	
			<!-- cierre de la etiqueta de agrupar elementos -->
			</div>
			*/ ?>

			<!-- etiqueta para agrupar elementos --> 
			<div class="form-group">
				<!-- label para mostrar un texto -->
				<label for="tipo_usuario">Campeon</label>	
				<!-- etiqueta para lista desplegable -->
				<select name="Campeon" class="form-control" id="tipo_usuario">
					<option value="">Seleccione uno</option>
				
				<?php /*

				$cargo_estud = null;
				$res = Roles();
				while($cargo = mysqli_fetch_array($res,MYSQLI_BOTH))
				{
					if ($cargo[0] == $fila3[2]) 
					{
						echo "<option selected value='".$cargo[0]."'>".$cargo[1]."</option>";
						$cargo_estud = $cargo[1];
					}
					else
					{
						echo "<option value='".$cargo[0]."'>".$cargo[1]."</option>";
					}
				}

				*/ ?>

				<!-- cierre de etiqueta de lista desplegable -->
				</select>	
			<!-- cierre de la etiqueta de agrupar elementos -->
			</div>
			
			<!-- etiqueta para agrupar elementos --> 
			<div class="form-group">
				<!-- label para mostrar un texto -->
				<label for="tipo_usuario">Subcampeon</label>	
				<!-- etiqueta para lista desplegable -->
				<select name="SubCampeon" class="form-control" id="tipo_usuario">
					<option value="">Seleccione uno</option>
				
				<?php /*

				$cargo_estud = null;
				$res = Roles();
				while($cargo = mysqli_fetch_array($res,MYSQLI_BOTH))
				{
					if ($cargo[0] == $fila3[2]) 
					{
						echo "<option selected value='".$cargo[0]."'>".$cargo[1]."</option>";
						$cargo_estud = $cargo[1];
					}
					else
					{
						echo "<option value='".$cargo[0]."'>".$cargo[1]."</option>";
					}
				}

				*/ ?>

				<!-- cierre de etiqueta de lista desplegable -->
				</select>	
			<!-- cierre de la etiqueta de agrupar elementos -->
			</div>

			<?php
			}
			else
			{
			?>

			<!-- etiqueta para agrupar elementos --> 
			<div class="form-group">
				<!-- label para mostrar un texto -->
				<label for="tipo_usuario">Equipos</label>	
				<!-- etiqueta para lista desplegable -->
				<select name="Equipos" class="form-control" id="tipo_usuario">
					<option value="">Seleccione uno</option>
				
				<?php

				$cargo_estud = null;
				$res = Equipos();
				while($equp = mysqli_fetch_array($res,MYSQLI_BOTH))
				{
					if ($equp[0] == $fila3[2]) 
					{
						echo "<option selected value='".$equp[0]."'>".$equp[1]."</option>";
						$cargo_estud = $equp[1];
					}
					else
					{
						echo "<option value='".$equp[0]."'>".$equp[1]."</option>";
					}
				}

				?>

				<!-- cierre de etiqueta de lista desplegable -->
				</select>	
			<!-- cierre de la etiqueta de agrupar elementos -->
			</div>

			<?php
			}
			?>

		<!-- cierre de la etiqueta del contenedor -->
		</div>
		<!-- etiqueta para agrupar elementos --> 
		<div class="container" id="boton">
			<?php
			if ($_SESSION['Cargo'] == 'Administrador' AND !isset($_GET['Modificar'])) 
			{
			?>

			<!-- Botón Para Registrar Usuario -->
			<button type="submit" name="submit_crear" class="btn btn-success" id="botones">Registrar Campeonato</button>

			<?php
			}
			?>

			<?php
			if (isset($_GET['Modificar'])) 
			{
			?>

			<!-- Botón Para Actualizar Campeonato -->
			<button type="submit" name="submit_modificar" class="btn btn-success" id="botones">Actualizar Campeonato</button><br>

			<!-- Botón Para Agregar Equipo A Campeonato -->
			<a href="campeonatos.php?equipo=''" class="btn btn-warning" id="botones">Agregar Equipo</a><br>

			<!-- Botón Para Actualizar Usuario -->
			<button type="submit" name="submit_proceso" class="btn btn-warning" id="botones" onclick="return confirm('¿Estas seguro de generar Campeonato?');">Generar Campeonato</button><br>

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

	<!-- Tabla que muestra todos los registros de la tabla usuario -->
	<?php

	if (isset($_SESSION['consultar_campeonatos'])) 
	{
	?>

	<div class="table-responsive">
	<table id="tabla" class="table table-striped table-bordered table-hover w-auto">
	    <thead>
	        <tr class="table-active">
                <th>Nombre</td>
                <th>Ciudad</td>
                <th>Año</td>
                <th>Campeon</td>
                <th>Subcampeon</td>
                <th>Proceso</td>
				<th>Edición</td>
                <th>Inactivación</td>
	        </tr>
	    </thead>
        <tbody>
            <?php 

            #if (isset($res))
            #{
            	$mysqli_cons = new Campeonato();
  				$res = $mysqli_cons->Consultar_Campeonatos();
            #}
            
            while ($camp = mysqli_fetch_array($res,MYSQLI_BOTH)) 
            {   
            	?>
                <tr>
                	<td><?php echo $camp[1] ?></td>
                	<td><?php echo $camp[2] ?></td>
                	<td><?php echo $camp[3] ?></td>
                	<td><?php echo $camp[4] ?></td>
					<td><?php echo $camp[5] ?></td>
                	<td><?php echo $camp[6] ?></td>
                	<td><a href="campeonatos.php?Modificar='<?php echo $camp[0] ?>'" class='btn btn-warning'>Editar</a></td>
                	<td><a onclick="return confirm('¿Estas seguro de Inactivar este registro?');" href="../controller/controlador_campeonatos.php?Inactivar='<?php echo $camp[0] ?>'" class='btn btn-danger'>Inactivar</a></td>
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
	<center><a href="../controller/controlador_campeonatos.php?consultar=''#tabla" class="btn btn-info">Consultar Campeonatos</a></center><br>

	<?php
	}
	unset($_SESSION['consultar_campeonatos']);
	?>

<!-- cierre del cuerpo del documento -->
</body>

	<!-- Incluye el footer -->
	<?php
	include('footer.html');
	?>

<!-- cierre del documento html -->
</html>
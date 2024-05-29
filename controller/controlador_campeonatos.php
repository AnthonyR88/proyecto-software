<?php

/* Inicia la sesion */
session_start();
/* Incluye el controlador */
require_once('controller.php');
/* Incluye el modelo del usuario */
require_once('../model/modelo_campeonatos.php');

/* Valida autorizaciones de acceso */
if (!$_SESSION['Cargo'] == 'Administrador')
{
	/* Redidige a el menú principal */
	header('location:../view/index.php');
}

/* Crea una variable SESSION que permite mostrar la tabla de los usuarios */
if (isset($_GET['consultar']) AND $_SESSION['Cargo'] == 'Administrador')
{
	$_SESSION['consultar_campeonatos'] = '';
}

/* Codigo para crear un usuario */
if (isset($_POST['submit_crear']) AND $_SESSION['Cargo'] == 'Administrador')
{
	$a = $_POST['Nombre'];
	$b = $_POST['Ciudad'];
	$c = $_POST['Anio'];

	#$check = new Validate_User();
	#$fila = $check->Check_User_Insert($a);

	if (!empty($a) AND !empty($b) AND !empty($c)) 
	{
		if (is_numeric($c)) 
		{
			$mysqli_crear = new Campeonato();
			if ($mysqli_crear->Crear_Campeonato($a,$b,$c))
			{
				$_SESSION['aviso'] = "<script type='text/javascript'> alert('Campeonato Registrado con Éxito'); </script>";
			}
			else
			{
				$_SESSION['aviso'] = "<script type='text/javascript'> alert('Error, No se pudo Registrar el Campeonato'); </script>";
			}
		}
	}
}

/* Codigo para modificar un usuario */
if (isset($_POST['submit_modificar']) AND $_SESSION['Cargo'] == 'Administrador') 
{
	$a = $_POST['Nombre'];
	$b = $_POST['Ciudad'];
	$c = $_POST['Anio'];
	$d = $_POST['Campeon'];
	$e = $_POST['SubCampeon'];
	$id = $_POST['Codigo'];

	if (empty($d))
	{
		$d = 0;
	}
	if (empty($e))
	{
		$e = 0;
	}

	if (!empty($a) AND !empty($b) AND !empty($c)) 
	{
		if ((is_numeric($c))) 
		{
			$mysqli_modificar = new Campeonato();
			if ($mysqli_modificar->Modificar_Campeonato($a,$b,$c,$d,$e,$id)) 
			{
				$_SESSION['aviso'] = "<script type='text/javascript'> alert('Información de Campeonato Actualizada con Éxito'); </script>";
			}
			else
			{
				$_SESSION['aviso'] = "<script type='text/javascript'> alert('Error, No se pudo Actualizar información del Campeonato'); </script>";
			}
		}
	}
}

/* Codigo para inactivar un usuario */
if (isset($_GET['Inactivar']) AND $_SESSION['Cargo'] == 'Administrador') 
{
	$id = $_GET['Inactivar'];

	$mysqli_inactivar = new Campeonato();
	if ($mysqli_inactivar->Inactivar_Campeonato($id)) 
	{
		$_SESSION['aviso'] = "<script type='text/javascript'> alert('Campeonato Inactivado con Éxito'); </script>";
	}
	else
	{
		$_SESSION['aviso'] = "<script type='text/javascript'> alert('Error, No se pudo Inactivar el Campeonato'); </script>";
	}
}

/* */
if (isset($_POST['submit_equipo']))
{
	$camp = $_POST['Codigo'];
	$equipo = $_POST['Equipos'];

	$mysqli_crear_campequ = new Campeonato();
	$fila1 = $mysqli_crear_campequ->Val_CampEqu($camp, $equipo);

	if ($fila1[0] != 0) 
	{
		$_SESSION['aviso'] = "<script type='text/javascript'> alert('Error, Equipo ya Registrado'); </script>";
	}
	else
	{
		if ($mysqli_crear_campequ->Crear_CampEqu($camp, $equipo)) 
		{
			$_SESSION['aviso'] = "<script type='text/javascript'> alert('Equipo Agregado al campeonato con Éxito'); </script>";
		}
		else
		{
			$_SESSION['aviso'] = "<script type='text/javascript'> alert('Error, No se pudo Agregar el Equipo al campeonato'); </script>";
		}
	}
}

/* Codigo para inactivar un usuario */
if (isset($_GET['Eliminar'])) 
{
	$id = $_GET['Eliminar'];

	$mysqli_eliminar = new Campeonato();
	if ($mysqli_eliminar->Eliminar_CampEqu($id)) 
	{
		$_SESSION['aviso'] = "<script type='text/javascript'> alert('Equipo Eliminado de campeonato con Éxito'); </script>";
	}
	else
	{
		$_SESSION['aviso'] = "<script type='text/javascript'> alert('Error, No se pudo Eliminar el Equipo del Campeonato'); </script>";
	}
}

/* Redidige a la vista de campeonatos */
header('location:../view/campeonatos.php');

?>
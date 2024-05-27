<?php

/* Inicia la sesion */
session_start();
/* Incluye el controlador */
require_once('controller.php');
/* Incluye el modelo del usuario */
require_once('../model/modelo_campeonatos.php');

/* 
if (isset($_POST['submit_asignacion'])) 
{
	/* Crea variables SESSION para llevarlas a el formulario de asignaciones
	$_SESSION['user'] = $_POST['Codigo'];
	$_SESSION['name'] = $_POST['Nombre']." ".$_POST['Apellido'];
	/* Redidige a la vista de asignacion 
	header('location:../view/asignacion.php');
} */

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

/* Redidige a la vista de campeonatos */
header('location:../view/campeonatos.php');

?>
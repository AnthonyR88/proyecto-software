<?php

/* Inicia la sesión */
session_start();
/* Incluye el controlador base si es necesario */
require_once('controller.php');
/* Incluye el modelo de estadio */
require_once('../model/modelo_estadio.php');

if (isset($_GET['consultar']) AND $_SESSION['Cargo'] == 'Administrador') 
{
	$_SESSION['consultar_estadios'] = '';
}

/* Código para crear un estadio */
if (isset($_POST['submit_crear']) AND $_SESSION['Cargo'] == 'Administrador') 
{
	$nombre = $_POST['nombre'];
	$ciudad = $_POST['ciudad'];
	$direccion = $_POST['direccion'];

	$mysqli_crear = new Estadio();
	$fila1 = $mysqli_crear->Check_Estadio($nombre);

	if ($fila1[0] != 0)
	{
		$_SESSION['aviso'] = "<script type='text/javascript'> alert('Error, Estadio ya existe'); </script>";
	}
	else
	{
		if ($mysqli_crear->Crear_Estadio($nombre, $ciudad, $direccion)) 
		{
			$_SESSION['aviso'] = "<script type='text/javascript'> alert('Estadio Registrado con Éxito'); </script>";
		}
		else
		{
			$_SESSION['aviso'] = "<script type='text/javascript'> alert('Error, No se pudo Registrar el Estadio'); </script>";
		}
	}
}

/* Código para modificar un estadio */
if (isset($_POST['submit_modificar']) AND $_SESSION['Cargo'] == 'Administrador') 
{
	$nombre = $_POST['nombre'];
	$ciudad = $_POST['ciudad'];
	$direccion = $_POST['direccion'];

	$mysqli_mod = new Estadio();
	$fila2 = $mysqli_mod->Check_Estadio($nombre);

	if ($fila2[0] == 0)
	{
		$_SESSION['aviso'] = "<script type='text/javascript'> alert('Error, Estadio No Existe'); </script>";
	}
	else
	{
		if ($mysqli_mod->Modificar_Estadio($nombre, $ciudad, $direccion))
		{
			$_SESSION['aviso'] = "<script type='text/javascript'> alert('Información del Estadio Actualizada con Éxito'); </script>";
		}
		else
		{
			$_SESSION['aviso'] = "<script type='text/javascript'> alert('Error, No se pudo Actualizar Información del Estadio'); </script>";
		}
	}
}

/* Código para inactivar un estadio */
if (isset($_GET['inactivar']) AND $_SESSION['Cargo'] == 'Administrador') 
{
	$nombre = $_GET['inactivar'];

	$mysqli_inactivar = new Estadio();
	if ($mysqli_inactivar->Inactivar_Estadio($nombre)) 
	{
		$_SESSION['aviso'] = "<script type='text/javascript'> alert('Estadio Inactivado con Éxito'); </script>";
	}
	else
	{
		$_SESSION['aviso'] = "<script type='text/javascript'> alert('Error, No se pudo Inactivar el Estadio'); </script>";
	}
}

/* Redirige a la vista de estadio */
header('Location: ../view/estadio.php');

?>

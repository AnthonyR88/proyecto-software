<?php

/* Inicia la sesion */
session_start();
/* Incluye el controlador */
require_once('controller.php');
/* Incluye el modelo del usuario */
require_once('../model/modelo_estadios.php');

/* Crea una variable SESSION que permite mostrar la tabla de los estadios */
if (isset($_GET['consultar']) AND $_SESSION['Cargo'] == 'Administrador')
{
	$_SESSION['consultar_estadios'] = '';
	/* Redidige a la vista de usuario */
	header('location:../view/estadios.php');
}

/* Codigo para crear un usuario */
if (isset($_POST['submit_crear']) AND $_SESSION['Cargo'] == 'Administrador')
{
	$a = $_POST['Nombre'];
	$b = $_POST['Ciudad'];
	$c = $_POST['Direccion'];
	$d = $_POST['Capacidad'];
	
	if (!empty($a) AND !empty($b) AND !empty($c) AND !empty($d)) 
	{
		if (is_numeric($d)) 
		{
			$mysqli_crear = new Estadio();
			if ($mysqli_crear->Crear_Estadio($a,$b,$c,$d))
			{
				$_SESSION['aviso'] = "<script type='text/javascript'> alert('Estadio Registrado con Éxito'); </script>";
			}
			else
			{
				$_SESSION['aviso'] = "<script type='text/javascript'> alert('Error, No se pudo Registrar el Estadio'); </script>";
			}
		}
	}

	/* Redidige a la vista de usuario */
	header('location:../view/estadios.php');
}

/* Codigo para modificar un usuario */
if (isset($_POST['submit_modificar']) AND $_SESSION['Cargo'] == 'Administrador') 
{
	$a = $_POST['Nombre'];
	$b = $_POST['Ciudad'];
	$c = $_POST['Direccion'];
	$d = $_POST['Capacidad'];
	$e = $_POST['Codigo'];

	$check1 = new Validate_Estadio();
	$fila2 = $check1->Check_Estadio_Update($e);

	if ($fila2[0] == 0)
	{
		$_SESSION['aviso'] = "<script type='text/javascript'> alert('Error, Estadio No Existe'); </script>";
	}
	else
	{
		if (!empty($a) AND !empty($b) AND !empty($c) AND !empty($c)) 
		{
			if ((is_numeric($d))) 
			{
				$mysqli_modificar = new Estadio();
				if ($mysqli_modificar->Modificar_Estadio($a,$b,$c,$d,$e)) 
				{
					$_SESSION['aviso'] = "<script type='text/javascript'> alert('Información de Estadio Actualizada con Éxito'); </script>";
				}
				else
				{
					$_SESSION['aviso'] = "<script type='text/javascript'> alert('Error, No se pudo Actualizar información del Estadio'); </script>";
				}
			}
		}
	}

	/* Redidige a la vista de usuario */
	header('location:../view/estadios.php');
}

/* Codigo para inactivar un usuario */
if (isset($_GET['Inactivar']) AND $_SESSION['Cargo'] == 'Administrador') 
{
	$id = $_GET['Inactivar'];

	$mysqli_inactivar = new Usuario();
	if ($mysqli_inactivar->Inactivar_Usuario($id)) 
	{
		$_SESSION['aviso'] = "<script type='text/javascript'> alert('Usuario Inactivado con Éxito'); </script>";
	}
	else
	{
		$_SESSION['aviso'] = "<script type='text/javascript'> alert('Error, No se pudo Inactivar el Usuario'); </script>";
	}

	/* Redidige a la vista de usuario */
	header('location:../view/estadios.php');
}

?>
<?php

/* Inicia la sesion */
session_start();
/* Incluye el controlador */
require_once('../controller/controller.php');
/* Incluye el modelo del usuario */
require_once('../model/modelo_usuario.php');

/* codigo que valida las credenciales de acceso y crea una sesion si son validas */
if (isset($_POST['cuenta']) AND isset($_POST['clave']))
{
	$user = $_POST['cuenta'];
	$pass = $_POST['clave'];

	$mysqli_acceso = new Usuario();
	if($fila = $mysqli_acceso->Consultar_Acceso($user,$pass))
	{
		$_SESSION['Id'] = $fila[0];
		$_SESSION['Nombre'] = $fila[1].' '.$fila[2];
		$_SESSION['Cargo'] = $fila[3];
		$_SESSION['Ident'] = $fila[4];
		$_SESSION['time'] = time();

		header('location:../view/index.php');
	}
	else
	{
		header('location:../view/login.php?error');
	}
}

/* Elimina y destruye las sesiones para cerrar la sesion */
if (isset($_GET['cerrar_sesion'])) 
{
    session_unset();
    session_destroy(); 
    header('location:../view/index.php');
}

?>
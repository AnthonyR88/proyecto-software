<?php
// Inicia la sesión
session_start();
// Incluye el controlador
require_once('controller.php');
// Incluye el modelo de cliente
require_once('../model/modelo_cliente.php');

// Parámetros de conexión a la base de datos
$host = 'localhost';  // O la IP del servidor de bases de datos
$dbname = 'tu_base_de_datos';  // Nombre de tu base de datos
$username = 'tu_usuario';  // Usuario de la base de datos
$password = 'tu_contraseña';  // Contraseña del usuario

// Intenta conectar a la base de datos
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configura el modo de error de PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Codigo para crear un equipo
    if (isset($_POST['submit_crear']) && $_SESSION['Cargo'] == 'Administrador') {
        // Recoge los datos del formulario
        $id = $_POST['Documento'];
        $tip = $_POST['Tipo_Documento'];
        $nombre = $_POST['Nombres'];
        $apellido = $_POST['Apellidos'];
        $tel = $_POST['Telefono'];
        $cel = $_POST['Celular'];
        $correo = $_POST['Correo'];
        $dir = $_POST['Direccion'];

        // Prepara la sentencia SQL para insertar datos
        $sql = "INSERT INTO equipos (Documento, Tipo_Documento, Nombres, Apellidos, Telefono, Celular, Correo, Direccion) 
                VALUES (:id, :tip, :nombre, :apellido, :tel, :cel, :correo, :dir)";
        $stmt = $conn->prepare($sql);
        
        // Vincula parámetros a la sentencia preparada
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':tip', $tip);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':tel', $tel);
        $stmt->bindParam(':cel', $cel);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':dir', $dir);

        // Ejecuta la sentencia
        $stmt->execute();

        // Muestra un mensaje de éxito
        $_SESSION['aviso'] = "<script type='text/javascript'> alert('Equipo Registrado con Éxito'); </script>";
    }
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

// Redirige a la vista de cliente
header('location:../view/cliente.php');
?>


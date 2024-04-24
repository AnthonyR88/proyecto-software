<?php

class Equipo {
    private $conn;

    // Constructor para establecer la conexión
    public function __construct($host, $dbname, $username, $password) {
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }

    // Método para crear un nuevo equipo
    public function crearEquipo($nombre, $ciudad, $direccion) {
        try {
            $sql = "INSERT INTO Estadios (Nombre, Ciudad, Direccion) VALUES (:nombre, :ciudad, :direccion)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':ciudad', $ciudad);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error al crear el equipo: " . $e->getMessage();
            return false;
        }
    }
}

// Parámetros de conexión a la base de datos
$host = 'localhost';
$dbname = 'tu_base_de_datos';
$username = 'tu_usuario';
$password = 'tu_contraseña';

// Crear una instancia del modelo de equipo
$equipoModelo = new Equipo($host, $dbname, $username, $password);

// Ejemplo de uso:
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $ciudad = $_POST['ciudad'];
    $direccion = $_POST['direccion'];
    if ($equipoModelo->crearEquipo($nombre, $ciudad, $direccion)) {
        echo "Equipo creado con éxito.";
    } else {
        echo "Error al crear el equipo.";
    }
}

?>

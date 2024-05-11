<?php
// Incluir el archivo de configuración
include('config.php');

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validar la dirección de correo electrónico
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        die('Error: Dirección de correo electrónico no válida');
    }

    // Limpiar y escapar la dirección de correo electrónico para evitar inyección SQL
    $email = $conexion->real_escape_string($_POST['email']);

    // Consulta para verificar si el correo ya está suscrito
    $consulta = "SELECT id FROM subscribers WHERE email = '$email'";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        die('Error: Esta dirección de correo electrónico ya está suscrita');
    }

    // Insertar la dirección de correo electrónico en la base de datos
    $sql = "INSERT INTO subscribers (email) VALUES ('$email')";

    if ($conexion->query($sql) === TRUE) {
        echo "¡Te has suscrito correctamente!";
    } else {
        echo "Error al suscribirse: " . $conexion->error;
    }
} else {
    // Redireccionar si se intenta acceder directamente a este archivo
    header('Location: index.php');
    exit;
}

// Cerrar la conexión
$conexion->close();
?>

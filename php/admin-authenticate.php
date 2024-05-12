<?php
// Incluir el archivo de configuración
require_once 'config.php';

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];

    // Consulta SQL para obtener las credenciales del administrador
    $sql = "SELECT * FROM administradores WHERE username = '$input_username' AND password = '$input_password'";
    $result = mysqli_query($conn, $sql);

    // Verificar si se encontró un registro
    if (mysqli_num_rows($result) == 1) {
        // Inicio de sesión exitoso
        echo "¡Bienvenido, administrador!";
        // Aquí podrías redirigir al administrador a una página interna
        // Por ejemplo: header("Location: admin-dashboard.php");
    } else {
        // Credenciales incorrectas
        echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }
} else {
    // Si se intenta acceder al script directamente sin enviar datos por POST
    echo "Acceso no autorizado.";
}
?>

<?php
// Configuración de la base de datos
define('DB_HOST', 'sql10.freesqldatabase.com');
define('DB_USER', 'sql10705848');
define('DB_PASS', 'EmYMytGIlq');
define('DB_NAME', 'sql10705848');

// Conexión a la base de datos
$conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Verificar la conexión
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}
?>

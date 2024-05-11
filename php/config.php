<?php
// Configuración de la base de datos
define('DB_HOST', 'sql10.freesqldatabase.com');
define('DB_USER', 'sql10705848');
define('DB_PASS', 'EmYMytGIlq');
define('DB_NAME', 'sql10705848');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
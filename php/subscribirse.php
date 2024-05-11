<?php
// Incluir el archivo de configuración
include('config.php');

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "INSERT INTO `Subscripciones` (email) VALUES (?)";

        // Prepare statement
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die('MySQL prepare error: ' . $conn->error);
        }

        // Bind parameters and execute
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
            echo "Subscription successful!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Invalid email format";
    }
}

$conn->close();
?>

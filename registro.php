<?php

$servername = "localhost";
$username = "root";
$password = ""; // Por defecto en XAMPP la contraseña es vacía
$dbname = "qmsmart";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $confirm_pass = $_POST["confirm_password"];

    // Verificar que las contraseñas coincidan
    if ($pass !== $confirm_pass) {
        echo "Las contraseñas no coinciden.";
    } else {
        // Insertar usuario en la base de datos
        $sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";

        if ($conn->query($sql) === TRUE) {
            echo "Usuario registrado con éxito.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();

?>

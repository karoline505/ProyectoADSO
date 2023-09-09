<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "qmsmart";

// Crear conexión
$conn = new mysqli($server, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

// ATENCIÓN: Este método no es seguro. En un caso real, deberías usar consultas preparadas para prevenir inyecciones SQL.
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Inicio de sesión exitoso!";
} else {
    echo "Error en las credenciales.";
}

$conn->close();

?>

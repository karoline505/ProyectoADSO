<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qmsmart";

// Recuperar el usuario y la contraseña enviados desde el formulario
$user = $_POST['username'];
$pass = $_POST['password'];

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay errores en la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar la base de datos para verificar el usuario y la contraseña
$sql = "SELECT * FROM usuarios WHERE username='$user' AND password='$pass'";
$result = $conn->query($sql);

// Verificar si se encontró un resultado
if ($result->num_rows > 0) {
    // El usuario y la contraseña son correctos
    echo "Login exitoso";
} else {
    // El usuario y/o la contraseña son incorrectos
    echo "Login fallido";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

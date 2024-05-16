<?php
// Datos de conexión a la base de datos
$host = "127.0.0.1"; 
$usuario = "root";
$contraseña = ""; 
$base_de_datos = "proyecto1.0"; 

// Crear la conexión
$conn = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos enviados por el formulario
$usuario = $_POST['txtusername'];
$contraseña= $_POST['txtpassword'];

// Consulta SQL para verificar las credenciales del usuario
$mysqli = "SELECT * FROM usuario WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
$result = $conn->query($mysqli);

if ($result->num_rows > 0) {
    // Las credenciales son válidas, iniciar sesión
    session_start();
    $_SESSION['username'] = $usuario;
    header("Location: paginaweb.html");
    echo "bienvenido.";
    
} else {
    // Las credenciales son inválidas
    header("Location: login.html"); // Redirigir a la página principal
    echo "Usuario o contraseña incorrectos.";
    
}

// Cerrar la conexión
$conn->close();
?>



<?php
// Conexión a la base de datos
$servername = "postgres://ep-old-grass-a4m8erqd.us-east-1.aws.neon.tech:5432/verceldb?sslmode=require";
$user = "default";
$pass = "pnLNdv3GBE6r";
// Crear conexión
$conn = pg_connect($servername,$user,$pass);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

// Preparar la sentencia SQL (usando sentencias preparadas para evitar inyecciones SQL)
$stmt = $conn->prepare("INSERT INTO contactos (nombre, email, telefono) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $email, $telefono);

// Ejecutar la sentencia
if ($stmt->execute()) {
    echo "Nuevo registro creado correctamente";
    header("Location: confirmacion.html");
    exit(); // Importante: detener la ejecución del script después de la redirección
} else {
    echo "Error: " . $stmt->error;

// Cerrar la conexión
$conn->close();
?>

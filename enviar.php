<?php

$conn = pg_connect("postgres://default:pnLNdv3GBE6r@ep-old-grass-a4m8erqd.us-east-1.aws.neon.tech:5432/verceldb?sslmode=require");

if (!$conn) {
    die("No se pudo conectar a la base de datos: " . pg_last_error());
}

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];


$query = "INSERT INTO contactos (nombre, email, telefono) VALUES ($1, $2, $3)";
$stmt = pg_prepare($conn, "my_insert", $query);

// Ejecutar la sentencia
if (!pg_execute($conn, "my_insert", array($nombre, $email, $telefono))) {
    echo "Error al insertar datos: " . pg_last_error($conn);
} else {
    // Si la inserción es exitosa, redirigimos a una página de confirmación
    header("location:confirmacion.html");
    exit;
}

pg_close($conn);
?>

<?php
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

$server = "postgres://default:pnLNdv3GBE6r@ep-old-grass-a4m8erqd.us-east-1.aws.neon.tech:5432/verceldb?sslmode=require";

$Conexion = pg_connect($server);
$Query = "INSERT INTO contactos (nombre, email, telefono) VALUES('$_REQUEST[nombre]','$_REQUEST[email]','$_REQUEST[telefono]')";

$result = pg_query($Conexion, $Query);
pg_close($Conexion);
?>



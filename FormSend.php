<?php

$server = "postgres://default:pnLNdv3GBE6r@ep-old-grass-a4m8erqd.us-east-1.aws.neon.tech:5432/verceldb?sslmode=require";
$user = "default";
$pass = "pnLNdv3GBE6r";
$host = "ep-old-grass-a4m8erqd.us-east-1.aws.neon.tech";
$port = "5432";
$bd_name = "verceldb";


$str_conn =pg_connect("host=$host,port=$port,dbname=$bd_name,user=$user,password=$pass");

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];


$Query = "INSERT INTO contactos(nombre, email, telefono) VALUES('$nombre','$email','$telefono')";

$result = pg_query($str_conn, $Query);
pg_close($str_conn);

?>

<!DOCTYPE html>
<html>
<head>
    <title>¡Contacto enviado!</title>
</head>
<body>

<h1>¡Datos recibidos!</h1>
<p>Tu contacto ha sido enviado con éxito.</p>
<button onclick="location.href='index.html'">Inicio</button>
</body>
</html>

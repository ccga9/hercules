<?php
//Este codigo esta duplicado con DAO de momento.
//Es para preguntar el lunes donde deberia ir

$servername = "localhost";
$username = "hercules";
$password = "iG8hC62acnPrvIeU";
$dbname = "hercules";

//Crear conexion base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

//Comprobar conexion
if ($conn->connect_error){
    die("Database connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

session_start();


$conn->close(); //Esto puede ser que vaya en otra parte

?>

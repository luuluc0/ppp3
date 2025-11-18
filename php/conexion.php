

<?php
$host = 'localhost';
$dbname = 'lacriolla';
$usuario = 'root';
$password = '';

$conexion = mysqli_connect($host, $usuario, $password, $dbname);
mysqli_set_charset($conexion, "utf8mb4");

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
} else{
    echo"";
}
?>
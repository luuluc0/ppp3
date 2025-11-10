<?php
// Define las constantes de conexión
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', ''); // Contraseña vacía por defecto en XAMPP
define('DB_NAME', 'escuela');

// Crea una nueva conexión
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Verifica si la conexión falló
if ($mysqli->connect_errno) {
    // Si hay un error, muestra el mensaje y detiene el script
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

// Configura el conjunto de caracteres a UTF-8 (importante para acentos y ñ)
$mysqli->set_charset("utf8mb4");

// Opcional: mensaje de éxito para verificar que funciona
echo "Conexión exitosa a la base de datos 'escuela'.";
?>
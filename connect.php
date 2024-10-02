<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbp";
$db = new mysqli($servername,$username,$password,$dbname );
// Verificar la conexión
if ($db->connect_error) {
    die("Error de conexión: " . $db->connect_error);
}
?>
<?php
require_once "login.php";
$connection = new mysqli($hn, $un, $pw, $db);
if ($connection->connect_error){
    $connection->close();
    die("Fallo la conexion con la base de datos ". $connection->connect_error);
}
// MOSTRAR TODOS LOS LIBROS
$query = "SELECT * FROM libros";
$result = $connection->query($query);
if(!$result) die("No se puedo acceder a toda la tabla");

$libros = array();

while($row = $result->fetch_assoc()){
    $libros[] = $row; 
}
$connection->close();

<?php
require_once "login.php";
$connection = new mysqli($hn, $un, $pw, $db);
if ($connection->connect_error){
    $connection->close();
    die("Fallo la conexion con la base de datos ". $connection->connect_error);
}

function sanitizeMysql($connection, $string){
    $string =$connection->real_escape_string($string);
    $string = strip_tags($string);
    $string = htmlentities($string);
    return $string;
}
// BORRAR LIBROS
if(isset($_POST['delete']) && isset($_POST['id']) && !empty($_POST['id'])){
    $id = sanitizeMysql($connection, $_POST["id"]);
    $query = "DELETE FROM libros WHERE id = $id";
    $result = $connection->query($query);
    if(!$result){
        echo "No se puedo eliminar<br><br>";
    }else{
        $volver = "verLibrosIndex.php";
        header("Location: " . $volver);
    }
}

$connection->close();

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

if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    if(!hash_equals($_SESSION["token"], $_POST["token"])){
        die("Token CSRF invalido");
    }
    if(isset($_POST["usuario"]) && isset($_POST["contraseña"]) &&isset($_POST["nombre"]) && isset($_POST["apellido"])){
        if(!empty($_POST["usuario"]) && !empty($_POST["contraseña"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"])){
            $usuario = sanitizeMysql($connection, $_POST["usuario"]);
            $contraseña = sanitizeMysql($connection, $_POST["contraseña"]);
            $contraseña = password_hash($contraseña, PASSWORD_DEFAULT);
            $nombre = sanitizeMysql($connection, $_POST["nombre"]);
            $apellido = sanitizeMysql($connection, $_POST["apellido"]);

            $stmt = $connection->prepare("INSERT INTO usuarios (usuario, contraseña, nombre, apellido) VALUES(?,?,?,?)");
            $stmt->bind_param("ssss", $usuario, $contraseña, $nombre,  $apellido);

            if($stmt->execute()){
                header("Location: inicioSesionIndex.php");
            }else{
                echo"Error al insertar el registro" . $stmt->error;
            }
            $stmt->close();
        }else{
            echo"todos los campos son obligatorios";
        }
    }
}
$connection->close();
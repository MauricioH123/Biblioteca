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

    if (isset($_POST["autor"]) && isset($_POST["titulo"]) && isset($_POST["categoria"]) && isset($_POST["año"])){
        if(!empty($_POST["autor"]) && !empty($_POST["titulo"]) && !empty($_POST["categoria"]) && !empty($_POST["año"])){
            $autor = sanitizeMysql($connection, $_POST["autor"]);
            $titulo = sanitizeMysql($connection, $_POST["titulo"]);
            $categoria = sanitizeMysql($connection, $_POST["categoria"]);
            $año = sanitizeMysql($connection, $_POST["año"]);
    
            $stmt = $connection->prepare("INSERT INTO libros (autor, titulo, categoria, año) VALUES(?,?,?,?)");
            $stmt->bind_param("ssss", $autor, $titulo, $categoria, $año);
    
            if($stmt->execute()){
                // echo "Nuevo registro insertado exitosamente.";
                $volver = "registroLibroIndex.php";
                header("Location: " . $volver);
            }else{
                echo "Error al insertar el registro: " . $stmt->error;
            }
            $stmt->close();
        }else{
            echo "TODOS LOS CAMPOS SON OBLIGARIOS";
        }
    }
}

$connection->close();
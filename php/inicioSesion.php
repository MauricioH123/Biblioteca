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
    if(isset($_POST["usuario"]) && isset($_POST["contraseña"])){
        if(!empty($_POST["usuario"]) && !empty($_POST["contraseña"])){
            $usuario = sanitizeMysql($connection, $_POST["usuario"]);
            $contraseña = sanitizeMysql($connection, $_POST["contraseña"]);

            $query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
            $result = $connection->query($query);

            if(!$result){
                $connection->close();
                die("Error al extraer los usuario: " . $connection->error);
            }elseif($result->num_rows){
                $row =$result->fetch_array(MYSQLI_NUM);
                $result->close();
                if(password_verify($contraseña, $row[2])){
                    $_SESSION["usuario"] = $row[1];
                    header("Location: registroLibroIndex.php");
                    exit();
                }else{
                    die("Tu usuario o contraseña son inválidos");
                }
            }else{
                die("Tu usuario o contraseña son inválidos");
            }
        }else{
            die("Escriba su usuario y contraseña");
        }
    }
}

$connection->close();
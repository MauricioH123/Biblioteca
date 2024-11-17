<?php
session_start();

function cerrarSesion() {
    // Verificar si el usuario está autenticado
    if(!isset($_SESSION["usuario"])) {
        header("Location: inicioSesionIndex.php");
        exit();
    }

    // Limpiar todas las variables de sesión
    $_SESSION = array();

    // Destruir la sesión
    session_destroy();
    
    // // Redirigir al usuario a la página de inicio de sesión
    header("Location: inicioSesionIndex.php");
    exit();
}

// Llamar a la función para cerrar sesión
cerrarSesion();
?>

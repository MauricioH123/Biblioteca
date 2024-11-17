<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTECA</title>
    <link rel="stylesheet" href="../css/estilosRegistroLibro.css">
</head>
<body>
    <?php
    session_start();
    if (empty($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
    $token = $_SESSION['token'];

    if(empty($_SESSION["usuario"])){
        header("Location: inicioSesionIndex.php");
    }
    ?>
    <center><h1>Formulario de Libro</h1></center>
    <nav class="menu">
        <a href="registroLibroIndex.php">Ingresar Libros</a>
        <a href="verLibrosIndex.php">Ver Libros Disponibles</a>
        <a href="cerrarSesion.php">Cerrar Sesion</a>
    </nav>

    <form action="registroLirbo.php" method="post" onsubmit="return validacionRegistroLibro(this)">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
        <label for="autor">Nombre del Autor:</label>
        <input type="text" id="autor" name="autor" required>

        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required>

        <label for="categoria">Categoría:</label>
        <input type="text" id="categoria" name="categoria" required>

        <label for="año">Año:</label>
        <input type="number" id="año" name="año" required>

        <input type="submit" value="Enviar">
    </form>

    <script src="../js/scriptRegistroLibro.js"></script>
</body>
</html>

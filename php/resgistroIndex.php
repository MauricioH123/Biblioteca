<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/estilosRegistro.css">
</head>
<body>
    <?php
    session_start();
    if (empty($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
    $token = $_SESSION['token'];

    if(!empty($_SESSION["usuario"])){
        header("Location: registroLibroIndex.php");
    }
    ?>

    <h1>Libreria Mauricio S.A.S</h1>

    <nav>
        <ul>
            <li><a href="inicioSesionIndex.php">Inicio de Sesion</a></li>
            <li><a href="resgistroIndex.php">Registrar Cuenta</a></li>
        </ul>
    </nav>


    <form action="resgistro.php" method="post" onsubmit="return validacionRegistro(this)">
        <h2>Formulario de registro</h2>
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">

        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="usuario" required="required" placeholder="Escriba su Usuario">

        <label for="contraseña">Contraseña</label>
        <input type="password" id="contraseña" name="contraseña" required="required" placeholder="Escriba su Contraseña">

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" required="required" placeholder="Escriba su nombre">

        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" required="required" placeholder="Escriba su apellido">
        
        <input type="submit" value="Enviar Registro">
    </form>
    <script src="../js/scriptRegistro.js"></script>
</body>
</html>
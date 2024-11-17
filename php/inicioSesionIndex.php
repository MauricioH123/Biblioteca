<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria</title>
    <link rel="stylesheet" href="../css/estilosInisioSesion.css">
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


    <form action="inicioSesion.php" method="post" onsubmit="return validacionInicio(this)">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">

        <h2>Inicio de Sesion</h2>
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="usuario" required="required" placeholder="Escriba su Usuario">
        <div class="error" id="errorUsuario"></div>

        <label for="contraseña">Contraseña</label>
        <input type="password" id="contraseña" name="contraseña" required="required" placeholder="Escriba su Contraseña">
        <div class="error" id="errorContraseña"></div>
        
        <input type="submit">
    </form>

    <script src="../js/scriptInicioSesion.js"></script>
</body>
</html>
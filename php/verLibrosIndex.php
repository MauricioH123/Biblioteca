<?php require_once "verLibros.php"; require_once "eliminarLibros.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOSTRAR LIBROS</title>
    <link rel="stylesheet" href="../css/estilosVerLibros.css">
</head>
<body>
    <?php
    session_start();
    if(empty($_SESSION["usuario"])){
        header("Location: inicioSesionIndex.php");
    }
    ?>
    <center><h1>Listado de Libros</h1></center>
    <center>
        <nav class="menu">
            <a href="registroLibroIndex.php">Ingresar Libros</a>
            <a href="verLibrosIndex.php">Ver Libros Disponibles</a>
            <a href="cerrarSesion.php">Cerrar Sesion</a>
        </nav>
    </center>


    <table>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Categoria</th>
            <th>Año</th>
            <th>Borrar</th>
        </tr>
        <?php foreach ($libros as $libro): ?>
        <tr>
            <td><?php echo htmlspecialchars($libro['id']); ?></td>
            <td><?php echo htmlspecialchars($libro['titulo']); ?></td>
            <td><?php echo htmlspecialchars($libro['autor']); ?></td>
            <td><?php echo htmlspecialchars($libro['categoria']); ?></td>
            <td><?php echo htmlspecialchars($libro['año']); ?></td>
            <td>
                <form action="eliminarLibros.php" method="post">
                    <input type="hidden" name="delete" value="yes">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($libro['id']);?>">
                    <input type="submit" value="ELIMINAR">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    
</body>
</html>
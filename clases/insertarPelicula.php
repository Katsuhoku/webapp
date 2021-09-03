<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Película</title>
</head>
<body>
    <h2>Insertar Nueva Película</h2><hr>

    <form action="insertarPelicula2.php" method="POST" enctype="multipart/form-data">
        Título de la Película: 
        <input type="text" name="pelicula" required>
        <br><br>
        Director: 
        <input type="text" name="director" required>
        <br><br>
        Actor principal: 
        <input type="text" name="pelicula" required>
        <br><br>
        Ranking (0..100): 
        <input type="text" name="ranking" required>
        <br><br>
        Imagen: 
        <input type="file" name="imagen" required>
        <br><br>

        <input type="submit" name="enviar" value="Registrar Película">
    </form>

    <?php

    ?>
</body>
</html>
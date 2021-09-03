<html>
    <head><title>Insertar pelicula</title></head>
    <h2>Insertar nueva pelicula</h2>
    <hr>
    <form action="insertarPelicula2.php" method="POST" enctype="multipart/form-data">
        Titulo de la pelicula:
        <input type="text" name="pelicula" required>
        <br><br>

        Director:
        <input type="text" name="director" required>
        <br><br>

        Actor principal:
        <input type="text" name="actor" required>
        <br><br>

        Ranking de la pelicula (0..100):
        <input type="text" name="ranking" required>
        <br><br>

        Imagen de la pelicula:
        <input type="file" name="foto">
        <br><br>
        
        <button type="reset">Limpiar</button>
        <input type="submit" name="enviar" value="Registrar pelicula">
        
        <?php
        
        ?>
    </form>
</html>
<!DOCTYPE html>
<html>
    <head>
        <title>Adopciones</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <h1>Adocciones</h1><hr>
        <form action="verAdopciones.php" method="POST">
            <?php
                echo "<span>Nombre del usuario:<span>";
                
                $link = mysqli_connect("localhost", "root", "");
                mysqli_select_db($link, "adopcion");
                $result = mysqli_query($link, 
                    "SELECT id_usuario, nombre_usuario FROM usuarios ");
                
                echo "<select name='usuario' required>";
                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['id_usuario'];
                    $name = $row['nombre_usuario'];
                    echo "<option value=$id> $name </option>";
                }
                echo "</select><br><br>";

                mysqli_free_result($result);
            ?>
            <br><br>
            <input type="submit" name="submit" value="Enviar">
        </form>
    </body>
</html>
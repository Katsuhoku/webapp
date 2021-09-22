<!DOCTYPE html>
<html>
    <head>
        <title>Adopción</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <h1>Adota una vida</h1><hr>
        <form action="confirmacionAdopcion.php" method="POST">
        <?php
            echo "<span>Nombre del usuario:<span>";
            
            $link = mysqli_connect("localhost", "root", "");
            mysqli_select_db($link, "adopcion");
            $result = mysqli_query($link, "
                SELECT id_usuario, nombre_usuario FROM usuarios 
            ");
            
            echo "<select name='usuario' required>";
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['id_usuario'];
                $name = $row['nombre_usuario'];
                echo "<option value=$id> $name </option>";
            }
            echo "</select><br><br>";

            mysqli_free_result($result);

        ?>

        <br>
        <span>Mascota: </span>
        <?php
            $result = mysqli_query($link, "select id_mascota, tipo_mascota, 
            nombre_mascota, edad_mascota, raza_mascota, foto_mascota
                from mascotas where id_usuario is NULL;
            ");

            echo "<select id='mascota-select' name='mascota' required>";
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['id_mascota'];
                $tipo = $row['tipo_mascota'];
                $nombre = $row['nombre_mascota'];
                $foto = $row['foto_mascota'];
                echo "<option value=$id>(#$id) $tipo $nombre</option>";
            }
            echo "</select><br><br>";
        ?>
        <br><br>
        <input type="submit" name="submit" value="Enviar">
    </form>

    <table border="1.0">
        <tr>
            <th><b>Id</b></th>
            <th><b>Tipo</b></th>
            <th><b>Nombre</b></th>
            <th><b>Edad</b></th>
            <th><b>Raza</b></th>
            <th><b>Foto</b></th>
        </tr>
        <?php
            mysqli_data_seek($result, 0);
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['id_mascota'];
                $tipo = $row['tipo_mascota'];
                $nombre = $row['nombre_mascota'];
                $edad = $row['edad_mascota'];
                $raza = $row['raza_mascota'];
                $foto = $row['foto_mascota'];

                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$tipo</td>";
                echo "<td>$nombre</td>";
                echo "<td>$edad</td>";
                echo "<td>$raza</td>";
                echo "<td><img src='./fotos/$foto' width='160' heigth='90'></td>";
                echo "</tr>";
            }

            mysqli_free_result($result);
            mysqli_close($link);
        ?>
    </table>


    <br><br>
    <a href='adopciones.php'>Ver adopciones</a>
    </body>
</html>
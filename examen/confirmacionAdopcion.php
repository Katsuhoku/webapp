<!DOCTYPE html>
<html>
    <head>
        <title>Adopción</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <h1>Confirmación adopción</h1><hr>
        <b>Usuario: </b>
        <?php
            $id_usuario = $_REQUEST['usuario'];

            $link = mysqli_connect("localhost", "root", "");
            mysqli_query($link, "set character_set_results=utf8");
            mysqli_select_db($link, "adopcion");
            $result = mysqli_query($link, "
                select nombre_usuario from usuarios
                where id_usuario = $id_usuario;
            ");

            $usuario = $result->fetch_row()[0];

            echo "$usuario";
        ?>
        <br><br>
        <b>Mascota: </b><br><br>
        <?php
            $id_mascota = $_REQUEST['mascota'];

            $result = mysqli_query($link, "select id_mascota, tipo_mascota, 
                nombre_mascota, edad_mascota, raza_mascota, foto_mascota
                from mascotas where id_mascota = $id_mascota;
            ");

            $row = $result->fetch_assoc();
        ?>
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
            ?>
        </table><br><br>

        <?php
            $validador = mysqli_query($link, "
                select mascotas_usuario from usuarios
                where id_usuario = $id_usuario;
            ")->fetch_assoc();
            
            $contador = $validador["mascotas_usuario"];
            if ( $contador < 2 ) {

                $query2 = "
                    update usuarios set mascotas_usuario = mascotas_usuario + 1
                    where id_usuario = $id_usuario;
                ";
                $query = "
                    update mascotas set id_usuario = $id_usuario
                    where id_mascota = $id_mascota;
                ";
                if ($link->query($query) && $link->query($query2)) {
                    echo "<p><b>¡Adopción Exitosa!</b></p>";
                    echo "<a href='index.php'>Regresar</a>";
                } else {
                    echo "<p><b>Ocurrió un error. Intente nuevamente más tarde.</b></p><br>";
                    echo "<a href='index.php'>Regresar</a>";
                }
            } else {
                echo "<p><b>Ya adoptaste 2 mascotas. Lo sentimos.</b></p><br>";
                echo "<a href='index.php'>Regresar</a>";
            }

            mysqli_free_result($result);
            mysqli_close($link);
        ?>
    </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alumnos</title>
</head>
<body>
    <h1>Lista de Alumnos</h1>
    <a href="index.php">Inicio</a> &nbsp
    <a href="agregarFoto.php">Agregar o Actualizar foto a Alumno</a> &nbsp
    <hr>

    <table border="1.0">
        <tr>
            <th><b>Foto</b></th>
            <th><b>Matrícula</b></th>
            <th><b>Nombre Completo</b></th>
            <th><b>Semestre</b></th>
        </tr>

        <?php
            $link = mysqli_connect("localhost", "root", "");
            mysqli_query($link, "set character_set_results=utf8");
            mysqli_select_db($link, "autoservicios");
            $result = mysqli_query($link, "
                select matricula, ap_paterno, ap_materno, nombres, semestre, if (foto is null, '-', foto) as foto
                from alumnos;
            ");

            while ($row = mysqli_fetch_array($result)) {
                $foto = $row['foto'];
                $matricula = $row['matricula'];
                $nombre = $row['ap_paterno'] . " " . $row['ap_materno'] . " " . $row['nombres'];
                $semestre = $row['semestre'];

                if ($foto != '-') $foto = "<img src='./fotos/$foto' width='90' heigth='90'>";
                echo "<tr>";
                echo "<td>$foto</td>";
                echo "<td>$matricula</td>";
                echo "<td>$nombre</td>";
                echo "<td>$semestre</td>";
                echo "</tr>";
            }

            mysqli_free_result($result);
            mysqli_close($link);
        ?>
    </table>
</body>
</html>
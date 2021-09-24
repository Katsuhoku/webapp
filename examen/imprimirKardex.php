<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Kardex</title>
</head>
<body>
    <h1>Impresión de Kardex</h1>
    <a href="index.php">Inicio</a> &nbsp
    <a href="consultaKardex.php">Volver</a>
    <hr>

    <?php
        $matricula = $_REQUEST['alumno'];

        $link = mysqli_connect("localhost", "root", "");
        mysqli_query($link, "set character_set_results=utf8");
        mysqli_select_db($link, "autoservicios");
        $result = mysqli_query($link, "
            select ap_paterno, ap_materno, nombres, promedio, aprobadas, if (no_aprobadas is null, 0, no_aprobadas) as no_aprobadas
            from alumnos_con_promedio
            where matricula = $matricula;
        ");

        $alumno = $result->fetch_assoc();
        echo "<h3>{$alumno['ap_paterno']} {$alumno['ap_materno']} {$alumno['nombres']}</h3>";
        echo "<b>Promedio</b>: {$alumno['promedio']} &nbsp";
        $cursadas = $alumno['aprobadas'] + $alumno['no_aprobadas'];
        echo "<b>Materias Cursadas</b>: $cursadas &nbsp";
        echo "<b>Materias Aprobadas</b>: {$alumno['aprobadas']} &nbsp";
        echo "<b>Materias No Aprobadas</b>: {$alumno['no_aprobadas']} &nbsp";
    ?>

    <br><br>
    <table border="1.0">
        <tr>
            <th><b>Clave</b></th>
            <th><b>Materia</b></th>
            <th><b>Calificación</b></th>
        </tr>
        <?php
            $result = mysqli_query($link, "
                select c.id_materia, m.nombre_materia, c.calificacion
                from cursadas as c
                natural join materias as m
                where c.matricula = $matricula;
            ");
            while ($row = mysqli_fetch_array($result)) {
                $id_materia = $row['id_materia'];
                $nombre = $row['nombre_materia'];
                $calificacion = $row['calificacion'];

                echo "<tr>";
                echo "<td>$id_materia</td>";
                echo "<td>$nombre</td>";
                echo "<td>$calificacion</td>";
                echo "</tr>";
            }

            mysqli_free_result($result);
            mysqli_close($link);
        ?>
    </table>
</body>
</html>
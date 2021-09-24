<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Kardex</title>
</head>
<body>
    <h1>Consulta de Kardex</h1>
    <a href="index.php">Inicio</a> &nbsp
    <hr>

    <form action="imprimirKardex.php" method="POST">
        <span>Alumno: </span>
        <?php
            $link = mysqli_connect("localhost", "root", "");
            mysqli_query($link, "set character_set_results=utf8");
            mysqli_select_db($link, "autoservicios");
            $result = mysqli_query($link, "
                select matricula, ap_paterno, ap_materno, nombres
                from alumnos;
            ");

            echo "<select name='alumno'>";
            while ($row = mysqli_fetch_array($result)) {
                $matricula = $row['matricula'];
                $nombre = $row['ap_paterno'] . " " . $row['ap_materno'] . " " . $row['nombres'];
                echo "<option value=$matricula>$nombre</option>";
            }
            echo "</select><br><br>";

            mysqli_free_result($result);
            mysqli_close($link);
        ?>
        <input type="submit" name="submit" value="Generar Kardex">
    </form>
</body>
</html>
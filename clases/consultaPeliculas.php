<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body>
    <h1>Películas de la videoteca</h1>
    <td align="center"></td>
    <?php 
        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "videoteca");
        $result = mysqli_query($link, "select * from peliculas");

        echo "<table border='1'>";
        echo "<tr>";
        echo "<td align='center'><b>ID</b></td>";
        echo "<td align='center'><b>Titulo</b></td>";
        echo "<td align='center'><b>Director</b></td>";
        echo "<td align='center'><b>Actor</b></td>";
        echo "<td align='center'><b>Imagen</b></td>";
        echo "<td align='center'><b>Ranking</b></td>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id_pelicula'];
            $ti = $row['titulo'];
            $di = $row['director'];
            $ac = $row['actor'];
            $im = $row['imagen'];
            $ra = $row['ranking'];
            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>$ti</td>";
            echo "<td>$di</td>";
            echo "<td>$ac</td>";
            //echo "<td>$im</td>";
            echo "<td><img src='../videotecaImagenes/$im' width='80' height='80'/></td>";
            echo "<td align='center'>$ra</td>";
            echo "</tr>";
            //echo "$id $ti, $di, $ac <br>";
        }

        mysqli_free_result($result);
        mysqli_close($link);

        echo "<a href='ranking.php'>Ver ranking</a><br><br>";
        echo "<a href='insertarPelicula.php'>Insertar nueva pelicula</a><br><br>";
        echo "<a href='generarPDF.php'><img src='pdf.png' width = '20' height= '25'> Generar PDF</a><br><br>";
    ?>

    
</body>
</html>
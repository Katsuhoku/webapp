<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body>
    <h2>Películas de la Videoteca</h2><br>
    <?php
        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "videoteca");
        $result = mysqli_query($link, "
            SELECT * FROM PELICULA
        ");

        echo "<table border='1'>";
        echo "<tr>";
        echo "<td>ID</td>";
        echo "<td>Título</td>";
        echo "<td>Director</td>";
        echo "<td>Actor</td>";
        echo "<td>Imagen</td>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id_pelicula'];
            $titulo = $row['titulo'];
            $director = $row['director'];
            $actor = $row['actor'];
            $imagen = $row['imagen'];

            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>$titulo</td>";
            echo "<td>$director</td>";
            echo "<td>$actor</td>";
            echo "<td><img src='../misimagenes/$imagen' width='80px' height='80px'></td>";
            echo "</tr>";
        }

        mysqli_free_result($result);
        mysqli_close($link);
    ?>
</body>
</html>
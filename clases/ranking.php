<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Gráfica</title>
</head>
<body>
    <h3>Gráfica de ranking de peliculas</h3><hr>
    <?php
        include "libchart/classes/libchart.php";

        $chart = new HorizontalBarChart(600, 270);
        $dataset = new XYDataSet();

        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "videoteca");
        $result = mysqli_query($link, "select * from peliculas");

        while ($row = mysqli_fetch_array($result)) {
            $ti = $row['titulo'];
            $ra = $row['ranking'];
            $dataset->addPoint(new Point($ti, $ra));
        }
    
        mysqli_free_result($result);
        mysqli_close($link);
        $chart->setDataset($dataset);
        $chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 240));
        $chart->setTitle("Ranking peliculas");
        $chart->render("generated/ranking_peliculas.png");
    ?>

    <br>
    <img src="generated/ranking_peliculas.png" alt="Grafica Ranking">
</body>
</html>
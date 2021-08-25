<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Gráfica</title>
</head>
<body>
    <h3>Ranking de Películas</h3><hr>
    <?php
        error_reporting(0);
        include "libchart/classes/libchart.php";

        $chart = new VerticalBarChart(600, 270);
        $dataset = new XYDataSet();

        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "videoteca");
        $result = mysqli_query($link, "
            SELECT titulo, ranking FROM PELICULA
        ");

        while ($row = mysqli_fetch_array($result)) {
            $titulo = $row['titulo'];
            $ranking = $row['ranking'];
            $dataset->addPoint(new Point($titulo, $ranking));
        }
        fclose($fp);

        $chart->setDataset($dataset);
        $chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 240));
        $chart->setTitle("Ranking de Películas");
        $chart->render("generated/demo1.png");
    ?>

    <br>
    <img src="generated/demo1.png" alt="Ranking de Películas">
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Gráfica</title>
</head>
<body>
    <h3>Gráfica de promedios de alumnos</h3><hr>
    <?php
        include "libchart/classes/libchart.php";

        $chart = new HorizontalBarChart(600, 270);
        $dataset = new XYDataSet();

        $fp = fopen("alumnos.txt", "r");
        while (!feof($fp)) {
            fscanf($fp, "%s %f %d", $nombre, $promedio, $edad);
            $dataset->addPoint(new Point($nombre, $promedio));
        }
        fclose($fp);

        $chart->setDataset($dataset);
        $chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 240));
        $chart->setTitle("Promedios de los Alumnos");
        $chart->render("generated/demo1.png");
    ?>

    <br>
    <img src="generated/demo1.png" alt="Grafica Alumnos">
</body>
</html>
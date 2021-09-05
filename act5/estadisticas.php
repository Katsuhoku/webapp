<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadísticas Vendedores</title>
</head>
<body>
    <h1>Estadísticas de Vendedores</h1>
    <a href="index.php">Inicio</a>
    <hr>

    <?php
        include "../libchart/classes/libchart.php";

        error_reporting(E_ALL ^ E_DEPRECATED);

        $chart = new VerticalBarChart(600, 400);

        $ventas = array();
        $dataset = new XYDataSet();

        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "concesionaria");
        $result = mysqli_query($link, "SELECT * FROM vendedores");
        
        while ($row = mysqli_fetch_array($result)) {
            $vendedor = $row['nombre_vendedor'];
            $ventas[$vendedor] = $row['autos_vendidos'];
        }

        mysqli_free_result($result);
        mysqli_close($link);

        foreach ($ventas as $key => $value)
            $dataset->addPoint(new Point($key, $value));

        $chart->setDataset($dataset);
        //$chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 240));
        $chart->setTitle("Gráfica de Ventas de Vendedores");
        $chart->render("generated/ventas.png");
    ?>

    <br>
    <img src="generated/ventas.png" alt="Gráfica de Ventas de Vendedores">
</body>
</html>
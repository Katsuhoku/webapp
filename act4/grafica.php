<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfica de votos actuales</title>
</head>
<body>
    <h1>Gráfica de votos actuales</h1><hr>
    <?php
        include "libchart/classes/libchart.php";

        $chart = new VerticalBarChart(600, 400);

        $votos = array(
            'MORENA' => 0,
            'PRI' => 0,
            'PRD' => 0,
            'PAN' => 0,
            'NULO' => 0);
        $dataset = new XYDataSet();

        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "VOTACIONES");
        $result = mysqli_query($link, "SELECT PARTIDO FROM VOTOS");
        
        while ($row = mysqli_fetch_array($result)) {
            $partido = $row['PARTIDO'];
            //echo "<h6> $partido </h6>";
            if (key_exists($partido, $votos)) 
                $votos[$partido]++;
            else 
                $votos[$partido] = 1;
        }

        mysqli_free_result($result);
        mysqli_close($link);

        foreach ($votos as $key => $value)
            $dataset->addPoint(new Point($key, $value));

        $chart->setDataset($dataset);
        //$chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 240));
        $chart->setTitle("Gráfica de votos");
        $chart->render("generated/votos.png");
    ?>

    <br>
    <img src="generated/votos.png" alt="Gráfica de votos">
    
</body>
</html>
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
        $pie_chart = new PieChart(600, 400);

        $votos = array(
            'MORENA' => 0,
            'PRI' => 0,
            'PRD' => 0,
            'PAN' => 0,
            'NULO' => 0);
        $dataset = new XYDataSet();

        $fp = fopen("votos.txt", "r");
        while (!feof($fp)) {
            fscanf($fp, "%s %s", $_, $voto);
            if (key_exists($voto, $votos)) 
                $votos[$voto]++;
            else 
                $votos[$voto] = 1;
        }
        
        fclose($fp);

        foreach ($votos as $key => $value)
            $dataset->addPoint(new Point($key, $value));

        $chart->setDataset($dataset);
        //$chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 240));
        $chart->setTitle("Gráfica de votos");
        $chart->render("generated/votos.png");

        $pie_chart->setDataSet($dataset);
        $pie_chart->setTitle("Gráfica de pastel de votos");
        $pie_chart->render("generated/votos_pastel.png");

    ?>

    <br>
    <div style="display: inline;">
        <img src="generated/votos.png" alt="Gráfica de votos">
        <img src="generated/votos_pastel.png" alt="Gráfica de votos">
    </div>
    
</body>
</html>
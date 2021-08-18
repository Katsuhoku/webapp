<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captura de Votos</title>
</head>
<body>
    <h1>Captura de votos</h1><br>
    <?php
        $f = fopen("votos.txt", "a");
        $name = explode(" ", $_REQUEST['name'])[0];
        $vote = $_REQUEST['vote'];
        fwrite($f, "\n$name $vote");
        fclose($f);

        echo "<p>Su voto ha sido registrado!</p>"
    ?>
</body>
<a href="act3_grafica.php">Ver gráfica de votos actuales</a>
</html>
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
        $fp = fopen("Votos.txt", "a+");
        $nombre = $_REQUEST['nombre'];
        $voto = $_REQUEST['partido'];
        fprintf($fp,"%s %s\n",$nombre, $voto);
        fclose($fp);
        echo "<h2>Voto añadido</h2>"


    ?>
</body>
</html>
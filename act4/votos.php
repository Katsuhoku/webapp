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
        $id_votante = $_REQUEST['votante'];
        $partido = $_REQUEST['voto'];
        $fecha = date('Y-m-d');

        /*echo "<h6>$id_votante</h6>";
        echo "<h6>$partido</h6>";
        echo "<h6>$fecha</h6>";*/

        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "VOTACIONES");
        $SQLQuery = "INSERT INTO VOTOS(`ID_VOTANTE`, `PARTIDO`, `FECHA`) VALUES ('$id_votante', '$partido', '$fecha')";
        
        if ($link->query($SQLQuery)) {
            echo "<p>Su voto ha sido registrado!</p>";
        } else {
            echo "<p>Ocurrio un error al registrar su voto, intentelo nuevamente!</p>";
        }  
        
        mysqli_close($link);
    ?>
</body>
<a href="grafica.php">Ver gráfica de votos actuales</a>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captura de Votos</title>
</head>
<body>
    <h1>Captura de Votos</h1><hr>
    <form action="votos.php" method="POST">
        <?php
            echo "<span>Nombre del votante:<span>";
            
            $link = mysqli_connect("localhost", "root", "");
            mysqli_select_db($link, "VOTACIONES");
            $result = mysqli_query($link, "
                SELECT ID_VOTANTE, NOMBRE FROM VOTANTES
            ");
            
            
            echo "<select name='votante'>";
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['ID_VOTANTE'];
                $name = $row['NOMBRE'];
                echo "<option value=$id> $name </option>";
            }
            echo "</select><br><br>";

            mysqli_free_result($result);
            mysqli_close($link);

        ?>

        <table border="1.0">
            <tr>
                <td><img src='./images/morena.png' width='80px' height='80px'></td>
                <td><img src='./images/pan.png' width='80px' height='80px'></td>
                <td><img src='./images/pri.jpg' width='80px' height='80px'></td>
                <td><img src='./images/prd.jpg' width='80px' height='80px'></td>
            </tr>
            <tr>
                <td><input type="radio" name="voto" value="MORENA" checked>MORENA</td>
                <td><input type="radio" name="voto" value="PAN">PAN</td>
                <td><input type="radio" name="voto" value="PRI">PRI</td>
                <td><input type="radio" name="voto" value="PRD">PRD</td>
                <td><input type="radio" name="voto" value="NULO">ANULAR VOTO</td>
            </tr>
        </table>
        <br><br>
        <input type="submit" name="submit" value="Enviar">
    </form>
</body>
</html>
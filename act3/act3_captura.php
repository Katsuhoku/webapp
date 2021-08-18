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
    <form action="act3_votos.php" method="POST">
        <p>Nombre:</p>
        <input type="text" name="name"><br><br>
        <input type="radio" name="vote" value="MORENA" checked>MORENA
        <input type="radio" name="vote" value="PAN">PAN
        <input type="radio" name="vote" value="PRI">PRI
        <input type="radio" name="vote" value="PRD">PRD
        <input type="radio" name="vote" value="NULO">ANULAR VOTO

        <br><br>
        <input type="submit" name="submit" value="Enviar">
    </form>
</body>
</html>
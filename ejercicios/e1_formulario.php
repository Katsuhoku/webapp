<html>
    <head>
        <title>Partidos políticos</title>
    </head>
    <body>
        <h1>Boleta de voto</h1>
        <hr>
        <form action="e1_votos.php" method="POST">
            Introduce tu nombre: <br>
            <input type="text" name="nombre" required>
            <br><br>
            Selecciona el partido político de tu preferencia: <br>
            <input type="radio" name="partido" value="PRI">PRI
            <input type="radio" name="partido" value="PAN">PAN
            <input type="radio" name="partido" value="PRD">PRD
            <input type="radio" name="partido" value="MORENA" checked>MORENA
            <input type="radio" name="partido" value="VA">Anular Voto
            <br><br>
            <input type="submit" name="Enviar" value="Enviar">
        </form>
    </body>
</html>

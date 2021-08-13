<html>
    <head>
        <title>Archivos</title>
    </head>
    <body>
        <h1>Archivos en PHP</h1>
        <hr>
    </body>
    <?php
        $fp = fopen("Alumnos.txt", "r");
        $fp1 = fopen("Salida.txt", "w");
        $n = 0;
        $promedio_general = 0;
        $promedio_edades = 0;
        while (!feof($fp)) {
            //$linea = fgets($fp);
            fscanf($fp, "%s %f %d", $nombre, $promedio, $edad);
            echo "$nombre $promedio $edad <br>";
            fprintf($fp1, "$nombre $promedio $edad \n");
            $promedio_general += $promedio;
            $promedio_edades += $edad;
            $n++;
        }
        fclose($fp);
        $promedio_general /= $n;
        $promedio_edades /= $n;
        echo "Número de alumnos = $n <br>";
        echo "Promedio de edades = $promedio_edades <br>";
        echo "Promedio general = $promedio_general <br>";
        fprintf($fp1, "Número de alumnos = $n \n");
        fprintf($fp1, "Promedio de edades = $promedio_edades \n");
        fprintf($fp1, "Promedio general = $promedio_general \n");
        fclose($fp1);
    ?>
</html>
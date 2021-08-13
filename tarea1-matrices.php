<html>
    <head>
        <title>Actividad 1</title>
    </head>
    <body>
        <h1>Operaciones con Matrices</h1>
        <hr>
    </body>
    <?php 
        function crearMatriz(int $r, int $c) {
            for ($i = 0 ; $i < $r ; $i++)
                for ($j = 0 ; $j < $c ; $j++)
                    $m[$i][$j] = rand(0, 10);
            return $m;
        }

        function printMatriz($m) {
            if ($m != null)
                for ($i = 0 ; $i < sizeof($m) ; $i++){
                    for ($j = 0 ; $j < sizeof($m[$i]) ; $j++)
                        printf("%d \t", $m[$i][$j]);
                    echo "<br>";
                }
        }

        function comprobar($a, $b) {
            if (sizeof($a) == sizeof($b)){
                for ($i = 0 ; $i < sizeof($a) ; $i++) {
                    if (sizeof($a[$i]) != sizeof($b[$i])) {
                        return false;
                    }
                }
            } else return false;
            return true;
        }

        function suma($a, $b) {
            if (comprobar($a, $b)) {
                for ($i = 0 ; $i < sizeof($a) ; $i++)
                    for ($j = 0 ; $j < sizeof($a[$i]) ; $j++)
                        $c[$i][$j] = $a[$i][$j] + $b[$i][$j];
                return $c;
            }else printError($a, $b, "No se puede realizar la suma: Las dimensiones de las matrices no son iguales");
            return null;
        }

        function diferencia($a, $b) {
            if (comprobar($a, $b)) {
                for ($i = 0 ; $i < sizeof($a) ; $i++)
                    for ($j = 0 ; $j < sizeof($a[$i]) ; $j++)
                        $c[$i][$j] = $a[$i][$j] - $b[$i][$j];
                return $c;
            }else printError($a, $b, "No se puede realizar la resta: Las dimensiones de las matrices no son iguales");
            return null;
        }

        function comprobarMulti($a, $b) {
            if (sizeof($a) > 0 && sizeof($b) > 0)
                if (sizeof($a[0]) == sizeof($b)) 
                    return true;
            return false;
        }

        function multiplicacion($a, $b) {
            if (comprobarMulti($a, $b)) {
                for ($i = 0 ; $i < sizeof($a) ; $i++) {
                    for ($j = 0 ; $j < sizeof($b[0]) ; $j++) {
                        $suma = 0;
                        for ($k = 0 ; $k < sizeof($a[0]) ; $k++) {
                            $suma += $a[$i][$k] * $b[$k][$j];
                        }
                        $m[$i][$j] = $suma;
                    }
                }
                return $m;
            }else printError($a, $b, "No se puede realizar la multiplicación: Las columnas de la matriz A no son iguales las filas de la matriz B");
            return null;
        }

        function printError($a, $b, $message) {
            echo "$message
             <br>Matriz A: ".sizeof($a)." X ".sizeof($a[0]).
            "<br>Matriz B: ".sizeof($b)." X ".sizeof($b[0])."<br>";
        }

        $a;
        $ra = 3; //Cambiar tamaño
        $ca = 3; //Cambiar tamaño

        $b;
        $rb = 3; //Cambiar tamaño
        $cb = 3; //Cambiar tamaño

        $a = crearMatriz($ra, $ca);
        $b = crearMatriz($rb, $cb);

        echo "Matriz A <br>";
        printMatriz($a);
        
        echo "<br>";

        echo "Matriz B <br>";
        printMatriz($b);

        echo "<br>";

        echo "A + B <br>";
        printMatriz(suma($a, $b));

        echo "<br>";

        echo "A - B <br>";
        printMatriz(diferencia($a, $b));

        echo "<br>";

        echo "A * B <br>";
        printMatriz(multiplicacion($a, $b));

        echo "<br>";
    ?>
</html>

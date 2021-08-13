<html>
    <head>
        <title>Conjuntos</title>
    </head>
    <body>
        <h1>Operaciones con conjuntos</h1>
        <hr>
    </body>
    <?php
        require_once 'Conjunto.php';
        $min = 1;
        $max = 20;

        $tam_a = $_REQUEST['tam_a'];
        echo "El tamaño del conjunto A es: $tam_a <br>";
        $tam_b = $_REQUEST['tam_b'];
        echo "El tamaño del conjunto B es: $tam_b <br>";

        echo"<br>";
        
        $a = new Conjunto("A", generarConjunto($tam_a));
        $a->print();
        $b = new Conjunto("B", generarConjunto($tam_b));
        $b->print();
        
        echo"<br>";
        echo '<div style="font-size:1.25em; font-weight:bold">Unión: </div>';
        $a->union($b)->print();

        echo"<br>";
        echo '<div style="font-size:1.25em; font-weight:bold">Intersección: </div>';
        $a->interseccion($b)->print();

        echo"<br>";
        echo '<div style="font-size:1.25em; font-weight:bold">Diferencia: </div>';
        $a->diferencia($b)->print();


        function generarConjunto(int $tamaño) : array {
            global $min, $max;
            $valores = array();
            if ($tamaño > $max) $tamaño = $max;
            while (sizeof($valores) != $tamaño)
                $valores[rand($min, $max)] = true;
            return $valores;
        }
    ?>
</html>

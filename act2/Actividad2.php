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
        $tam_a = $_REQUEST['tam_a'];
        echo "El tamaño del conjunto A es: $tam_a <br>";
        $tam_b = $_REQUEST['tam_b'];
        echo "El tamaño del conjunto B es: $tam_b <br>";

        echo"<br>";
        
        $A = new Conjunto("A", null, $tam_a);
        $A->print();
        $B = new Conjunto("B", null, $tam_b);
        $B->print();
        
        echo"<br>";
        echo '<div style="font-size:1.25em; font-weight:bold">Unión: </div>';
        //$C = union($A, $B); //Llamando al metodo "union" de Actividad 2
        //$C->print(); //Llamndo el método "print" del objeto Conjunto de la varible $C
        $A->union($B)->print(); //Llamando al metodo "unión" del objeto $A y llamando el método "print" del objeto retornado


        echo"<br>";
        echo '<div style="font-size:1.25em; font-weight:bold">Intersección: </div>';
        //$C = interseccion($A, $B); //Llamando al metodo "interseccion" de Actividad 2
        //$C->print(); //Llamndo el método "print" del objeto Conjunto de la varible $C
        $A->interseccion($B)->print(); //Llamando al metodo "interseccion" del objeto $A y llamando el método "print" del objeto retornado

        echo"<br>";
        echo '<div style="font-size:1.25em; font-weight:bold">Diferencia: </div>';
        //$C = diferencia($A, $B); //Llamando al metodo "interseccion" de Actividad 2
        //$C->print(); //Llamndo el método "print" del objeto Conjunto de la varible $C
        $A->diferencia($B)->print(); //Llamando al metodo "diferencia" del objeto $A y llamando el método "print" del objeto retornado

        function union(Conjunto $A, Conjunto $B) : Conjunto {
            $valores = array();
            foreach ($A->getValores() as $v) $valores[$v] = $v;
            foreach ($B->getValores() as $v) $valores[$v] = $v;
            return new Conjunto("C", $valores);
        }

        function interseccion(Conjunto $A, Conjunto $B) : Conjunto{
            $valores = array();

            foreach ($A->getValores() as $va) {
                foreach ($B->getValores() as $vb)
                    if ($va == $vb)
                        $valores[$va] = $va;
            }
            return new Conjunto("C", $valores);
        }

        function diferencia(Conjunto $A, Conjunto $B) : Conjunto {
            $valores = array();
        
            foreach ($A->getValores() as $va){
                $band = true;
                foreach($B->getValores() as $vb)
                    if ($va == $vb) $band = false;
                if ($band) $valores[$va] = $va;
            }       
            return new Conjunto("C", $valores);
        }
    ?>
</html>

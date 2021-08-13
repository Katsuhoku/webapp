<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 1 PHP</title>
</head>
<body>
    <h1>Bienvenidos</h1>
    <?php 
        function suma ($ini, $fin) {
            $res=0;
            for($i=$ini; $i<=$fin; $i++) {
                $res=$res+$i;
            }
            return $res;
        }

        //Programa principal
        $a=12;
        $b=5;
        $c=$a+$b;
        echo "La suma de $a + $b = $c <br>";
        print "La suma de $a + $b = $c <br>";
        printf ("La suma de %d + %d = %d <br>", $a, $b, $c);

        for($i=1; $i<=10; $i++) {
            echo " <p style='font-size: {$i}em'> Hola $i </p>";
        }
        echo "Fin<br>"; 
        $r=suma($b, $a);
        echo "La sumatoria de $b a $a = $r <br>";
    ?>
</body>
</html>
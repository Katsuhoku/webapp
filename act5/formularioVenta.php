<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Venta</title>
    <style>
        *{
            font-family: 'Poppins';
        }
        
        h1 {
            text-align: center;
        }

        a {
            display: block;
            text-align: center;     
        }

        td {
            padding: 0 20px;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #00ACB4;
            color: white;
        }

        tr:nth-child(odd) {background-color: #DAE6E6;}
    </style>
</head>
<body>
    <h1>Formulario de Venta de Automóviles</h1>
    <a href="index.php">Inicio</a>
    <hr>

    <form action="confirmacionVenta.php" method="POST">
        <span>Vendedor: </span>
        <?php
            $link = mysqli_connect("localhost", "root", "");
            mysqli_query($link, "set character_set_results=utf8");
            mysqli_select_db($link, "concesionaria");
            $result = mysqli_query($link, "
                select id_vendedor, nombre_vendedor from vendedores_raw;
            ");

            echo "<select name='vendedor'>";
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['id_vendedor'];
                $nombre = $row['nombre_vendedor'];
                echo "<option value=$id>$nombre</option>";
            }
            echo "</select><br><br>";
        ?>
        <span>Automóvil: </span>
        <?php
            $result = mysqli_query($link, "
                select id_automovil, marca, modelo, precio_neto, foto
                from stock;
            ");

            echo "<select id='car-select' name='automovil' required>";
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['id_automovil'];
                $marca = $row['marca'];
                $modelo = $row['modelo'];
                $precio = $row['precio_neto'];
                $foto = $row['foto'];
                echo "<option value=$id>(#$id) $marca $modelo</option>";
            }
            echo "</select><br><br>";
        ?>
        <input type="submit" name="submit" value="Vender y Generar Factura">
    </form><br><br>
    <table border="1.0">
        <tr>
            <th><b>Marca</b></th>
            <th><b>Modelo</b></th>
            <th><b>Precio</b></th>
            <th><b>Foto</b></th>
        </tr>
        <?php
            mysqli_data_seek($result, 0);
            setlocale(LC_MONETARY, "es_MX");
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['id_automovil'];
                $marca = $row['marca'];
                $modelo = $row['modelo'];
                $precio = $row['precio_neto'];
                $foto = $row['foto'];

                echo "<tr>";
                echo "<td>$marca</td>";
                echo "<td>$modelo</td>";
                echo "<td>$".number_format($precio, 2)."</td>";
                echo "<td><img src='./fotos/$foto' width='160' heigth='90'></td>";
                echo "</tr>";
            }

            mysqli_free_result($result);
            mysqli_close($link);
        ?>
    </table>
</body>
</html>
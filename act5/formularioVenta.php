<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Venta</title>
    <style>
        td {
            padding: 0 20px;
            text-align: center;
        }
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
            <td><b>Marca</b></td>
            <td><b>Modelo</b></td>
            <td><b>Precio</b></td>
            <td><b>Foto</b></td>
        </tr>
        <?php
            mysqli_data_seek($result, 0);
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['id_automovil'];
                $marca = $row['marca'];
                $modelo = $row['modelo'];
                $precio = $row['precio_neto'];
                $foto = $row['foto'];
                echo "<tr>";
                echo "<td>$marca</td>";
                echo "<td>$modelo</td>";
                echo "<td>\$$precio</td>";
                echo "<td><img src='./fotos/$foto' width='160' heigth='90'></td>";
                echo "</tr>";
            }

            mysqli_free_result($result);
            mysqli_close($link);
        ?>
    </table>
</body>
</html>
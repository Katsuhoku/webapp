<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmacion Venta</title>
    <style>
        *{
            font-family: 'Poppins';
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
    </style>
</head>
<body>
    <h1>Factura de Venta</h1>
    <a href="index.php">Inicio</a>
    <hr>

    <b>Vendedor: </b>
    <?php
        $id_vendedor = $_REQUEST['vendedor'];

        $link = mysqli_connect("localhost", "root", "");
        mysqli_query($link, "set character_set_results=utf8");
        mysqli_select_db($link, "concesionaria");
        $result = mysqli_query($link, "
            select nombre_vendedor from vendedores_raw
            where id_vendedor = $id_vendedor;
        ");

        $vendedor = $result->fetch_row()[0];

        echo "$vendedor";
    ?>
    <br><br>
    <b>Detalles del Automovil: </b><br><br>
    <?php
        $id_automovil = $_REQUEST['automovil'];

        $result = mysqli_query($link, "
            select marca, modelo, precio_neto, foto
            from automoviles
            where id_automovil = $id_automovil;
        ");

        $row = $result->fetch_assoc();
    ?>
    <table border="1.0">
        <tr>
            <th><b>Marca</b></th>
            <th><b>Modelo</b></th>
            <th><b>Precio</b></th>
            <th><b>Foto</b></th>
        </tr>
        <tr>
            <td><?php echo $row['marca'] ?></td>
            <td><?php echo $row['modelo'] ?></td>
            <td>$<?php echo number_format($row['precio_neto'], 2)?></td>
            <td><img src="./fotos/<?php echo $row['foto'] ?>" alt="" width='160' heigth='90'></td>
        </tr>
    </table><br><br>

    <?php
        $query = "
            update automoviles set id_vendedor = $id_vendedor
            where id_automovil = $id_automovil;
        ";

        if ($link->query($query)) {
            echo "<p><b>¡Venta Exitosa!</b></p>";
            echo "<a href='generarFactura.php?automovil=$id_automovil'><img src='./static/logopdf.png' width='80' height='80'> </a><br><br>"; 
            echo "<a href='formularioVenta.php'>Vender otro vehículo</a>";
        } else {
            echo "<p><b>Ocurrió un error al registrar la venta. Intente nuevamente más tarde.</b></p><br>";
            echo "<a href='formularioVenta.php'>Regresar</a>";
        }

        mysqli_free_result($result);
        mysqli_close($link);
    ?>
</body>
</html>
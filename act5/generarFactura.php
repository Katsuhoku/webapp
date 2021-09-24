<?php
    error_reporting(0);
    require('../fpdf16/fpdf.php');
    $pdf=new FPDF();	
    $pdf->AddPage();	//Agregar una pagina
    $pdf->SetFont('Arial','B',14);	//Letra Arial, negrita (Bold), tam. 20

    $id_automovil = $_GET['automovil'];

    $link=mysqli_connect("localhost","root","");
    mysqli_select_db($link,"concesionaria");

    $result=mysqli_query($link,"
        select * from vendedores_raw natural join automoviles
        where id_automovil = $id_automovil;
    ");
    $row = $result->fetch_assoc();
    $vendedor = $row['nombre_vendedor'];
    $marca = $row['marca'];
    $modelo = $row['modelo'];
    $precio_neto = $row['precio_neto'];
    $precio_iva = number_format($precio_neto * 1.16, 2);
    $foto = $row['foto'];

    //$pdf->Image('videoteca.jpg',5,8,15);
    $pdf->Cell(80,15,'        Concesionaria Shimarin',0,1);

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,"Vendedor: $vendedor",0,1);
    $pdf->Cell(0,10,"ID      Marca         Modelo        Precio Neto  IVA   Precio Total",0,1);
    $pdf->Cell(0,10,'____________________________________________________________',0,1); 
    $pdf->SetFont('Arial','',10);	
    $pdf->Cell(0,10,"$id_automovil          $marca             $modelo           \$$precio_neto      16%      \$$precio_iva",0,1);
    $pdf->Image("./fotos/$foto",10,70,150);

    $pdf->SetTextColor(0,0,255);
    $pdf->SetFont('','U'); 
    $pdf->Cell(0,150,"",0,1);
    $pdf->Write(5,'Mi pagina','http://pbello.cs.buap.mx');
    $pdf->Output("factura_$id_automovil.pdf");
    
    echo "Archivo PDF 'factura_$id_automovil.pdf' generado <br> ";
    mysqli_free_result($result); 
    mysqli_close($link);
?>
<a href="index.php">Volver a Inicio</a>

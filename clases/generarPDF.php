<?php
<<<<<<< HEAD
   require('../fpdf16/fpdf.php');
=======
   require('fpdf16/fpdf.php');
>>>>>>> 165813de627c08feaa2dd500147c92b21758403f
   $pdf=new FPDF();	
   $pdf->AddPage();	//Agregar una pagina
   $pdf->SetFont('Arial','B',14);	//Letra Arial, negrita (Bold), tam. 20
     
<<<<<<< HEAD
   $link=mysqli_connect("localhost","root","");
   mysqli_select_db($link,"videoteca");
   
   $result=mysqli_query($link,"select id_pelicula,titulo,director,actor from pelicula");

   //$pdf->Image('videoteca.jpg',5,8,15);
=======
   $link = mysqli_connect("localhost", "root", "");
   mysqli_select_db($link, "videoteca");
   $result = mysqli_query($link, "select * from peliculas");

   $pdf->Image('videoteca.jpg',5,8,15);
>>>>>>> 165813de627c08feaa2dd500147c92b21758403f
   $pdf->Cell(80,15,'        Videoteca',0,1);
   
   $pdf->SetFont('Arial','B',12);
   $pdf->Cell(0,10,'ID       Titulo     Director    Actor',0,1);
   $pdf->Cell(0,10,'_____________________________________',0,1); 
   $pdf->SetFont('Arial','',10);	
   while($row = mysqli_fetch_array($result)) { 
      $id=$row["id_pelicula"];
      $ti=$row["titulo"];
      $di=$row["director"];
      $ac=$row["actor"];
      $pdf->Cell(0,10,$id.'   '.$ti.'    '.$di.'   '.$ac,0,1);
   } 
  $pdf->SetTextColor(0,0,255);
  $pdf->SetFont('','U'); 
<<<<<<< HEAD
  $pdf->Write(5,'Mi pagina','http://pbello.cs.buap.mx');
  $pdf->Output("peliculas.pdf");
  echo "Archivo PDF generado <br> ";
  echo "<A href='consultaPeliculas.php'> Regresar </A>";
=======
  $pdf->Write(5,'Visita mi pagina','http://pbello.cs.buap.mx');
  $pdf->Output("Peliculas.pdf");
  echo "Archivo generado <br>";
  echo "<a href='consultaPeliculas.php'>Regresar</a>";
>>>>>>> 165813de627c08feaa2dd500147c92b21758403f
  mysqli_free_result($result); 
  mysqli_close($link);
?>
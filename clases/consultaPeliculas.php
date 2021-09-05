<html>
<head><title>Consulta</title></head>
<body>
<h2> Peliculas de la videoteca </h2>
<hr>
<?PHP
   $link=mysqli_connect("localhost","root","");
   mysqli_select_db($link,"videoteca");
   $result=mysqli_query($link,"select * from pelicula");
   echo "<A href='ranking.php'> Ranking de peliculas </A> <br> <br>";
   echo "<A href='insertarPelicula.php'> Insertar nueva pelicula </A> <br><br>";

   echo "<A href='generarPDF.php'> <img src='logopdf.png' width='30' height='40'> </A><br><br>"; 

   echo "<table border='1'>";
   echo "<TR><td><b>ID</b></td><td><b>Titulo</b></td><td><b>Director</b></td><td>
         <b>Actor</b></td> <td> Imagen </td></TR>";
   while($row=mysqli_fetch_array($result))
   {
      $id=$row['id_pelicula'];
      $ti=$row['titulo'];
      $di=$row['director'];
      $ac=$row['actor'];
      $im=$row['imagen']; 
      echo "<TR><td> $id </td><td> $ti </td><td> $di </td><td> $ac </td>
            <td> <img src='../misimagenes/$im' width='80' height='80' /> </td></TR>";
   }
   echo "</table>";  
   mysqli_free_result($result);
   mysqli_close($link);
?>
</body>
</html>
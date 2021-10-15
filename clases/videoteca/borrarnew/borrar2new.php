<html>
<head>


</head>
<body>
<?php 
   include("conexion.php"); 
   $link=Conectarse(); 
   $id=$_GET['id_pelicula'];
//   echo "el valor es : $id";  
   mysql_query("delete from pelicula where id_pelicula = '$id'",$link); 
   header("Location: borrarnew.php"); 
?> 
</body>

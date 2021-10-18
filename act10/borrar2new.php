<html>
<head>


</head>
<body>
<?php 
   include("conexion.php"); 
   $link = Conectarse();

   //$type = $_GET["type"];
   echo "Operación: $type";
   $id = "";
   if ($type == "product") {
      $id = $_GET["product_id"];
      //echo "<p>PRODUCT_ID: $id</p>";
   }
   else {
      $id = $_GET['user_id'];
      //echo "<p>USER_ID: $id</p>";
   }

   //mysqli_query($link, "delete from peliculas where id_pelicula = '$id'"); 
   //header("Location: borrarnew.php"); 
?> 
</body>

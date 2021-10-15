<HTML>
<HEAD>
<TITLE>Actualizar2.php</TITLE>
</HEAD>
<BODY>

<?php
   include("conexion.php"); 
   $link=Conectarse(); 

//Creamos la sentencia SQL y la ejecutamos
$ti=$_REQUEST['titulo'];
$di=$_REQUEST['director'];
$ac=$_REQUEST['actor'];
$id=$_REQUEST['id'];
echo "$ti<br>";
echo "$di<br>";
echo "$ac<br>";
echo "$id<br>";
$sSQL="Update peliculas Set titulo='$ti',director='$di',actor='$ac' Where id_pelicula='$id'";
mysqli_query($link, $sSQL);
 header("Location: borrarnew.php");
?>

</BODY>
</HTML> 
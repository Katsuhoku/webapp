<HTML>
<HEAD>
<TITLE>Actualizar.php</TITLE>
</HEAD>
<BODY>
<h1>Actualizar un registro</h1>
<br>
<?php
   include("conexion.php"); 
   $link=Conectarse(); 
   $id=$_GET['id_pelicula'];
   //echo "<br> id Pelicula = $id";
echo '<FORM METHOD="POST" ACTION="actualiza2new.php">';

//Creamos la sentencia SQL y la ejecutamos
//$sSQL="Select titulo,director, actor From pelicula where id_pelicula='$id'";
//$result=mysql_query($sSQL);

$result=mysql_query("select titulo,director,actor from pelicula where id_pelicula='$id'",$link);
$row = mysql_fetch_array($result);
$ti=$row["titulo"];
$di=$row["director"];
$ac=$row["actor"];

echo "Titulo  : <INPUT TYPE='text' NAME='titulo' value='$ti' SIZE='50'><br>";
echo "director: <INPUT TYPE='text' NAME='director' value='$di' SIZE='50'><br>";
echo "Actor   : <INPUT TYPE='text' NAME='actor' value='$ac' SIZE='50'><br>";
echo "<input type='hidden' name='id' value='$id'>";
?>
<br>
<hr>
 
<INPUT TYPE="SUBMIT" value="Actualizar">
</FORM>
</BODY>
</HTML> 
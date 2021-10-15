<html> 
<head> 
   <title>Ejemplo de Eliminación</title> 

<script LANGUAGE="JavaScript">
function confirmSubmit()
{
var eli=confirm("Está seguro de eliminar este registro?");
if (eli) return true ;
else return false ;
}
</script>

</head> 
<body> 

<H2>Eliminación de Registros en la tabla pelicula</H2> 

<?php 
   include("conexion.php"); 
   $link=Conectarse(); 
   $result=mysql_query("select * from pelicula",$link); 
?> 
   <TABLE BORDER=1> 
      <TR><TD bgcolor="#FFFFCC"><B>ID</B></TD>
          <TD bgcolor="#FFFFCC"><B>Titulo</B></TD> 	  
          <TD bgcolor="#FFFFCC"><B>Director</B></TD> 	  
		  <TD bgcolor="#FFFFCC"><B>Eliminar</B></TD> 
		  <TD bgcolor="#FFFFCC"><B>Actualizar</B></TD>
		  
     </TR> 
<?php       

  while($row = mysql_fetch_array($result)) 
  { 
    $ti=$row["titulo"];
    $di=$row["director"];
	$id=$row["id_pelicula"];
    printf("<tr><td>%d</td><td>%s</td><td>%s</td>
	       <td><center>
          <a onclick=\"return confirmSubmit()\"href=\"borrar2new.php?id_pelicula=%s\"><img src='eliminar.bmp' width='14' height='14' border='0'></a>
		   </center>
           </td>
		   <td><center>
		   <a href=\"actualizanew.php?id_pelicula=%s\"><img src='actualiza.jpg' width='25' height='25' border='0'></a>
		   </center></td>
		   </tr>",$id,$ti,$di,$id,$id); 
   } 

   mysql_free_result($result); 
   mysql_close($link); 
?> 
</table> 
</body> 
</html> 


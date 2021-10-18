<html> 
<head> 
   <title>Act10: Editar y Eliminar de la Base de Datos</title> 
   <script LANGUAGE="JavaScript">
      function confirmSubmit() {
         var eli=confirm("Está seguro de eliminar este registro?");
         if (eli) return true ;
         else return false ;
      }
   </script>
</head> 
<body> 

   <h1>Actividad 10: Edición o Eliminación de los Registros de la Base de Datos del Proyecto (Intercambios en Línea)</h1>

   <?php 
      include("conexion.php");
      $link = Conectarse();
   ?>
   <h2>Tabla de Productos</h2>
   <table border=1> 
      <tr>
         <td bgcolor="#f5e9f2"><b>PRODUCT_ID</b></td>
         <td bgcolor="#f5e9f2"><b>USER_ID</b></td>
         <td bgcolor="#f5e9f2"><b>PRODUCT_NAME</b></td>
         <td bgcolor="#f5e9f2"><b>PRODUCT_DESCRIPTION</b></td>
         <td bgcolor="#f5e9f2"><b>PRODUCT_DATE</b></td>
         <td bgcolor="#f5e9f2"><b>PRODUCT_CHANGED_FOR_ID</b></td>
		   <td bgcolor="#f5e9f2"><b>DELETE</b></td>
		   <td bgcolor="#f5e9f2"><b>UPDATE</b></td>
      </tr>
   <?php
      $result = mysqli_query($link, "SELECT * FROM products");

      while($row = mysqli_fetch_array($result)) {
         //print_r($row);
         $product_id = $row["PRODUCT_ID"];
         $user_id = $row["USER_ID"];
         $product_name = $row["PRODUCT_NAME"];
         $product_description = $row["PRODUCT_DESCRIPTION"];
         $product_date = $row["PRODUCT_DATE"];
         $changed_id = $row["PRODUCT_CHANGED_FOR_ID"];

         echo "<tr>";
         echo "<td>$product_id</td>";
         echo "<td>$user_id</td>";
         echo "<td>$product_name</td>";
         echo "<td>$product_description</td>";
         echo "<td>$product_date</td>";
         echo "<td>$changed_id</td>";
         echo "<td><center><a onclick=\"return confirmSubmit()\"href=\"borrar2new.php?type=product&product_id=$product_id\"><img src='eliminar.bmp' width='14' height='14' border='0'></a></center></td>";
         echo "<td><center><a href=\"actualizanew.php?type=product&product_id=$product_id\"><img src='actualiza.jpg' width='25' height='25' border='0'></a></center></td>";
         echo "</tr>";
      } 
   ?>
   </table>

   <h2>Tabla de Usuarios</h2>
   <table border="1">
      <tr>
         <td bgcolor="#f5e9f2"><b>USER_ID</b></td>
         <td bgcolor="#f5e9f2"><b>USER_USERNAME</b></td>
         <td bgcolor="#f5e9f2"><b>USER_PASSWORD</b></td>
         <td bgcolor="#f5e9f2"><b>USER_NAME</b></td>
         <td bgcolor="#f5e9f2"><b>USER_EMAIL</b></td>
         <td bgcolor="#f5e9f2"><b>USER_DIRECTION</b></td>
         <td bgcolor="#f5e9f2"><b>USER_TYPE</b></td>
         <td bgcolor="#f5e9f2"><b>USER_DATE</b></td>
         <td bgcolor="#f5e9f2"><b>USER_WISHLIST</b></td>
		   <td bgcolor="#f5e9f2"><b>DELETE</b></td>
		   <td bgcolor="#f5e9f2"><b>UPDATE</b></td>
      </tr>
   <?php
      $result = mysqli_query($link, "SELECT * FROM USERS");
      
      while($row = mysqli_fetch_array($result)) {
         //print_r($row);
         $user_id = $row["USER_ID"];
         $user_username = $row["USER_USERNAME"];
         $user_password = $row["USER_PASSWORD"];
         $user_name = $row["USER_NAME"];
         $user_email = $row["USER_EMAIL"];
         $user_direction = $row["USER_DIRECTION"];
         $user_type = $row["USER_TYPE"];
         $user_date = $row["USER_DATE"];
         $user_wishlist = $row["USER_WISHLIST"];

         echo "<tr>";
         echo "<td>$user_id</td>";
         echo "<td>$user_username</td>";
         echo "<td>$user_password</td>";
         echo "<td>$user_name</td>";
         echo "<td>$user_email</td>";
         echo "<td>$user_direction</td>";
         echo "<td>$user_type</td>";
         echo "<td>$user_date</td>";
         echo "<td>$user_wishlist</td>";
         echo "<td><center><a onclick=\"return confirmSubmit()\"href=\"borrar2new.php?type=user&user_id=$user_id\"><img src='eliminar.bmp' width='14' height='14' border='0'></a></center></td>";
         echo "<td><center><a href=\"actualizanew.php?type=user&user_id=$user_id\"><img src='actualiza.jpg' width='25' height='25' border='0'></a></center></td>";
         echo "</tr>";
      } 
   ?>
   </table>

   <?php
      mysqli_free_result($result); 
      mysqli_close($link); 
   ?>
</table> 
</body> 
</html> 


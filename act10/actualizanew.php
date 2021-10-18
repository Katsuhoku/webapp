<html>
<head>
   <title>Actualizar.php</title>
</head>
<body>
   <h1>Actualizar un registro</h1>
   <br>
   <?php
      include("conexion.php"); 
      $link = Conectarse(); 
      $type = $_GET["type"];
      //echo "Operación: $type";
   ?>

   <form action="actualiza2new.php?type=<?php echo $type;?>" method="POST">
   <?php
      $query = "";
      $id = "";
      if ($type == "product") {
         $id = $_GET["product_id"];
         //echo "<p>PRODUCT_ID: $id</p>";
         $query = "SELECT PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CHANGED_FOR_ID FROM PRODUCTS WHERE PRODUCT_ID=$id";
      }
      else {
         $id = $_GET['user_id'];
         //echo "<p>USER_ID: $id</p>";
         $query = "SELECT USER_USERNAME, USER_PASSWORD, USER_NAME, USER_EMAIL, USER_DIRECTION, USER_TYPE, USER_WISHLIST FROM USERS WHERE USER_ID=$id";
      }
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);

      if ($type == "product") {
         $product_name = $row["PRODUCT_NAME"];
         $product_description = $row["PRODUCT_DESCRIPTION"];
         
      }
      else {

      }
      $ti = $row["titulo"];
      $di = $row["director"];
      $ac = $row["actor"];

      echo "Titulo  : <INPUT TYPE='text' NAME='titulo' value='$ti' SIZE='50'><br>";
      echo "director: <INPUT TYPE='text' NAME='director' value='$di' SIZE='50'><br>";
      echo "Actor   : <INPUT TYPE='text' NAME='actor' value='$ac' SIZE='50'><br>";
      echo "<input type='hidden' name='id' value='$id'>";
   ?>
   <br>
   <hr>
   <input type="submit" value="Actualizar">
</form>
</body>
</html> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>videoteca</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<div id="wrap">
  <div id="masthead">
    <h1>Videoteca</h1>
    <div id="menucontainer">
      <div id="menunav">
        <ul>
          <li><a href="index.php" ><span>Inicio</span></a></li>
          <li><a href="peliculas.php" class="current"><span>Peliculas</span></a></li>
          <li><a href="registrar.php"><span>Registrar</span></a></li>
          <li><a href="iniciar_sesion.php"><span>Iniciar sesión</span></a></li>
          <li><a href="acerca_de_nosotros.php"><span>Acerca de nosotros</span></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div id="container">
    <div id="content">
      <h2>Listado de peliculas </h2>
      <p>
		  <?php 
			$link = mysqli_connect("localhost", "root", "");
			mysqli_select_db($link, "videoteca");
			$result = mysqli_query($link, "select * from peliculas");
	
			echo "<table border='1'>";
			echo "<tr>";
			echo "<td align='center'><b>ID</b></td>";
			echo "<td align='center'><b>Titulo</b></td>";
			echo "<td align='center'><b>Director</b></td>";
			echo "<td align='center'><b>Actor</b></td>";
			echo "<td align='center'><b>Imagen</b></td>";
			echo "<td align='center'><b>Ranking</b></td>";
			echo "</tr>";
			while ($row = mysqli_fetch_array($result)) {
				$id = $row['id_pelicula'];
				$ti = $row['titulo'];
				$di = $row['director'];
				$ac = $row['actor'];
				$im = $row['imagen'];
				$ra = $row['ranking'];
				echo "<tr>";
				echo "<td>$id</td>";
				echo "<td>$ti</td>";
				echo "<td>$di</td>";
				echo "<td>$ac</td>";
				//echo "<td>$im</td>";
				echo "<td><img src='../videotecaImagenes/$im' width='80' height='80'/></td>";
				echo "<td align='center'>$ra</td>";
				echo "</tr>";
				//echo "$id $ti, $di, $ac <br>";
			}
	
			mysqli_free_result($result);
			mysqli_close($link);
		?>
	  </p>
    </div>
  </div>
</div>
<div id="footer"><br/>
This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attribution 3.0 License</a> </div>
</body>
</html>

<html>
<head><title> Inertar pelicula </title></head>
<body>
<h2> Insertar nueva pelicula </h2>
<hr>
<?PHP
$tit=$_REQUEST['pelicula'];
$dir=$_REQUEST['director'];
$act=$_REQUEST['actor'];
$ran=$_REQUEST['ranking'];
$ima=$_FILES['foto']['name'];

echo "Titulo = $tit <br>";
echo "Director = $dir <br>";
echo "Actor = $act <br>";
echo "Ranking = $ran <br>";
echo "Imagen = $ima <br>";

$ruta="../misimagenes/".$ima;
copy($_FILES['foto']['tmp_name'],$ruta);

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"videoteca");
$query = "insert into pelicula (titulo, director, actor, ranking, imagen) values ('$tit','$dir','$act',$ran,'$ima');";
echo $query;
$result = mysqli_query($link,$query);
if($result) {
   echo "Success";
}
else {
   echo "Error";
}
mysqli_close($link);
?>
</body>
</html>
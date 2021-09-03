<html>
    <head><title>Insertar pelicula</title></head>
    <h2>Insertar nueva pelicula</h2>
    <hr>
        <?php
            $tit = $_REQUEST['pelicula'];
            $dir = $_REQUEST['director'];
            $act = $_REQUEST['actor'];
            $ran = $_REQUEST['ranking'];
            $img = $_FILES['foto']['name'];

            echo "Titulo: = $tit <br>";
            echo "Director: = $dir <br>";
            echo "Actor: = $act <br>";
            echo "Ranking: = $ran <br>";
            echo "Imagen: = $img <br>";


            $ruta = "../videotecaImagenes/".$img;
            copy($_FILES['foto']['tmp_name'], $ruta);

            $link = mysqli_connect("localhost", "root", "");
            mysqli_select_db($link, "videoteca");

            mysqli_query($link,"insert into peliculas (titulo, director, actor, ranking, imagen) 
                       values ('$tit','$dir','$act',$ran,'$img')");
            mysqli_close($link);


        ?>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Agregar o Actualizar Foto de Alumno</h1>
    <a href="index.php">Inicio</a> &nbsp
    <a href="consultaAlumnos.php">Volver</a> &nbsp
    <hr>

    <?php
        $matricula = $_REQUEST['alumno'];
        $target_dir = "fotos/";
        $filename = basename($_FILES["foto"]["name"]);
        $target_file = $target_dir . $filename;
        $uploadOk = 1;

        echo "<h1>" .basename($_FILES["foto"]["name"]) . "</h1>";

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Error, solo se permiten las extensiones JPG, JPEG, PNG & GIF.";
            $uploadOk = 0;
        }

        $link = mysqli_connect("localhost", "root", "");
        mysqli_query($link, "set character_set_results=utf8");
        mysqli_select_db($link, "autoservicios");
        $query = "update alumnos set foto = '$filename' where matricula = $matricula;";

        if ($link->query($query)) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        mysqli_close($link);

        if ($uploadOk == 0) {
            echo "El archivo no pudo ser subido. Vuelva a intentarlo.";
        } else {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
              echo "La foto fue actualizada correctamente.";
            } else {
              echo "Hubo un problema al intentar subir la foto. Vuelva a intentarlo.";
            }
        }
    ?>
</body>
</html>
<?php
    $usu=$_REQUEST['usu'];
    $pas=$_REQUEST['passwd'];
    echo "Usuario = $usu <br>";
    echo "Password = $pas <br>";


    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "videoteca");
    $result = mysqli_query($link, "select usuario, password from clientes where usuario='$usu'");
    
    if ($row = mysqli_fetch_array($result)) {
        if ($row['password'] == $pas) {
            session_start();
            $_SESSION['username'] = $row['usuario'];
            header("Location: index.php");
            exit();
            //echo "Usuario registrado";
        } else {
            echo "Error en password";
        } 
    } else {
        echo "Usuario no existe";
    }

    mysqli_free_result($result);
    mysqli_close($link);

?>
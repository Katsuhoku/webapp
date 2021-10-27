<?php
$link = mysqli_connect('localhost', 'root', '');
if (!$link) {
    die('not connected: '.mysqli_error());
}

mysqli_select_db($link, 'pruebas');

$query = 'call sp_insertar_persona(1,"Johny","Perez Moreno");';
$result = mysqli_query($link, $query);

if (!$result) echo "Error";
else {
    echo "Consulta exitosa";
}
mysqli_close($link);
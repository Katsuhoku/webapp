<?php 
    function connect() { 
        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "TRUEQUES_FCC");
        return $link; 
    } 
?>

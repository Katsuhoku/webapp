<?php
    switch($_SESSION['type']) {
        case 0:
            header("Location: ./user/index.php");
            break;
        case 1:
            header("Location: ./admin/index.php");
            break;
        default:
            header("Location: index.php");
    }
?>
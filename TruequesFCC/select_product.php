<?php
    session_start();
    if ($_SESSION == null || !array_key_exists('type', $_SESSION)) {
        header("Location: register");
    } else {
        require_once "components/header.php";
    
        require_once "pages/select_product.php";

        require_once "components/footer.html";
    }  
?>

<?php
    require_once "./connection.php";

    $link = connect();
    $product_id = $_GET['product_id'];

    $result = mysqli_query($link, "UPDATE PRODUCTS SET IS_DELETED = 0 WHERE PRODUCT_ID = '$product_id'");

    header("Location: ../my_products");
    mysqli_free_result($result); 
    mysqli_close($link);
?>
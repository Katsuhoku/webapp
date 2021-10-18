<?php
    require_once "./connection.php";
    $product_id = $_REQUEST['product_id'];
    $product_name = $_REQUEST['product_name'];
    $product_description = $_REQUEST['product_description'];
    $product_state = $_REQUEST['product_state'];

    $link = connect();
    $result = mysqli_query($link, "UPDATE PRODUCTS
        SET PRODUCT_NAME = '$product_name', PRODUCT_DESCRIPTION = '$product_description', PRODUCT_STATE = '$product_state' 
        WHERE PRODUCT_ID = '$product_id'"
    );
    header("Location: ../my_products");
    mysqli_free_result($result); 
    mysqli_close($link);
?>
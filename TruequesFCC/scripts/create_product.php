<?php
    require_once "./connection.php";
    session_start();
    
    $user_id = $_SESSION['user_id'];
    $product_name = $_REQUEST['product_name'];
    $product_description = $_REQUEST['product_description'];
    $product_state = $_REQUEST['product_state'];

    $link = connect();
    $result = mysqli_query($link, "INSERT INTO PRODUCTS 
        (USER_ID, PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_STATE) VALUES 
        ('$user_id', '$product_name', '$product_description', '$product_state')"
    );
    header("Location: ../my_products");
    mysqli_free_result($result); 
    mysqli_close($link);
?>
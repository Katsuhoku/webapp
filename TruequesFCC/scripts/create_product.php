<?php
    require_once "connection.php";
    session_start();
    
    $user_id = $_SESSION['user_id'];
    $product_name = $_REQUEST['product_name'];
    $product_description = $_REQUEST['product_description'];
    $product_state = $_REQUEST['product_state'];
    $product_category = $_REQUEST['product_category'];
    $product_main_img = $_FILES['product_main_img'];

    $link = connect();
    $ext = pathinfo($product_main_img['name'], PATHINFO_EXTENSION);
    $result = mysqli_query($link, "CALL insertProductAndImage('$user_id', '$product_name', '$product_description', '$product_state', '$product_category', '$ext')");
    $row = mysqli_fetch_array($result);
    copy($product_main_img['tmp_name'], "../products-img/".$row['IMAGE_ROUTE']);
    header("Location: ../my_products");
    mysqli_free_result($result); 
    mysqli_close($link);
?>
<?php
    require_once "connection.php";
    require_once "read_products.php";
    session_start();
    
    $user_id = $_SESSION['user_id'];
    $product_name = $_REQUEST['product_name'];
    $product_description = $_REQUEST['product_description'];
    $product_state = $_REQUEST['product_state'];
    $product_main_img = $_FILES['product_main_img'];

    /*print_r($_FILES);
    echo '<br>';
    print_r ($product_main_img);
    echo '<br>';
    echo $product_main_img['name'];
    echo '<br>';
    echo $product_main_img['type'];
    echo '<br>';
    echo $product_main_img['tmp_name'];
    echo '<br>';*/

    $link = connect();
    $result = mysqli_query($link, "INSERT INTO PRODUCTS 
        (USER_ID, PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_STATE) VALUES 
        ('$user_id', '$product_name', '$product_description', '$product_state')"
    );

    $product_result = readLastOwnProduct($user_id);
    $product_id = mysqli_fetch_array($product_result)['PRODUCT_ID'];
    mysqli_free_result($product_result);

    $image_name = $product_id."-1".pathinfo($product_main_img['name'], PATHINFO_EXTENSION);

    $image_result = mysqli_query($link, "INSERT INTO IMAGES
        (PRODUCT_ID, IMAGE_ROUTE, IMAGE_IS_MAIN) VALUES
        ('$product_id', '$image_name', 1)"
    );
    mysqli_free_result($image_result);

    copy($product_main_img['tmp_name'], "../products-img/".$image_name);
    header("Location: ../my_products");
    mysqli_free_result($result); 
    mysqli_close($link);
?>
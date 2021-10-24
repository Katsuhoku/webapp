<?php
    require_once "./connection.php";

    $product_id = $_REQUEST['product_id'];
    $product_name = $_REQUEST['product_name'];
    $product_description = $_REQUEST['product_description'];
    $product_state = $_REQUEST['product_state'];
    $product_category = $_REQUEST['product_category'];
    

    $link = connect();
    $result = mysqli_query($link, "UPDATE PRODUCTS
        SET PRODUCT_NAME = '$product_name', PRODUCT_DESCRIPTION = '$product_description', PRODUCT_STATE = '$product_state', CATEGORY_ID = '$product_category' 
        WHERE PRODUCT_ID = '$product_id'"
    );
    if (array_key_exists('product_main_img', $_FILES) && !empty($_FILES['product_main_img']['name'])){
        $product_main_img = $_FILES['product_main_img'];
        $image_name = $product_id."-1.".pathinfo($product_main_img['name'], PATHINFO_EXTENSION);
        $image_result = mysqli_query($link, "REPLACE INTO IMAGES
            (PRODUCT_ID, IMAGE_ROUTE, IMAGE_IS_MAIN) VALUES
            ('$product_id', '$image_name', 1)"
        );
        mysqli_free_result($image_result);
        copy($product_main_img['tmp_name'], "../products-img/".$image_name);
    }
    
    header("Location: ../my_products");
    //mysqli_free_result($result); 
    mysqli_close($link);
?>
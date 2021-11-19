<?php
    require_once "connection.php";
    session_start();
    
    $user_id = $_SESSION['user_id'];
    $product_name = $_REQUEST['product_name'];
    $product_description = $_REQUEST['product_description'];
    $product_state = $_REQUEST['product_state'];
    $product_category = $_REQUEST['product_category'];
    $product_main_img = $_FILES['product_main_img'];
    $product_opc_imgs = $_FILES['product_opc_imgs'];

    $link = connect();
    $ext = pathinfo($product_main_img['name'], PATHINFO_EXTENSION);
    
    $result = mysqli_query($link, "CALL insertProductAndImage('$user_id', '$product_name', '$product_description', '$product_state', '$product_category', '$ext')");
    $row = mysqli_fetch_array($result);
    copy($product_main_img['tmp_name'], "../products-img/".$row['IMAGE_ROUTE']);
    
    $product_id = $row['PRODUCT_ID'];

    if ($product_opc_imgs != null && $product_opc_imgs['size'][0] > 0) {
        for ($i = 0 ; $i < sizeof($product_opc_imgs['name']) ; $i++) {
            $index = $i + 2;
            $ext_opc = pathinfo($product_opc_imgs['name'][$i], PATHINFO_EXTENSION);

            echo "PRODUCT_ID".$product_id;
            echo "INDEX ".$index;
            echo "EXT ".$ext_opc;
            echo $product_opc_imgs['name'][$i];
            
            $name = "$product_id-$index.$ext_opc";
            echo $name;
            
            $result_opc_img = mysqli_query(connect(), "CALL insertOpcImage('$product_id', '$index', '$ext_opc')");
            $row_opc_img = mysqli_fetch_array($result_opc_img);
            copy($product_opc_imgs['tmp_name'][$i], "../products-img/".$row_opc_img['IMAGE_ROUTE']);
            mysqli_free_result($result_opc_img);
        }
    }
    header("Location: ../my_products");
    mysqli_free_result($result); 
    mysqli_close($link);
?>
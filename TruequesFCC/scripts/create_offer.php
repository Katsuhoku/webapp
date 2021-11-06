<?php
    require_once "connection.php";
    session_start();

    $product_id = $_GET['product_id'];
    $selected_product_id = $_GET['selected_product_id'];

    echo'Product';
    echo $product_id;
    echo'Selected';
    echo $selected_product_id;
    
    $link = connect();
    $result = mysqli_query($link, "INSERT INTO OFFERS 
        (PRODUCT_ID, OFFER_PRODUCT_ID) VALUES 
        ('$selected_product_id', '$product_id')"
    );
    header("Location: ../my_offers");
    mysqli_free_result($result); 
    mysqli_close($link);
?>
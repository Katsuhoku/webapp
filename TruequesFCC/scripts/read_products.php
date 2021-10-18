<?php
    require_once 'connection.php';

    function readAllProducts() {
        $link = connect();
        $result = mysqli_query($link, "select
            PRODUCT_ID,
            USER_ID, 
            PRODUCT_NAME,
            PRODUCT_DESCRIPTION,
            PRODUCT_STATE,   
            PRODUCT_DATE
            FROM PRODUCTS where PRODUCT_CHANGED_FOR_ID is NULL
            ORDER BY PRODUCT_DATE DESC");
        mysqli_close($link);
        return $result;
    }

    function readAllFilteredProducts($user_id) {
        $link = connect();
        //$user_id = $_SESSION['user_id'];
        $result = mysqli_query($link, "select
            PRODUCT_ID,
            USER_ID, 
            PRODUCT_NAME,
            PRODUCT_DESCRIPTION,
            PRODUCT_STATE,   
            PRODUCT_DATE
            FROM PRODUCTS where PRODUCT_CHANGED_FOR_ID is NULL AND USER_ID != '$user_id'
            ORDER BY PRODUCT_DATE DESC");
        mysqli_close($link);
        return $result;
    }

    function readAllOwnProducts($user_id) {
        $link = connect();
        //$user_id = $_SESSION['user_id'];
        $result = mysqli_query($link, "select
            PRODUCT_ID,
            USER_ID, 
            PRODUCT_NAME,
            PRODUCT_DESCRIPTION,
            PRODUCT_STATE,   
            PRODUCT_DATE
            FROM PRODUCTS where USER_ID = '$user_id'
            ORDER BY PRODUCT_DATE DESC");
        mysqli_close($link);
        return $result;
    }

    function readProductById($id) {
        $link = connect();
        $result = mysqli_query($link, "select
            PRODUCT_ID,
            USER_ID, 
            PRODUCT_NAME,
            PRODUCT_DESCRIPTION,
            PRODUCT_STATE,   
            PRODUCT_DATE
            from PRODUCTS where PRODUCT_ID = '$id'");
        mysqli_close($link);
        return $result;
    }
?>
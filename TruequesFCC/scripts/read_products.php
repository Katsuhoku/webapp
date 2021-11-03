<?php
    require_once 'connection.php';

    function readAllProducts() {
        $link = connect();
        $result = mysqli_query($link, "select
            PRODUCT_ID,
            USER_ID,
            CATEGORY_ID, 
            PRODUCT_NAME,
            PRODUCT_DESCRIPTION,
            PRODUCT_STATE,   
            PRODUCT_DATE
            FROM PRODUCTS where IS_DELETED = 0
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
            CATEGORY_ID, 
            PRODUCT_NAME,
            PRODUCT_DESCRIPTION,
            PRODUCT_STATE,   
            PRODUCT_DATE
            FROM PRODUCTS where USER_ID != '$user_id' AND IS_DELETED = 0
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
            CATEGORY_ID, 
            PRODUCT_NAME,
            PRODUCT_DESCRIPTION,
            PRODUCT_STATE,   
            PRODUCT_DATE
            FROM PRODUCTS where USER_ID = '$user_id' AND IS_DELETED = 0
            ORDER BY PRODUCT_DATE DESC");
        mysqli_close($link);
        return $result;
    }

    function readAllOwnDeletedProducts($user_id) {
        $link = connect();
        //$user_id = $_SESSION['user_id'];
        $result = mysqli_query($link, "select
            PRODUCT_ID,
            USER_ID,
            CATEGORY_ID, 
            PRODUCT_NAME,
            PRODUCT_DESCRIPTION,
            PRODUCT_STATE,   
            PRODUCT_DATE
            FROM PRODUCTS where USER_ID = '$user_id' AND IS_DELETED = 1
            ORDER BY PRODUCT_DATE DESC");
        mysqli_close($link);
        return $result;
    }

    function readLastOwnProduct($user_id) {
        $link = connect();
        $result = mysqli_query($link, "select
            PRODUCT_ID,
            USER_ID,
            CATEGORY_ID, 
            PRODUCT_NAME,
            PRODUCT_DESCRIPTION,
            PRODUCT_STATE,   
            PRODUCT_DATE
            FROM PRODUCTS where USER_ID = '$user_id' AND IS_DELETED = 0
            ORDER BY PRODUCT_DATE DESC
            LIMIT 1");
        mysqli_close($link);
        return $result;
    }

    function readProductById($id) {
        $link = connect();
        $result = mysqli_query($link, "select
            PRODUCT_ID,
            USER_ID,
            CATEGORY_ID, 
            PRODUCT_NAME,
            PRODUCT_DESCRIPTION,
            PRODUCT_STATE,   
            PRODUCT_DATE
            from PRODUCTS where PRODUCT_ID = '$id'");
        mysqli_close($link);
        return $result;
    }

    function readProductsByCategory($category) {
        $link = connect();
        $result = mysqli_query($link, "select
            PRODUCT_ID,
            USER_ID,
            CATEGORY_ID, 
            PRODUCT_NAME,
            PRODUCT_DESCRIPTION,
            PRODUCT_STATE,   
            PRODUCT_DATE
            from PRODUCTS where CATEGORY_ID = '$category'");
        mysqli_close($link);
        return $result;
    }
?>
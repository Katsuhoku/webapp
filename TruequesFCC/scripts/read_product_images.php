<?php
    require_once 'connection.php';

    function readMainImageByProduct($product_id) {
        $link = connect();
        $result = mysqli_query($link, "select
            IMAGE_ID,
            PRODUCT_ID,
            IMAGE_ROUTE,
            IMAGE_IS_MAIN
            from IMAGES where PRODUCT_ID = '$product_id' AND IMAGE_IS_MAIN = TRUE");
        mysqli_close($link);
        return $result;
    }

    function readOptImagesByProduct($product_id) {
        $link = connect();
        $result = mysqli_query($link, "select
            IMAGE_ID,
            PRODUCT_ID,
            IMAGE_ROUTE,
            IMAGE_IS_MAIN
            from IMAGES where PRODUCT_ID = '$product_id' AND IMAGE_IS_MAIN = TRUE");
        mysqli_close($link);
        return $result;
    }

    function readAllImagesByProduct($product_id) {
        $link = connect();
        $result = mysqli_query($link, "select
            IMAGE_ID,
            PRODUCT_ID,
            IMAGE_ROUTE,
            IMAGE_IS_MAIN
            from IMAGES where PRODUCT_ID = '$product_id'");
        mysqli_close($link);
        return $result;
    }
?>
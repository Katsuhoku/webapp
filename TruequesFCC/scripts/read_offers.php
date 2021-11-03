<?php
    require_once 'connection.php';

    function readAllMyOffers($user_id) {
        $link = connect();
        $result = mysqli_query($link, "select
            OFFER_ID,
            OFFERS.PRODUCT_ID,
            STATE_ID,
            OFFER_PRODUCT_ID,   
            PRODUCT_DATE
            FROM OFFERS INNER JOIN PRODUCTS 
            ON OFFERS.PRODUCT_ID = PRODUCTS.PRODUCT_ID AND PRODUCTS.USER_ID = '$user_id'
            ORDER BY PRODUCT_DATE DESC");
        mysqli_close($link);
        return $result;
    }

    function readAllOffers($user_id) {
        $link = connect();
        $result = mysqli_query($link, "select
            OFFER_ID,
            OFFERS.PRODUCT_ID,
            STATE_ID,
            OFFER_PRODUCT_ID,   
            PRODUCT_DATE
            FROM OFFERS INNER JOIN PRODUCTS 
            ON OFFERS.OFFER_PRODUCT_ID = PRODUCTS.PRODUCT_ID AND PRODUCTS.USER_ID = '$user_id'
            ORDER BY PRODUCT_DATE DESC");
        mysqli_close($link);
        return $result;
    }
?>
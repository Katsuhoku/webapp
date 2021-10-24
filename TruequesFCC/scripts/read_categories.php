<?php
    require_once 'connection.php';

    function readAllCategories() {
        $link = connect();
        $result = mysqli_query($link, "select
            CATEGORY_ID,
            CATEGORY_NAME
            FROM CATEGORIES");
        mysqli_close($link);
        return $result;
    }
?>
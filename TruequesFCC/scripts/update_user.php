<?php
    require_once "./connection.php";

    $user_id = $_REQUEST['user_id'];
    $user_name = $_REQUEST['user_name'];
    $user_direction = $_REQUEST['user_direction'];
    $user_wishlist = $_REQUEST['user_wishlist'];

    echo $user_id;
    echo $user_name;
    echo $user_direction;
    echo $user_wishlist;

    $link = connect();
    $result = mysqli_query($link, "UPDATE USERS
        SET USER_NAME = '$user_name', USER_DIRECTION = '$user_direction', USER_WISHLIST = '$user_wishlist' 
        WHERE USER_ID = '$user_id'"
    );
    header("Location: ../index");
    //mysqli_free_result($result); 
    mysqli_close($link);
?>
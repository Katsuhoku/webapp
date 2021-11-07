<?php
    require_once "./connection.php";

    $link = connect();
    $offer_id = $_GET['offer_id'];

    $result = mysqli_query($link, "UPDATE OFFERS SET IS_HIDDEN = 1 WHERE OFFER_ID = '$offer_id'");

    header("Location: ../my_offers");
    mysqli_free_result($result); 
    mysqli_close($link);
?>
<?php
    require_once "./connection.php";

    $offer_id = $_GET['offer_id'];
    $offer_state = $_GET['offer_state'];

    echo $offer_id;
    echo $offer_state;

    $link = connect();
    $result = mysqli_query($link, "UPDATE OFFERS
        SET STATE_ID = '".getOfferState($offer_state)."'
        WHERE OFFER_ID = '$offer_id'"
    );
    //header("Location: ../index");
    //mysqli_free_result($result); 
    mysqli_close($link);

    function getOfferState($state) {
        switch ($state) {
            case 'open': return 1;
            case 'close': return 2;
            case 'accept': return 3;
            case 'decline': return 4;
            default: return 5; //Finalize
        }
    }
?>
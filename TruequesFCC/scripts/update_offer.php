<?php
    require_once "./connection.php";
    require_once "./read_offers.php";

    $offer_id = $_GET['offer_id'];
    $offer_state = $_GET['offer_state'];
    $p = $_GET['p'];

    echo $offer_id;
    echo $offer_state;

    $link = connect();
    $result = mysqli_query($link, "UPDATE OFFERS
        SET STATE_ID = '".getOfferState($offer_state)."'
        WHERE OFFER_ID = '$offer_id'"
    );

    $offer_result = readOfferById($offer_id);
    $offer = mysqli_fetch_array($offer_result);

    if ($offer['STATE_ID'] == 5) {
        $close_result = mysqli_query($link, "CALL closeOffersOf('".$offer['PRODUCT_ID']."')");
        $decline_result = mysqli_query($link, "CALL declineOffersOf('".$offer['PRODUCT_ID']."')"); 
    }
    if ($p == 1) header("Location: ../my_offers");
    else header("Location: ../offers");
    mysqli_free_result($offer_result); 
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
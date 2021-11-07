<?php
    require_once "scripts/read_offers.php";
    require_once "scripts/read_products.php";
    require_once "scripts/read_product_images.php";
    require_once "components/offer_cards.php";
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col col-md-6 py-5">
                <h2 class="h1">Aqui encontrarás todas las ofertas que has <span class="text-primary">realizado</span>.</h2>
            </div>
        </div>
        <div class="row">
            <h3 class="h3">Mis ofertas más recientes</h3>
        </div> 
            <?php
                $result = readAllMyOffers($_SESSION['user_id']);
                if ($data = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
                    foreach ($data as $item) {
                        $product_result = readProductById($item['PRODUCT_ID']);
                        $product = mysqli_fetch_array($product_result);
                        $image_result = readMainImageByProduct($item['PRODUCT_ID']);
                        $main_image = mysqli_fetch_array($image_result);

                        $offer_product_result = readProductById($item['OFFER_PRODUCT_ID']);
                        $offer_product = mysqli_fetch_array($offer_product_result);
                        $offer_image_result = readMainImageByProduct($item['OFFER_PRODUCT_ID']);
                        $offer_main_image = mysqli_fetch_array($offer_image_result);

                        create_my_offer_card(
                            $item['OFFER_ID'],
                            $item['STATE_ID'],
                            $product['PRODUCT_ID'],
                            $product['PRODUCT_NAME'],
                            $product['PRODUCT_DESCRIPTION'],
                            $product['PRODUCT_DATE'],
                            $product['PRODUCT_STATE'],
                            $product['CATEGORY_ID'],
                            $main_image['IMAGE_ROUTE'],
                            
                            $offer_product['PRODUCT_ID'],
                            $offer_product['PRODUCT_NAME'],
                            $offer_product['PRODUCT_DESCRIPTION'],
                            $offer_product['PRODUCT_DATE'],
                            $offer_product['PRODUCT_STATE'],
                            $offer_product['CATEGORY_ID'],
                            $offer_main_image['IMAGE_ROUTE']
                        );

                        mysqli_free_result($product_result);
                        mysqli_free_result($offer_product_result);
                        mysqli_free_result($image_result);
                        mysqli_free_result($offer_image_result);
                    }
                } else
                    require_once "components/no_offers.html";
                mysqli_free_result($result);
            ?>
        </div>
    </div>
</main>
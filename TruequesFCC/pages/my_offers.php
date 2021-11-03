<?php
    require_once "scripts/read_offers.php";
    require_once "scripts/read_products.php";
    require_once "scripts/read_product_images.php";
    require_once "components/product_cards.php";
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
                    echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 my-3">';
                    foreach ($data as $item) {
                        /*$image_result = readMainImageByProduct($item['PRODUCT_ID']);
                        $main_image = mysqli_fetch_array($image_result);

                        create_own_product_card(
                            $item['PRODUCT_ID'],
                            $item['PRODUCT_NAME'],
                            $item['PRODUCT_DESCRIPTION'],
                            $item['PRODUCT_DATE'],
                            $item['PRODUCT_STATE'],
                            $item['CATEGORY_ID'],
                            $main_image['IMAGE_ROUTE']
                        );
                        mysqli_free_result($image_result);*/
                    }
                } else
                    require_once "components/no_offers.html";
                mysqli_free_result($result);
            ?>
        </div>
    </div>
</main>
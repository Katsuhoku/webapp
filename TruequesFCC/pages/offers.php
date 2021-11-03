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
                <h2 class="h1">Aqui encontrarás todas las ofertas que te han <span class="text-primary">ofrecido</span>.</h2>
            </div>
        </div>
        <div class="row">
            <h3 class="h3">Ofertas más recientes</h3>
        </div> 
        <?php
                $result = readAllOffers($_SESSION['user_id']);
                if ($data = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
                    echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 my-3">';
                    foreach ($data as $item) {}
                } else
                    require_once "components/no_offers.html";
                mysqli_free_result($result);
            ?>
        </div>
    </div>
</main>
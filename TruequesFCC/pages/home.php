<?php
    require_once "components/product_cards.php";
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-6 py-5">
                <h2 class="h1">Encuentra lo que siempre estuviste <span class="text-primary">buscando</span>.</h2>
            </div>
        </div>
        <div class="row">
            <h3 class="h3">Publicaciones más recientes</h3>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4 my-3">
                
            <?php 
                create_product_card();
                create_product_card();
                create_product_card();
                create_product_card();
                create_product_card();
                create_product_card();
            ?>

        </div>
    </div>
</main>
<?php
    require_once "scripts/connection.php";
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
                $link = connect();
                $result = mysqli_query($link, "select
                    PRODUCT_ID,
                    USER_ID, 
                    PRODUCT_NAME,
                    PRODUCT_DESCRIPTION,
                    PRODUCT_STATE,   
                    PRODUCT_DATE
                    from PRODUCTS where PRODUCT_CHANGED_FOR_ID is NULL");

                if ($data = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
                    foreach ($data as $item) {
                        create_product_card(
                            $item['PRODUCT_ID'],
                            $item['PRODUCT_NAME'],
                            $item['PRODUCT_DESCRIPTION'],
                            (new DateTime($item['PRODUCT_DATE']))->format('d-M-Y'),
                            $item['PRODUCT_STATE'] == 1 ? "Usado" : "Nuevo"
                        );
                    }
                }

                mysqli_free_result($result);
                mysqli_close($link);
            ?>

        </div>
    </div>
</main>
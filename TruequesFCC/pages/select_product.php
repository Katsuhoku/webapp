<?php
    require_once "scripts/read_products.php";
    require_once "scripts/read_product_images.php";
    require_once "components/product_cards.php";
    $product_id = $_GET['product_id'];
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col col-md-6 py-5">
                <h2 class="h1">Selecciona el producto que quieres <span class="text-primary">intercambiar</span>.</h2>
            </div>
        </div>
        <div class="row">
            <h3 class="h3">Tus productos</h3>
        </div> 
            <?php
                $result = readAllOwnProducts($_SESSION['user_id']);
                if ($data = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
                    echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 my-3">';
                    foreach ($data as $item) {
                        $image_result = readMainImageByProduct($item['PRODUCT_ID']);
                        $main_image = mysqli_fetch_array($image_result);

                        create_select_product_card(
                            $product_id,
                            $item['PRODUCT_ID'],
                            $item['PRODUCT_NAME'],
                            $item['PRODUCT_DESCRIPTION'],
                            $item['PRODUCT_DATE'],
                            $item['PRODUCT_STATE'],
                            $item['CATEGORY_ID'],
                            $main_image['IMAGE_ROUTE']
                        );
                        mysqli_free_result($image_result);
                    }
                } else
                    require_once "components/no_products.html";
                mysqli_free_result($result);
            ?>
        </div>
    </div>
</main>
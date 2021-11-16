<?php
    require_once "scripts/read_products.php";
    require_once "scripts/read_product_images.php";
    require_once "components/product_cards.php";
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col col-md-6 py-5">
                <h2 class="h1">Encuentra lo que siempre estuviste <span class="text-primary">buscando</span>.</h2>
            </div>
        </div>
        <div class="row">
            <h3 class="h3">Publicaciones más recientes</h3>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 my-3">  
            <?php
                if (!array_key_exists('user_id', $_SESSION)) $result = readAllProducts();
                else $result = readAllFilteredProducts($_SESSION['user_id']);
                if ($data = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
                    foreach ($data as $item) {
                        $image_result = readMainImageByProduct($item['PRODUCT_ID']);
                        $main_image = mysqli_fetch_array($image_result);
                        if ($_SESSION == null || !array_key_exists('type', $_SESSION)) {
                            create_internet_user_product_card(
                                $item['PRODUCT_ID'],
                                $item['PRODUCT_NAME'],
                                $item['PRODUCT_DESCRIPTION'],
                                $item['PRODUCT_DATE'],
                                $item['PRODUCT_STATE'],
                                $item['CATEGORY_ID'],
                                $main_image['IMAGE_ROUTE']
                            );
                          } else {
                              if ($_SESSION['type'] == 1)
                                create_admin_product_card(
                                    $item['PRODUCT_ID'],
                                    $item['PRODUCT_NAME'],
                                    $item['PRODUCT_DESCRIPTION'],
                                    $item['PRODUCT_DATE'],
                                    $item['PRODUCT_STATE'],
                                    $item['CATEGORY_ID'],
                                    $main_image['IMAGE_ROUTE']
                                );
                              else
                                create_product_card(
                                    $item['PRODUCT_ID'],
                                    $item['PRODUCT_NAME'],
                                    $item['PRODUCT_DESCRIPTION'],
                                    $item['PRODUCT_DATE'],
                                    $item['PRODUCT_STATE'],
                                    $item['CATEGORY_ID'],
                                    $main_image['IMAGE_ROUTE']
                                );  
                          }
                        mysqli_free_result($image_result);
                    }
                } else
                    require_once "components/no_products.html";
                mysqli_free_result($result);
            ?>
        </div>
    </div>
</main>
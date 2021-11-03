<?php
    require_once "scripts/read_users.php";
    require_once "scripts/read_products.php";
    require_once "scripts/read_product_images.php";
    require_once "components/product_cards.php";
    require_once "components/user_cards.php";
    $product_id = $_GET['product_id'];
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col col-md-6 py-5">
                <p class="h1">Detalles del <span class="text-primary">producto</span>.</p>
            </div>
        </div>
        <div class="row">
            <?php
                $product_result = readProductById($product_id);
                $product = mysqli_fetch_array($product_result);

                $user_result = readUserById($product['USER_ID']);
                $user = mysqli_fetch_array($user_result);

                $images_result = readAllImagesByProduct($product_id);
                $images = mysqli_fetch_all($images_result, MYSQLI_ASSOC);
                
                mysqli_free_result($user_result);
                mysqli_free_result($product_result);
                mysqli_free_result($images_result);
            ?>
            
            <div id="productCarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php
                        $photo = 0;
                        foreach ($images as $img) {
                            echo '<button type="button" data-bs-target="#productCarousel" data-bs-slide-to="'.$photo.'" aria-label="Photo "'.++$photo.'></button>';
                        }
                    ?>
                </div>
                <div class="carousel-inner">
                    <?php
                        $first = true;
                        foreach ($images as $img) {
                            $name = $img['IMAGE_ROUTE'];
                            if ($first){
                                echo '<div class="carousel-item active">';
                                $first = false;
                            } else echo '<div class="carousel-item active">';
                            echo '<img src="./products-img/'.$name.'" class="d-block m-auto" alt="Imagen adicional" style="height: 60vh;">';
                            echo '</div>';
                        }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="row my-5 py-5">
            <?php create_product_details_card(
                $product['PRODUCT_NAME'],
                $product['PRODUCT_DESCRIPTION'],
                $product['PRODUCT_DATE'],
                $product['PRODUCT_STATE'],
                $product['CATEGORY_ID'],
            );
            
            create_user_card(
                $user['USER_NAME'],
                $user['USER_DATE'],
                $user['USER_USERNAME'],
                $user['USER_EMAIL'],
                $user['USER_DIRECTION'],
                $user['USER_WISHLIST']
            );
            ?>
        </div>
        <div class="row my-5 text-center">
            <a href="#" class="col mx-3 btn btn-primary">Ofertar</a>
        </div>
    </div>
</main>
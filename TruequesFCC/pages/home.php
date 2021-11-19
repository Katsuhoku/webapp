<?php
    require_once "scripts/read_products.php";
    require_once "scripts/read_product_images.php";
    require_once "components/product_cards.php";
    $product_category = 0;
    if(array_key_exists('product_category', $_REQUEST))  $product_category = $_REQUEST['product_category'];
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col col-md-6 py-5">
                <h2 class="h1">Encuentra lo que siempre estuviste <span class="text-primary">buscando</span>.</h2>
            </div>
        </div>
        <div class="row">
            <h3 class="h3 col-6">Publicaciones más recientes</h3>
            <div class="col-6 text-end">
                <form action="./index" method="POST">
                    <div class="input-group">
                        <select class="form-select" id="product_category" name="product_category" aria-label="Categoria del producto" required>
                            <option <?php if ($product_category == 0) echo "selected";?> value="0">Todos los productos</option>
                            <option <?php if ($product_category == 1) echo "selected";?> value="1">Ropa</option>
                            <option <?php if ($product_category == 2) echo "selected";?> value="2">Zapatos</option>
                            <option <?php if ($product_category == 3) echo "selected";?> value="3">Accesorios</option>
                            <option <?php if ($product_category == 4) echo "selected";?> value="4">Belleza</option>
                            <option <?php if ($product_category == 5) echo "selected";?> value="5">Relojes, Lentes, Joyeria</option>
                            <option <?php if ($product_category == 6) echo "selected";?> value="6">Deportes</option>
                            <option <?php if ($product_category == 7) echo "selected";?> value="7">Electrónica</option>
                            <option <?php if ($product_category == 8) echo "selected";?> value="8">Celulares</option>
                            <option <?php if ($product_category == 9) echo "selected";?> value="9">Videojuegos</option>
                            <option <?php if ($product_category == 10) echo "selected";?> value="10">Juguetes</option>
                            <option <?php if ($product_category == 11) echo "selected";?> value="11">Linea Blanca</option>
                            <option <?php if ($product_category == 12) echo "selected";?> value="12">Muebles</option>
                            <option <?php if ($product_category == 13) echo "selected";?> value="13">Cocina</option>
                            <option <?php if ($product_category == 14) echo "selected";?> value="14">Vinos y Gourmet</option>
                            <option <?php if ($product_category == 15) echo "selected";?> value="15">Viajes</option>
                            <option <?php if ($product_category == 16) echo "selected";?> value="16">Mascotas</option>
                            <option <?php if ($product_category == 17) echo "selected";?> value="17">Ferreteria</option>
                            <option <?php if ($product_category == 18) echo "selected";?> value="18">Otra categoria</option>
                        </select>
                        <input class="btn btn-primary" type="submit" value="Filtrar">
                    </div>
                </form>
            </div>
            
            
            
        </div>
          
        <?php
            if (!array_key_exists('user_id', $_SESSION))
                $result = ($product_category == 0) ? readAllProducts() : readAllProductsByCategory($product_category); 
            else $result = ($product_category == 0) ? readAllFilteredProducts($_SESSION['user_id']) : readAllFilteredProductsByCategory($_SESSION['user_id'], $product_category);
            if ($data = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
                echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 my-3">';
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
                echo '</div>';
            } else
                require_once "components/no_products.html";
            mysqli_free_result($result);
        ?>
    </div>
</main>
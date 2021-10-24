<?php
    require_once "scripts/read_products.php";
    $result = readProductById($_GET['product_id']);
    $product = mysqli_fetch_array($result);
    mysqli_free_result($result);
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-6 py-5">
                <h2 class="h1">Edita la <span class="text-primary">información</span> de tu producto.</h2>
            </div>
        </div>
        <div class="row">
            <h2 class="h2">Datos del producto</h2>
        </div>
        <form action="./scripts/update_product.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="product_name" class="form-label">Nombre del producto</label>
                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Play Station 5, Xbox 360, iPhone 8" value="<?php
                    echo $product['PRODUCT_NAME'];?>" required>
            </div>

            <div class="mb-3">
                <label for="product_state" class="form-label">Estado del producto</label>
                <select class="form-select" id="product_state" name="product_state" aria-label="Estado del producto" required>
                    <option disabled value="">Selecciona una opción</option>
                    <option <?php if ($product['PRODUCT_STATE'] == 1) echo 'selected'?> value="1">Usado</option>
                    <option <?php if ($product['PRODUCT_STATE'] == 2) echo 'selected'?> value="2">Nuevo</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="product_category" class="form-label">Categoria del producto</label>
                <select class="form-select" id="product_category" name="product_category" aria-label="Categoria del producto" required>
                    <option disabled value="">Selecciona una categoria</option>
                    <option <?php if ($product['CATEGORY_ID'] == 1) echo 'selected'?> value="1">Ropa</option>
                    <option <?php if ($product['CATEGORY_ID'] == 2) echo 'selected'?> value="2">Zapatos</option>
                    <option <?php if ($product['CATEGORY_ID'] == 3) echo 'selected'?> value="3">Accesorios</option>
                    <option <?php if ($product['CATEGORY_ID'] == 4) echo 'selected'?> value="4">Belleza</option>
                    <option <?php if ($product['CATEGORY_ID'] == 5) echo 'selected'?> value="5">Relojes, Lentes, Joyeria</option>
                    <option <?php if ($product['CATEGORY_ID'] == 6) echo 'selected'?> value="6">Deportes</option>
                    <option <?php if ($product['CATEGORY_ID'] == 7) echo 'selected'?> value="7">Electrónica</option>
                    <option <?php if ($product['CATEGORY_ID'] == 8) echo 'selected'?> value="8">Celulares</option>
                    <option <?php if ($product['CATEGORY_ID'] == 9) echo 'selected'?> value="9">Videojuegos</option>
                    <option <?php if ($product['CATEGORY_ID'] == 10) echo 'selected'?> value="10">Juguetes</option>
                    <option <?php if ($product['CATEGORY_ID'] == 11) echo 'selected'?> value="11">Linea Blanca</option>
                    <option <?php if ($product['CATEGORY_ID'] == 12) echo 'selected'?> value="12">Muebles</option>
                    <option <?php if ($product['CATEGORY_ID'] == 13) echo 'selected'?> value="13">Cocina</option>
                    <option <?php if ($product['CATEGORY_ID'] == 14) echo 'selected'?> value="14">Vinos y Gourmet</option>
                    <option <?php if ($product['CATEGORY_ID'] == 15) echo 'selected'?> value="15">Viajes</option>
                    <option <?php if ($product['CATEGORY_ID'] == 16) echo 'selected'?> value="16">Mascotas</option>
                    <option <?php if ($product['CATEGORY_ID'] == 17) echo 'selected'?> value="17">Ferreteria</option>
                    <option <?php if ($product['CATEGORY_ID'] == 18) echo 'selected'?> value="18">Otra categoria</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="mainImageFile" class="form-label">Imagen principal</label>
                <input class="form-control" type="file" id="mainImageFile" name="product_main_img" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="product_description" class="form-label">Descripción del producto</label>
                <textarea class="form-control" id="product_description" name="product_description" rows="3" required><?php
                    echo $product['PRODUCT_DESCRIPTION'];?></textarea>
            </div>

            <div class="mb-3">
                <label for="optImageFiles" class="form-label">Imagenes adicionales</label>
                <input class="form-control" type="file" id="optImageFiles"  name="product_opc_imgs" accept="image/*" multiple>
            </div>

            <input type='hidden' name='product_id' value=<?php echo $product['PRODUCT_ID'];?>>

            <div class="mb-3 text-end">
                <a href="./index" class="btn btn-danger">Cancelar</a>
                <input class="btn btn-primary" type="submit" value="Actualizar producto">
            </div>
        </form>
    </div>
</main>
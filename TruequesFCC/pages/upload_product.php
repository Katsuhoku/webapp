<main>
    <div class="container">
        <div class="row">
            <div class="col-6 py-5">
                <h2 class="h1">Dale la <span class="text-primary">oportunidad</span> a alguien de tener lo que siempre estuvo <span class="text-primary">buscando</span>.</h2>
            </div>
        </div>
        <div class="row">
            <h2 class="h2">Datos del producto</h2>
        </div>
        <form action="./scripts/create_product.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="product_name" class="form-label">Nombre del producto</label>
                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Play Station 5, Xbox 360, iPhone 8" required>
            </div>

            <div class="mb-3">
                <label for="product_state" class="form-label">Estado del producto</label>
                <select class="form-select" id="product_state" name="product_state" aria-label="Estado del producto" required>
                    <option selected disabled value="">Selecciona una opción</option>
                    <option value="1">Usado</option>
                    <option value="2">Nuevo</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="product_category" class="form-label">Categoria del producto</label>
                <select class="form-select" id="product_category" name="product_category" aria-label="Categoria del producto" required>
                    <option selected disabled value="">Selecciona una categoria</option>
                    <option value="1">Ropa</option>
                    <option value="2">Zapatos</option>
                    <option value="3">Accesorios</option>
                    <option value="4">Belleza</option>
                    <option value="5">Relojes, Lentes, Joyeria</option>
                    <option value="6">Deportes</option>
                    <option value="7">Electrónica</option>
                    <option value="8">Celulares</option>
                    <option value="9">Videojuegos</option>
                    <option value="10">Juguetes</option>
                    <option value="11">Linea Blanca</option>
                    <option value="12">Muebles</option>
                    <option value="13">Cocina</option>
                    <option value="14">Vinos y Gourmet</option>
                    <option value="15">Viajes</option>
                    <option value="16">Mascotas</option>
                    <option value="17">Ferreteria</option>
                    <option value="18">Otra categoria</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="mainImageFile" class="form-label">Imagen principal</label>
                <input class="form-control" type="file" id="mainImageFile" name="product_main_img" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="product_description" class="form-label">Descripción del producto</label>
                <textarea class="form-control" id="product_description" name="product_description" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="optImageFiles" class="form-label">Imagenes adicionales</label>
                <input class="form-control" type="file" id="optImageFiles"  name="product_opc_imgs[]" accept="image/*" multiple>
            </div>

            <div class="mb-3 text-end">
                <a href="./index" class="btn btn-danger">Cancelar</a>
                <input class="btn btn-primary" type="submit" value="Subir producto">
            </div>
        </form>
    </div>
</main>
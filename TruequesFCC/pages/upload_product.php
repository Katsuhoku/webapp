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
        <form action="" method="POST">
            <div class="mb-3">
                <label for="product_name" class="form-label">Nombre del producto</label>
                <input type="text" class="form-control" id="product_name" placeholder="Play Station 5, Xbox 360, iPhone 8" required>
            </div>

            <div class="mb-3">
                <label for="product_state" class="form-label">Estado del producto</label>
                <select class="form-select" id="product_state" aria-label="Estado del producto" required>
                    <option selected disabled value="">Selecciona una opción</option>
                    <option value="1">Usado</option>
                    <option value="2">Nuevo</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="mainImageFile" class="form-label">Imagen principal</label>
                <input class="form-control" type="file" id="mainImageFile" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="product_description" class="form-label">Descripción del producto</label>
                <textarea class="form-control" id="product_description" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="optImageFiles" class="form-label">Imagenes adicionales</label>
                <input class="form-control" type="file" id="optImageFiles" accept="image/*" multiple>
            </div>

            <div class="mb-3 text-end">
                <a href="./index" class="btn btn-danger">Cancelar</a>
                <input class="btn btn-primary" type="submit" value="Subir producto">
            </div>
        </form>
    </div>
</main>
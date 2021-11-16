<?php
    function create_product_card(
        int $id = null, 
        String $name,
        String $description, 
        $date,
        int $state,
        int $category,
        $img
    ) {
        upper_card($name, $description, $date, $state, $category, $img);
        echo '
                    <div class="card-footer text-end">
                        <a href="product_details?product_id='.$id.'" class="btn btn-outline-primary">Ver detalles</a>
                        <a href="select_product?product_id='.$id.'" class="btn btn-primary">Ofertar</a>
                    </div>
                </div>   
            </div>
        ';
    }

    function create_own_product_card(
        int $id, 
        String $name,
        String $description, 
        String $date,
        String $state,
        int $category,
        $img
    ) {
        upper_card($name, $description, $date, $state, $category, $img);
        echo '
                    <div class="card-footer text-end">
                        <a onclick="return confirmDeletion()" href="./scripts/delete_temp_product?product_id='.$id.'" class="btn btn-danger">Eliminar</a>
                        <a href="edit_product?product_id='.$id.'" class="btn btn-outline-primary">Editar</a>
                    </div>
                </div>   
            </div>
        ';
    }

    function create_select_product_card(
        int $id,
        int $selected_product_id, 
        String $name,
        String $description, 
        String $date,
        String $state,
        int $category,
        $img
    ) {
        upper_card($name, $description, $date, $state, $category, $img);
        echo '
                    <div class="card-footer text-end">
                        <a href="./scripts/create_offer?product_id='.$id.'&selected_product_id='.$selected_product_id.'" class="btn btn-outline-primary">Seleccionar</a>
                    </div>
                </div>   
            </div>
        ';
    }

    function create_internet_user_product_card(
        int $id = null, 
        String $name,
        String $description, 
        $date,
        int $state,
        int $category,
        $img
    ) {
        upper_card($name, $description, $date, $state, $category, $img);
        echo '
                    <div class="card-footer text-end">
                        <a href="product_details?product_id='.$id.'" class="btn btn-outline-primary">Ver detalles</a>
                        <a href="register" class="btn btn-primary">Ofertar</a>
                    </div>
                </div>   
            </div>
        ';
    }

    function create_admin_product_card(
        int $id, 
        String $name,
        String $description, 
        String $date,
        String $state,
        int $category,
        $img
    ) {
        upper_card($name, $description, $date, $state, $category, $img);
        echo '
                    <div class="card-footer text-end">
                        <a onclick="return confirmDeletion()"  href="./scripts/delete_product?product_id='.$id.'" class="btn btn-danger">Eliminar</a>
                    </div>
                </div>   
            </div>
        ';
    }


    function create_restore_product_card(
        int $id, 
        String $name,
        String $description, 
        String $date,
        String $state,
        int $category,
        $img
    ) {
        upper_card($name, $description, $date, $state, $category, $img);
        echo '
                    <div class="card-footer text-end">
                        <a href="./scripts/restore_product?product_id='.$id.'" class="btn btn-outline-primary">Restaurar</a>
                        <a onclick="return confirmDeletion()"  href="./scripts/delete_product?product_id='.$id.'" class="btn btn-danger">Eliminar</a>
                    </div>
                </div>   
            </div>
        ';
    }

    function upper_card(
        String $name,
        String $description, 
        $date,
        int $state,
        int $category,
        $img) {
        echo '
            <div class="col">
                <div class="card h-100 shadow mb-5 bg-light" style="border-radius: 16px; --bs-bg-opacity: .8;">
                    <div class="wrapper bg-white" style="border-radius: 16px 16px 0px 0px;">
                        <img class="card-img-top" src="products-img/'.($img == null ? "image-holder.png" : $img ).'" alt="'.$name.'" style="border-radius: 16px 16px 0px 0px;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">'.$name.'</h5>
                        <p class="card-text"><small class="text-muted">Fecha de publicación: '.(new DateTime($date))->format('d-M-Y').'</small></p>
                        <p class="card-text">Estado: '.($state == 1 ? "Usado" : "Nuevo").'</p>
                        <p class="card-text">Categoria: '.getCategoryName($category).'</p>
                        <p class="card-text">'.$description.'</p>
                    </div>
        ';
    }

    function create_product_details_card(
        String $name,
        String $description, 
        $date,
        int $state,
        int $category
    ){
        echo '
            <div class="col">
                <p class="h2 text-center">Datos del <span class="text-primary">producto</span></p>
                <div class="card h-100 shadow mb-5 bg-light" style="border-radius: 16px; --bs-bg-opacity: .75;">
                    <div class="card-body">
                        <h5 class="card-title">'.$name.'</h5>
                        <p class="card-text"><small class="text-muted">Fecha de publicación: '.(new DateTime($date))->format('d-M-Y').'</small></p>
                        <p class="card-text">Estado: '.($state == 1 ? "Usado" : "Nuevo").'</p>
                        <p class="card-text">Categoria: '.getCategoryName($category).'</p>
                        <p class="card-text">'.$description.'</p>
                    </div>
                </div>
            </div>
        ';
    }

    function getCategoryName($category) {
        switch ($category) {
            case 1: return "Ropa";
            case 2: return "Zapatos";
            case 3: return "Accesorios";
            case 4: return "Belleza";
            case 5: return "Relojes, Lentes, Joyeria";
            case 6: return "Deportes";
            case 7: return "Electrónica";
            case 8: return "Celulares";
            case 9: return "Videojuegos";
            case 10: return "Juguetes";
            case 11: return "Linea Blanca";
            case 12: return "Muebles";
            case 13: return "Cocina";
            case 14: return "Vinos y Gourmet";
            case 15: return "Viajes";
            case 16: return "Mascotas";
            case 17: return "Ferreteria";
            default: return "Otra";
        }
    }
?>

<?php
    function create_product_card(
        int $id = null, 
        String $name,
        String $description, 
        $date,
        int $state,
        String $img = "./img/logo.png"
    ) {
        upper_card($name, $description, $date, $state, $img);
        echo '
                    <div class="card-body text-end">
                        <a href="#" class="btn btn-outline-primary">Ver detalles</a>
                        <a href="#" class="btn btn-primary">Ofertar</a>
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
        String $img = "./img/logo.png"
    ) {
        upper_card($name, $description, $date, $state, $img);
        echo '
                    <div class="card-body text-end">
                        <a onclick="return confirmDeletion()" href="./scripts/delete_product?product_id='.$id.'" class="btn btn-danger">Eliminar</a>
                        <a href="edit_product?product_id='.$id.'" class="btn btn-outline-primary">Editar</a>
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
        String $img = "./img/logo.png") {
        echo '
            <div class="col">
                <div class="card h-100 shadow mb-5 bg-white" style="border-radius: 16px; --bs-bg-opacity: .8;">
                    <img class="card-img-top" src="'.$img.'" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">'.$name.'</h5>
                        <p class="card-text"><small class="text-muted">Fecha de publicación: '.(new DateTime($date))->format('d-M-Y').'</small></p>
                        <p class="card-text">Estado: '.($state == 1 ? "Usado" : "Nuevo").'</p>
                        <p class="card-text">'.$description.'</p>
                    </div>
        ';
    }
?>
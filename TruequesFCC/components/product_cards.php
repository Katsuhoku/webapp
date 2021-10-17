<?php
    function create_product_card(
        int $id = null, 
        String $name = "Nombre del producto",
        String $description = "Descripción del producto", 
        String $date = "27/10/2021",
        String $state = null,
        String $img = "./img/logo.png"
    ) {
        echo '
            <div class="col">
                <div class="card h-100 shadow mb-5" style="border-radius: 16px;">
                    <img class="card-img-top" src="'.$img.'" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">'.$name.'</h5>
                        <p class="card-text"><small class="text-muted">Fecha de publicación: '.$date.'</small></p>
                        <p class="card-text">Estado: '.$state.'</p>
                        <p class="card-text">'.$description.'</p>
                    </div>
                    <div class="card-body text-end">
                        <a href="#" class="btn btn-outline-primary">Ver detalles</a>
                        <a href="#" class="btn btn-primary">Ofertar</a>
                    </div>
                </div>   
            </div>
        ';
    }
?>
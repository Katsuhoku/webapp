<?php
    function create_user_card(
        $name,
        $date,
        $username,
        $email,
        $direction,
        $wishlist
    ){
        echo '
            <div class="col">
                <p class="h2 text-center">Datos del <span class="text-primary">dueño</span></p>
                <div class="card h-100 shadow mb-3 bg-light" style="border-radius: 16px; --bs-bg-opacity: .7;">
                    <div class="card-body">
                        <h5 class="card-title">'.$username.'</h5>
                        <p class="card-text"><small class="text-muted">Miembro desde: '.(new DateTime($date))->format('d-M-Y').'</small></p>
                        <p class="card-text">Nombre: '.$name.'</p>
                        <p class="card-text">Email: '.$email.'</p>
                        <p class="card-text">Dirección: '.$direction.'</p>
                        <p class="card-text">Lista de deseos: '.$wishlist.'</p>
                    </div>    
                </div>
            </div>
        ';
    }
?>

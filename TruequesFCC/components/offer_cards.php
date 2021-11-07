<?php
    require_once 'product_cards.php';
    
    function create_my_offer_card(
        int $offer_id,
        int $offer_state,
        int $id_1 = null, 
        String $name_1,
        String $description_1, 
        $date_1,
        int $state_1,
        int $category_1,
        $img_1,
        int $id_2 = null, 
        String $name_2,
        String $description_2, 
        $date_2,
        int $state_2,
        int $category_2,
        $img_2
    ){
        echo '
            <div class="container py-3">
                <div class="card h-100 shadow bg-light" style="border-radius: 16px; --bs-bg-opacity: .8;">
                    <div class="row ">
        ';
        create_my_offer_left_card($id_1, $name_1, $description_1, $date_1, $state_1, $category_1, $img_1);
        echo    '
                    <div class="col-md-2 d-flex flex-wrap align-items-center">
                        <img src="products-img/exchange.png" class="w-100">
                    </div>
        ';

        create_my_offer_right_card($id_2, $name_2, $description_2, $date_2, $state_2, $category_2, $img_2);

        echo '
                    </div>
        ';

        switch ($offer_state) {
            case 1: deleteable_card_footer($offer_id);
                break;
            case 2: closed_card_footer($offer_id);
                break;
            case 3: finalizable_card_footer($offer_id);
                break;
            case 4: declined_card_footer($offer_id);
                break;
            default: finalized_card_footer($offer_id);
                break;
        }
        echo '
                </div>
            </div>        
        ';
    }

    function create_offer_card(
        int $offer_id,
        int $offer_state,
        int $id_1 = null, 
        String $name_1,
        String $description_1, 
        $date_1,
        int $state_1,
        int $category_1,
        $img_1,
        int $id_2 = null, 
        String $name_2,
        String $description_2, 
        $date_2,
        int $state_2,
        int $category_2,
        $img_2
    ){
        echo '
            <div class="container py-3">
                <div class="card h-100 shadow bg-light" style="border-radius: 16px; --bs-bg-opacity: .8;">
                    <div class="row ">
        ';
        create_offer_left_card($id_1, $name_1, $description_1, $date_1, $state_1, $category_1, $img_1);
        echo    '
                    <div class="col-md-2 d-flex flex-wrap align-items-center">
                        <img src="products-img/exchange.png" class="w-100">
                    </div>
        ';

        create_offer_right_card($id_2, $name_2, $description_2, $date_2, $state_2, $category_2, $img_2);

        echo '
                    </div>
        ';
        switch ($offer_state) {
            case 1: declinable_acceptable_card_footer($offer_id);
                break;
            case 2: closed_card_footer($offer_id);
                break;
            case 3: cancellable_card_footer($offer_id);
                break;
            case 4: declined_card_footer($offer_id);
                break;
            default: finalized_card_footer($offer_id);
                break;
        }
        echo '
                </div>
            </div>        
        ';
    }

    function create_my_offer_left_card(
        int $id = null, 
        String $name,
        String $description, 
        $date,
        int $state,
        int $category,
        $img
    ) {
        echo '
            <div class="col-md-2 d-flex flex-wrap align-items-center">
                <img src="products-img/'.($img == null ? "image-holder.png" : $img ).'" class="w-100">
            </div>
        ';

        create_product_info_card("Ofreciste", $id, $name, $description, $date, $state, $category);
    }

    function create_offer_left_card(
        int $id = null, 
        String $name,
        String $description, 
        $date,
        int $state,
        int $category,
        $img
    ) {
        echo '
            <div class="col-md-2 d-flex flex-wrap align-items-center">
                <img src="products-img/'.($img == null ? "image-holder.png" : $img ).'" class="w-100">
            </div>
        ';

        create_product_info_card("Te ofrecieron", $id, $name, $description, $date, $state, $category);
    }
    
    function create_product_info_card(
        String $msg,
        int $id = null, 
        String $name,
        String $description, 
        $date,
        int $state,
        int $category
    ){
        echo '
            <div class="col-md-3 py-3 px-3">
                <div class="card-block px-3">
                    <h4 class="card-title text-primary">'.$msg.'</h4>
                    <h5 class="card-title">'.$name.'</h5>
                    <p class="card-text"><small class="text-muted">Fecha de publicación: '.(new DateTime($date))->format('d-M-Y').'</small></p>
                    <p class="card-text">Estado: '.($state == 1 ? "Usado" : "Nuevo").'</p>
                    <p class="card-text">Categoria: '.getCategoryName($category).'</p>
                    <p class="card-text">'.$description.'</p>
                    <div class="text-end">
                        <a href="product_details?product_id='.$id.'" class="btn btn-outline-primary">Ver detalles</a>
                    </div>
                </div>
            </div>
        ';
    }

    function create_my_offer_right_card(
        int $id = null, 
        String $name,
        String $description, 
        $date,
        int $state,
        int $category,
        $img
    ) {
        create_product_info_card("Solicitaste", $id, $name, $description, $date, $state, $category);
        echo '
            <div class="col-md-2 d-flex flex-wrap align-items-center">
                <img src="products-img/'.($img == null ? "image-holder.png" : $img ).'" class="w-100">
            </div>
        ';
    }

    function create_offer_right_card(
        int $id = null, 
        String $name,
        String $description, 
        $date,
        int $state,
        int $category,
        $img
    ) {
        create_product_info_card("Por", $id, $name, $description, $date, $state, $category);
        echo '
            <div class="col-md-2 d-flex flex-wrap align-items-center">
                <img src="products-img/'.($img == null ? "image-holder.png" : $img ).'" class="w-100">
            </div>
        ';
    }

    function deleteable_card_footer($offer_id) {
        echo '
            <div class="card-footer d-flex justify-content-between">
                <span class="h6 text-success">Abierta</span>
                <a class="btn btn-danger text-center" onclick="return confirmOfferDeletion()" href="./scripts/delete_offer?offer_id='.$offer_id.'">Eliminar</a>
            </div>
        ';
    }

    function declinable_acceptable_card_footer($offer_id) {
        echo '
            <div class="card-footer d-flex justify-content-between">
                <span class="h6 text-success">Abierta</span>
                <div>
                    <a href="./scripts/update_offer?offer_id='.$offer_id.'&offer_state=decline&p=2" class="btn btn-danger">Rechazar</a>
                    <a href="./scripts/update_offer?offer_id='.$offer_id.'&offer_state=accept&p=2" class="btn btn-outline-primary">Aceptar</a>
                </div>
            </div>
        ';
    }

    function declined_card_footer($offer_id) {
        echo '
            <div class="card-footer d-flex justify-content-between">
                <span class="h6 text-danger">Rechazada</span>
                <div>
                    <a class="btn btn-danger text-center" onclick="return confirmOfferDeletion()" href="./scripts/delete_temp_offer?offer_id='.$offer_id.'">Eliminar</a>
                </div>
            </div>
        ';
    }

    function cancellable_card_footer($offer_id) {
        echo '
            <div class="card-footer d-flex justify-content-between">
                <span class="h6 text-success">En progeso</span>
                <div>
                    <a class="btn btn-danger text-center" onclick="return confirmOfferCancel()" href="./scripts/update_offer?offer_id='.$offer_id.'&offer_state=open&p=1">Cancelar</a>
                </div>
            </div>
        ';
    }

    function accepted_card_footer($offer_id) {
        echo '
            <div class="card-footer d-flex justify-content-between">
                <span class="h6 text-success">En progeso</span>
                <a class="btn btn-danger text-center" onclick="return confirmOfferDeletion()" href="./scripts/delete_offer?offer_id='.$offer_id.'">Eliminar</a>
            </div>
        ';
    }

    function closed_card_footer($offer_id) {
        echo '
            <div class="card-footer d-flex justify-content-between">
                <span class="h6 text-info">Cerrada</span>
                <a class="btn btn-danger text-center" onclick="return confirmOfferDeletion()" href="./scripts/delete_offer?offer_id='.$offer_id.'">Eliminar</a>
            </div>
        ';
    }

    function finalized_card_footer($offer_id) {
        echo '
            <div class="card-footer d-flex justify-content-between">
                <span class="h6 text-primary">Finalizada</span>
                <div>
                    <a class="btn btn-danger text-center" onclick="return confirmOfferDeletion()" href="./scripts/delete_offer?offer_id='.$offer_id.'">Eliminar</a>
                </div>
            </div>
        ';
    }

    function finalizable_card_footer($offer_id) {
        echo '
            <div class="card-footer d-flex justify-content-between">
                <span class="h6 text-success">En progeso</span>
                <div >
                    <a class="btn btn-danger text-center" onclick="return confirmOfferDeletion()" href="./scripts/delete_offer?offer_id='.$offer_id.'">Eliminar</a>
                    <a href="./scripts/update_offer?offer_id='.$offer_id.'&offer_state=completed&p=1" class="btn btn-outline-primary">Aceptar</a>
                </div>
            </div>
        ';
    }
?>
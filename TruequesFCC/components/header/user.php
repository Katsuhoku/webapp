<ul class="navbar-nav">
    <li class="nav-item m-2">
        <a class="nav-link 
        <?php echo ($current_page == 'index.php') ? 'active" aria-current="page"': '"';?> 
        href="./index">Inicio</a>
    </li>
    <li class="nav-item m-2">
        <a class="nav-link 
        <?php echo ($current_page == 'about_us.php') ? 'active" aria-current="page"': '"';?> 
        href="./about_us">Acerca de</a>
    </li>
    <li class="nav-item dropdown m-2">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Mi perfil
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <li><a class="dropdown-item" href="#">Mis publicaciones</a></li>
        <li><a class="dropdown-item" href="#">Mis ofertas</a></li>
        <li><a class="dropdown-item" href="#">Ofertas</a></li>
        <li><a class="dropdown-item" href="#">Editar perfil</a></li>
        </ul>
    </li>
    
    
    <li class="nav-item m-2">
        <a href="./upload_product" class="btn btn-outline-primary">Subir producto</a>
    </li>
    <li class="nav-item m-2">
        <a href="./scripts/logout" class="btn btn-outline-secondary">Cerrar sesión</a>
    </li>
</ul>
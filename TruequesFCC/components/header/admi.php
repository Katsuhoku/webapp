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
    <li class="nav-item m-2">
        <a href="scripts/logout" class="btn btn-outline-secondary">Cerrar sesión</a>
    </li>
</ul>
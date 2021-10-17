<ul class="navbar-nav">
    <li class="nav-item m-2">
        <a class="nav-link 
        <?php echo ($current_page == 'about_us.php') ? 'active" aria-current="page"': '"';?> 
        href="./about_us">Acerca de</a>
    </li>
    <li class="nav-item m-2">
        <button class="btn btn-outline-primary" onclick="location.href = './login'">Iniciar sesión</button>
    </li>
    <li class="nav-item m-2">
        <button class="btn btn-primary" onclick="location.href = './register'">Registrarse</button>
    </li>
</ul>
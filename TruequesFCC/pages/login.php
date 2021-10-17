<main>
    <section class="container">
        <div class="row">
            <div class="container col-6 align-self-center">
                <h2 class="h1">Inicio de <span class="text-primary">sesion</span></h2>
                <form action="./scripts/login_user.php" method="POST">
                    <div class="mb-3">
                        <label for="usernameOrEmail" class="form-label">Nombre de usuario / Correo electrónico:</label>
                        <input type="text" class="form-control" id="usernameOrEmail" name="usernameOrEmail" placeholder="Usuario95" value="<?php
                            if (array_key_exists('usernameOrEmail', $_SESSION))
                                echo $_SESSION['usernameOrEmail'];?>" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
    
                    <div class="mb-3">
                        <p>¿Aún no estas registrado? <a href="./register" class="link-primary">Registrate aquí</a></p>
                    </div>

                    <div class="mb-3 text-end">
                        <input class="btn btn-primary" type="submit" value="Iniciar sesión">
                    </div>

                    <?php
                        if (array_key_exists('login_error', $_SESSION)) {
                            switch ($_SESSION['login_error']) {
                                case 1:
                                    echo '<p class="text-danger">La contraseña ingresada es incorrecta. Intentalo nuevamente.</p>';
                                    break;
                                
                                default:
                                    echo '<p class="text-danger">No hay registro de nombre de usuario/correo electrónico: ' .$_SESSION['usernameOrEmail'];
                                    break;
                            }
                            session_destroy();
                        }
                    ?>
                </form>

            </div>
            <img class="col-6" src="img/trueque.png"> 
        </div>  
    </section>
</main>
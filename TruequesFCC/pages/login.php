<main>
    <section class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="form_title">Inicio de <span class="blue_text">sesion</span></h1>
                <form action="login_user.php" method="POST">
                    <div class="text_field">
                        <p class="text_field_title">Nombre de usuario / Correo electrónico:</p>
                        <input class="text_field_input" type="text" name="usernameOrEmail" placeholder="Usuario95" value="<?php
                            if (array_key_exists('usernameOrEmail', $_SESSION))
                                echo $_SESSION['usernameOrEmail'];?>" required>
                    </div>
    
                    <div class="text_field">
                        <p class="text_field_title">Contraseña:</p>
                        <input class="text_field_input" type="password" name="password" required>
                    </div>
    
                    <div class="inline_text_button">
                        <p class="simple_text">¿Aún no estas registrado? <a href="./register.php" class="button_blue_text">Registrate aquí</a> </p>
                    </div>
    
                    <div class="blue_button_container">
                        <input class="blue_button" type="submit" value="Iniciar Sesión">
                    </div>
                    <?php
                        if (array_key_exists('login_error', $_SESSION)) {
                            switch ($_SESSION['login_error']) {
                                case 1:
                                    echo '<p class="error_text">La contraseña ingresada es incorrecta. Intentalo nuevamente.</p>';
                                    break;
                                
                                default:
                                    echo '<p class="error_text">No hay registro de nombre de usuario/correo electrónico: ' .$_SESSION['usernameOrEmail'];
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
<main>
    <section class="container">
        <div class="row">
            <img class="col-6" src="img/trueque.png">   
            <div class="col-6">
                <h1 class="form_title">Registro</h1>
                <form action="register_user.php" method="POST">
                    <div class="text_field">
                        <p class="text_field_title">Nombre:</p>
                        <input class="text_field_input" type="text" name="name" placeholder="Nombre(s) apellido(s)" value="<?php
                            if (array_key_exists('name', $_SESSION))
                                echo $_SESSION['name'];?>" required>
                    </div>
                    <div class="text_field">
                        <p class="text_field_title">Nombre de usuario:</p>
                        <input class="text_field_input" type="text" name="username" placeholder="Robot95" value="<?php
                            if (array_key_exists('username', $_SESSION))
                                echo $_SESSION['username'];?>" required>
                    </div>
                    <div class="text_field">
                        <p class="text_field_title">Correo electrónico:</p>
                        <input class="text_field_input" type="text" name="email" placeholder="example@example.com" value="<?php
                            if (array_key_exists('email', $_SESSION))
                                echo $_SESSION['email'];?>" required>
                    </div>

                    <div class="text_field">
                        <p class="text_field_title">Contraseña:</p>
                        <input class="text_field_input" type="password" name="password" required>
                    </div>

                    <div class="inline_text_button">
                        <p class="simple_text">¿Ya tienes cuenta? <a href="./login.php" class="button_blue_text">Inicia Sesión</a></p>
                    </div>

                    <div class="blue_button_container">
                        <input class="blue_button" type="submit" value="Registrarse">
                    </div>

                    <?php
                        if (array_key_exists('register_error', $_SESSION)) {
                            switch ($_SESSION['register_error']) {
                                case 1:
                                    echo '<p class="error_text">El nombre de usuario: '.$_SESSION['username'].' ya ha sido registrado antes.</p>';
                                    break;
                                
                                case 2:
                                    echo '<p class="error_text">El correo electrónico: '.$_SESSION['email'].' ya ha sido registrado antes.</p>';
                                    break;
                                
                                default:
                                    echo '<p class="error_text">Algo salió mal, intentalo otra vez.';
                                    break;
                            }
                            session_destroy();
                        }
                    ?>
                </form>  
            </div>
        </div>
    </section>
</main>
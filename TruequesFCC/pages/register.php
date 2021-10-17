<main>
    <section class="container">
        <div class="row">
            <img class="col-6" src="img/trueque.png">   
            <div class="container col-6 align-self-center">
            <h2 class="h1">Registro</span></h2>
                <form action="./scripts/register_user.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre(s) apellido(s)" value="<?php
                            if (array_key_exists('name', $_SESSION))
                                echo $_SESSION['name'];?>" required>
                    </div>
                    <div class="invalid-feedback">
                        Proporcionanos tu nombre
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Robot95" value="<?php
                            if (array_key_exists('username', $_SESSION))
                                echo $_SESSION['username'];?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="example@example.com" value="<?php
                            if (array_key_exists('email', $_SESSION))
                                echo $_SESSION['email'];?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="direction" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direction" name="direction" placeholder="Avenida San Claudio, Blvrd 14 Sur, Cdad. Universitaria, 72592 Puebla, Pue." value="<?php
                            if (array_key_exists('direction', $_SESSION))
                                echo $_SESSION['direction'];?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <p class="simple_text">¿Ya tienes cuenta? <a href="./login" class="link-primary">Inicia sesión</a></p>
                    </div>

                    <div class="mb-3 text-end">
                        <input class="btn btn-primary" type="submit" value="Registrarse">
                    </div>

                    <?php
                        if (array_key_exists('register_error', $_SESSION)) {
                            switch ($_SESSION['register_error']) {
                                case 1:
                                    echo '<p class="text-danger">El nombre de usuario: '.$_SESSION['username'].' ya ha sido registrado antes.</p>';
                                    break;
                                
                                case 2:
                                    echo '<p class="text-danger">El correo electrónico: '.$_SESSION['email'].' ya ha sido registrado antes.</p>';
                                    break;
                                
                                default:
                                    echo '<p class="text-danger">Algo salió mal, intentalo otra vez.';
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
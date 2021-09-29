<!DOCTYPE html>
<html>
    <head>
        <title>Trueques FCC</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <header class="header">
            <a href="index.php" class="text_logo"><h2>Trueques FCC</h2></a>
            <nav class="navbar">
                <ul class="nav_list">
                    <li><a href="about_us.php"><span>Acerca de nosotros</span></a></li>
                    <li><a href="login.php"><span>Iniciar sesion</span></a></li>
                    <li><a href="register.php"><span>Registrarse</span></a></li>
                </ul>
            </nav>
        </header>

        <main>
            <section class="flex_container">
                <img src="images/trueque.png">   
                <div class="login_form">
                    <h1 class="form_title">Registro</h1>
                    <form action="register_user.php" method="POST">
                        <div class="text_field">
                            <p class="text_field_title">Nombre:</p>
                            <?php 
                                session_start();
                                echo '<input class="text_field_input" type="text" name="name" placeholder="Nombre(s) apellido(s)" value="';
                                echo "{$_SESSION['name']}";
                                echo '" required>';
                            ?>
                        </div>
                        <div class="text_field">
                            <p class="text_field_title">Nombre de usuario:</p>
                            <?php 
                                echo '<input class="text_field_input" type="text" name="username" placeholder="Robot95" value="';
                                echo "{$_SESSION['username']}";
                                echo '" required>';
                            ?>
                        </div>
                        <div class="text_field">
                            <p class="text_field_title">Correo electrónico:</p>
                            <?php 
                                echo '<input class="text_field_input" type="text" name="email" placeholder="example@example.com" value="';
                                echo "{$_SESSION['email']}";
                                echo '" required>';
                            ?>
                        </div>
        
                        <div class="text_field">
                            <p class="text_field_title">Contraseña:</p>
                            <input class="text_field_input" type="password" name="password" required>
                        </div>
        
                        <div class="inline_text_button">
                            <p class="simple_text">¿Ya tienes cuenta? <a href="./login.html" class="button_blue_text">Inicia Sesión</a></p>
                        </div>
        
                        <div class="blue_button_container">
                            <input class="blue_button" type="submit" value="Registrarse">
                        </div>

                        <p class="error_text">El nombre de usuario
                            <?php 
                                echo "{$_SESSION['username']}";
                                session_destroy();
                            ?>
                            ya ha sido registrado antes.</p>
                    </form>  
                </div>
            </section>
        </main>
        
        <footer class="footer">Todos los derechos reservados. Trueques FCC S.A. de C.V.</footer>
    </body>
</html>
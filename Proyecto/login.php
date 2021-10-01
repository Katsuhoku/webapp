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
                <div class="login_form">
                    <h1 class="form_title">Inicio de <span class="blue_text">sesion</span></h1>
                    <form action="login_user.php" method="POST">
                        <div class="text_field">
                            <p class="text_field_title">Nombre de usuario / Correo electrónico:</p>
                            <input class="text_field_input" type="text" name="usernameOrEmail" placeholder="Usuario95" required>
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
                    </form>
                </div>
                <img src="images/trueque.png">   
            </section>
        </main>

        <footer class="footer">Todos los derechos reservados. Trueques FCC S.A. de C.V.</footer>
    </body>
</html>
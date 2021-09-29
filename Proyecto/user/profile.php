<?php
    session_start();
    if ($_SESSION['type'] != 0) header("Location: index.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Trueques FCC</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../style.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <header class="header">
            <a href="index.php" class="text_logo"><h2>Trueques FCC</h2></a>
            <nav class="navbar">
                <ul class="nav_list">
                    <li><a href="profile.php"><span>Mi perfil</span></a></li>
                    <li><a href="../about_us.php"><span>Acerca de nosotros</span></a></li>
                    <li><a href="../salir.php"><span>Cerrar sesión</span></a></li>
                </ul>
            </nav>
        </header>

        <main>
            <h1 class="title, centered_title">Mi <span class="blue_text">perfil</span></h1>
            <h2 class="blue_text">Información de usuario</h2>
            <h3>Nombre de usuario: <?php 
                echo "{$_SESSION['username']}";
            ?></h3>
            <h3>Nombre: <?php 
                echo "{$_SESSION['name']}";
            ?></h3>
            <h4>Correo electrónico: <?php 
                echo "{$_SESSION['email']}";
            ?></h4>
            <section class="posts_section">
                <div class="posts_header">
                    <h2>Mis publicaciones</h2>
                </div>
                <div class="posts">
                    <div class="post">
                        <img src="../images/image-holder.png">
                        <div class="post_info_container">
                            <p class="id_post">#ID publicación</p>
                            <p class="product_name">Nombre del producto</p>
                            <p class="post_date_label">Fecha de publicación: <span class="post_date">dd/mm/aaaa</span></p>
                            <p class="product_description">Descripción del producto: Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt tempora in quasi animi laboriosam suscipit delectus cumque incidunt minus?</p>
                            <p class="asked_product">Productos solicitados: <span>Lista de productos solicitados</span></p>
                        </div>
                        <div class="post_buttons">
                            <button class="red_outline_button">Ver detalles</button>
                            <button class="red_button">Ofertar</button>
                        </div>
                    </div>
    
                    <div class="post">
                        <img src="../images/image-holder.png">
                        <div class="post_info_container">
                            <p class="id_post">#ID publicación</p>
                            <p class="product_name">Nombre del producto</p>
                            <p class="post_date_label">Fecha de publicación: <span class="post_date">dd/mm/aaaa</span></p>
                            <p class="product_description">Descripción del producto: Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt tempora in quasi animi laboriosam suscipit delectus cumque incidunt minus?</p>
                            <p class="asked_product">Productos solicitados: <span>Lista de productos solicitados</span></p>
                        </div>
                        <div class="post_buttons">
                            <button class="red_outline_button">Ver detalles</button>
                            <button class="red_button">Ofertar</button>
                        </div>
                    </div>

                    <div class="post">
                        <img src="../images/image-holder.png">
                        <div class="post_info_container">
                            <p class="id_post">#ID publicación</p>
                            <p class="product_name">Nombre del producto</p>
                            <p class="post_date_label">Fecha de publicación: <span class="post_date">dd/mm/aaaa</span></p>
                            <p class="product_description">Descripción del producto: Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt tempora in quasi animi laboriosam suscipit delectus cumque incidunt minus?</p>
                            <p class="asked_product">Productos solicitados: <span>Lista de productos solicitados</span></p>
                        </div>
                        <div class="post_buttons">
                            <button class="red_outline_button">Ver detalles</button>
                            <button class="red_button">Ofertar</button>
                        </div>
                    </div>

                    <div class="post">
                        <img src="../images/image-holder.png">
                        <div class="post_info_container">
                            <p class="id_post">#ID publicación</p>
                            <p class="product_name">Nombre del producto</p>
                            <p class="post_date_label">Fecha de publicación: <span class="post_date">dd/mm/aaaa</span></p>
                            <p class="product_description">Descripción del producto: Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt tempora in quasi animi laboriosam suscipit delectus cumque incidunt minus?</p>
                            <p class="asked_product">Productos solicitados: <span>Lista de productos solicitados</span></p>
                        </div>
                        <div class="post_buttons">
                            <button class="red_outline_button">Ver detalles</button>
                            <button class="red_button">Ofertar</button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="offers_section">
                <div class="offers_header">
                    <h2>Mis ofertas</h2>
                </div>
                <div class="offers">
                    <div class="offer">
                        <img src="../images/image-holder.png">
                        <div class="offer_info_container">
                            <p class="id_offer">#ID publicación</p>
                            <p class="product_name">Nombre del producto</p>
                            <p class="offer_date_label">Fecha de publicación: <span class="offer_date">dd/mm/aaaa</span></p>
                            <p class="product_description">Descripción del producto: Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt tempora in quasi animi laboriosam suscipit delectus cumque incidunt minus?</p>
                            <p class="id_asked_product">ID del producto solicitado:</p>
                            <p class="asked_product">Productos solicitados: <span>Lista de productos solicitados</span></p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        

        <footer class="footer">Todos los derechos reservados. Trueques FCC S.A. de C.V.</footer>
    </body>
</html>
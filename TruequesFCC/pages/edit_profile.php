<?php
    require_once "scripts/read_users.php";
    $result = readUserById($_SESSION['user_id']);
    $user = mysqli_fetch_array($result);
    mysqli_free_result($result);
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-6 py-5">
                <h2 class="h1">Edita la <span class="text-primary">información</span> de tu perfil.</h2>
            </div>
        </div>
        <div class="row">
            <h2 class="h2">Datos de tu perfil</h2>
        </div>
        <form action="./scripts/update_user.php" method="POST">
            <div class="mb-3">
                <label for="user_username" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="user_username" name="user_username" placeholder="Robot95" value="<?php
                    echo $user['USER_USERNAME'];?>" required disabled>
            </div>

            <div class="mb-3">
                <label for="user_email" class="form-label">Email de usuario</label>
                <input type="text" class="form-control" id="user_email" name="user_email" placeholder="example@example.com" value="<?php
                    echo $user['USER_EMAIL'];?>" required disabled>
            </div>

            <div class="mb-3">
                <label for="user_name" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Nombre(s) Apellido(s)" value="<?php
                    echo $user['USER_NAME'];?>" required>
            </div>

            <div class="mb-3">
                <label for="user_direction" class="form-label">Dirección del usuario</label>
                <textarea class="form-control" id="user_direction" name="user_direction" rows="3" required><?php
                    echo $user['USER_DIRECTION'];?></textarea>
            </div>

            <div class="mb-3">
                <label for="user_wishlist" class="form-label">Lista de deseo del usuario</label>
                <textarea class="form-control" id="user_wishlist" name="user_wishlist" rows="3"><?php
                    echo $user['USER_WISHLIST'];?></textarea>
            </div>

            <input type='hidden' name='user_id' value=<?php echo $user['USER_ID'];?>>

            <div class="mb-3 text-end">
                <a href="./index" class="btn btn-danger">Cancelar</a>
                <input class="btn btn-primary" type="submit" value="Actualizar perfil">
            </div>
        </form>
    </div>
</main>
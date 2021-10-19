<?php
    require_once "./read_users.php";

    session_start();
    $usernameOrEmail = $_REQUEST['usernameOrEmail'];
    $password = $_REQUEST['password'];

    $result = readUserByUsernmameOrEmail($usernameOrEmail);
    
    if ($row = mysqli_fetch_array($result)) {
        if ($row['USER_PASSWORD'] == $password) {
            $_SESSION['user_id'] = $row['USER_ID'];
            $_SESSION['username'] = $row['USER_USERNAME'];
            $_SESSION['name'] = $row['USER_NAME'];
            $_SESSION['email'] = $row['USER_EMAIL'];
            $_SESSION['direction'] = $row['USER_DIRECTION'];
            $_SESSION['type'] = $row['USER_TYPE'];
            header("Location: ../index");

            
        } else {
            $_SESSION['usernameOrEmail'] = $usernameOrEmail;
            $_SESSION['login_error'] = 1;
            header("Location: ../login");
        } 
    } else {
        $_SESSION['usernameOrEmail'] = $usernameOrEmail;
        $_SESSION['login_error'] = 2;
        header("Location: ../login");
    }

    mysqli_free_result($result);    
?>
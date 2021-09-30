<?php
    session_start();
    $usernameOrEmail=$_REQUEST['usernameOrEmail'];
    $password=$_REQUEST['password'];

    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "TRUEQUES_FCC");
    $result = mysqli_query($link, "select 
        USER_USERNAME,
        USER_NAME,
        USER_EMAIL,   
        USER_PASSWORD,
        USER_TYPE 
        from USERS where USER_USERNAME = '$usernameOrEmail' OR USER_EMAIL = '$usernameOrEmail'");
    
    if ($row = mysqli_fetch_array($result)) {
        if ($row['USER_PASSWORD'] == $password) {
            $_SESSION['username'] = $row['USER_USERNAME'];
            $_SESSION['name'] = $row['USER_NAME'];
            $_SESSION['email'] = $row['USER_EMAIL'];
            $_SESSION['type'] = $row['USER_TYPE'];

            require 'user_type.php';
        } else {
            $_SESSION['usernameOrEmail'] = $usernameOrEmail;
            header("Location: ./login_password_error.php");
        } 
    } else {
        $_SESSION['usernameOrEmail'] = $usernameOrEmail;
        header("Location: ./login_error.php");
    }

    mysqli_free_result($result);
    mysqli_close($link);
?>
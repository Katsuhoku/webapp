<?php
    require_once "./connection.php";

    session_start();
    $usernameOrEmail = $_REQUEST['usernameOrEmail'];
    $password = $_REQUEST['password'];

    $link = connect();
    $result = mysqli_query($link, "select 
        USER_ID,
        USER_USERNAME,
        USER_NAME,
        USER_EMAIL,
        USER_DIRECTION,   
        USER_PASSWORD,
        USER_TYPE 
        from USERS where USER_USERNAME = '$usernameOrEmail' OR USER_EMAIL = '$usernameOrEmail'");
    
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
    mysqli_close($link);
    
?>
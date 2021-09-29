<?php
    session_start();
    $name=$_REQUEST['name'];
    $username=$_REQUEST['username'];
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];

    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "TRUEQUES_FCC");
    $result = mysqli_query($link, "SELECT * FROM USERS WHERE USER_USERNAME = '$username' OR USER_EMAIL = '$email'");
    
    //El usuario no existe
    if (mysqli_num_rows($result) == 0) {
        $result2 = mysqli_query($link, "INSERT INTO USERS 
            (USER_USERNAME, USER_NAME, USER_EMAIL, USER_PASSWORD) VALUES 
            ('$username', '$name', '$email', '$password')"
        );

        if ($result2) {
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['type'] = mysqli_fetch_array($result)['USER_TYPE'];

            switch($_SESSION['type']) {
                case 1:
                    header("Location: ./admin/index.php");
                    break;
                default:
                    header("Location: ./user/index.php");
            }
        }
        mysqli_free_result($result2);
    //El usuario existe 
    } else {
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
        $row = mysqli_fetch_array($result);
        if ($row['USER_USERNAME'] == $username) {
            header("Location: register_username_error.php");
        } else if ($row['USER_EMAIL'] == $email) {
            header("Location: register_email_error.php");
        } else {
            header("Location: register_error.php");
        }
    }
    mysqli_free_result($result);
    
    mysqli_close($link);

?>
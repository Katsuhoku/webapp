<?php
    require_once "./connection.php";
    
    session_start();
    $name=$_REQUEST['name'];
    $username=$_REQUEST['username'];
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];

    $link = connect();
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
            header("Location: ../index");
        }
        mysqli_free_result($result2);
    //El usuario existe 
    } else {
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
        $row = mysqli_fetch_array($result);
        if ($row['USER_USERNAME'] == $username) {
            $_SESSION['register_error'] = 1;
        } else if ($row['USER_EMAIL'] == $email) {
            $_SESSION['register_error'] = 2;
        } else {
            $_SESSION['register_error'] = 3;
        }
        header("Location: ../register");
    }
    mysqli_free_result($result); 
    mysqli_close($link);
?>
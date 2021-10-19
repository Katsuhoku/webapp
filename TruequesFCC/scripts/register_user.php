<?php
    require_once "./read_users.php";
    
    session_start();
    $name=$_REQUEST['name'];
    $username=$_REQUEST['username'];
    $email=$_REQUEST['email'];
    $direction=$_REQUEST['direction'];
    $password=$_REQUEST['password'];

    $link = connect();
    $result = findUserByUsernmameOrEmail($username, $email);
    
    //El usuario no existe
    if (mysqli_num_rows($result) == 0) {
        $result2 = mysqli_query($link, "INSERT INTO USERS 
            (USER_USERNAME, USER_NAME, USER_EMAIL, USER_DIRECTION, USER_PASSWORD) VALUES 
            ('$username', '$name', '$email', '$direction', '$password')"
        );

        if ($result2) {
            mysqli_free_result($result);
            $result = findUserByUsernmameOrEmail($username, $email);
            $row = mysqli_fetch_array($result);
            $_SESSION['user_id'] = $row['USER_ID'];
            $_SESSION['username'] = $row['USER_USERNAME'];
            $_SESSION['name'] = $row['USER_NAME'];
            $_SESSION['email'] = $row['USER_EMAIL'];
            $_SESSION['direction'] = $row['USER_DIRECTION'];
            $_SESSION['type'] = $row['USER_TYPE'];
            header("Location: ../index");
        }
        mysqli_free_result($result2);
    //El usuario existe 
    } else {
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['direction'] = $direction;
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
<?php
    require_once 'connection.php';

    function findUserByUsernmameOrEmail($username, $email) {
        $link = connect();
        $result = mysqli_query($link, "select 
        USER_ID,
        USER_USERNAME,
        USER_NAME,
        USER_EMAIL,
        USER_DIRECTION,   
        USER_PASSWORD,
        USER_TYPE 
        FROM USERS WHERE USER_USERNAME = '$username' OR USER_EMAIL = '$email'");
        mysqli_close($link);
        return $result;
    }

    function readUserByUsernmameOrEmail($usernameOrEmail) {
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
        mysqli_close($link);
        return $result;
    }

    function readUserByUsernmame($username) {
        $link = connect();
        $result = mysqli_query($link, "select 
        USER_ID,
        USER_USERNAME,
        USER_NAME,
        USER_EMAIL,
        USER_DIRECTION,   
        USER_PASSWORD,
        USER_TYPE 
        from USERS where USER_USERNAME = '$username'");
        mysqli_close($link);
        return $result;
    }

    function readUserByEmail($email) {
        $link = connect();
        $result = mysqli_query($link, "select 
        USER_ID,
        USER_USERNAME,
        USER_NAME,
        USER_EMAIL,
        USER_DIRECTION,   
        USER_PASSWORD,
        USER_TYPE 
        from USERS where USER_EMAIL = '$email'");
        mysqli_close($link);
        return $result;
    }
?>
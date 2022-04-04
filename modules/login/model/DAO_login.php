<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/framework_php_GitHub';
include($path . "/model/connect.php");

class DAO_login {
    function validate_email($email){
        $select="SELECT * FROM users WHERE email = '$email'";
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $select)->fetch_object();
        connect::close($conexion);
        
        return $res;
    }

    function create_user($user, $pass, $email){
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 12]);
        $hashavatar = md5(strtolower(trim($user))); 
        $avatar = "https://placeimg.com/400/400/$hashavatar";

        $select="INSERT INTO users (username, passwd, email, avatar, type) VALUES ('$user', '$hashed_pass', '$email', '$avatar', 'client')";

        $conexion = connect::con();
        $res = mysqli_query($conexion, $select);
        connect::close($conexion);

        return $res;
    }

    function select_user($user){
        $select="SELECT * FROM users WHERE username = '$user'";

        $conexion = connect::con();
        $res = mysqli_query($conexion, $select)->fetch_object();
        connect::close($conexion);

        // echo json_encode($res);
        // exit;
        return $res;
    }
}
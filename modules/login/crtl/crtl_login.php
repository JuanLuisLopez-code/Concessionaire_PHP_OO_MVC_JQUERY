<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/framework_php_GitHub';
include($path . "/modules/login/model/DAO_login.php");
@session_start();


switch ($_GET['op']) {
    case 'login';
    include ('/modules/login/view/inc/login.html');
    break;

    
    case 'register_c';
        $dao = new DAO_login();
        if($dao->validate_email($_POST['email'])){
            echo json_encode("error");
        }else {
            $dao = new DAO_login();
            $rdo = $dao->create_user($_POST['user'], $_POST['pass'], $_POST['email']);
            if(!$rdo){
                echo json_encode("error al insetar la consulta");
            }else{
                echo json_encode("ok");
                exit;
            }
        }
    break;

    case 'login_c';
        $user = $_POST['user_login'];
        $pass = $_POST['passwd'];
        $dao = new DAO_login();
        $rdo = $dao->select_user($_POST['user_login']);

        try{
            if(!$rdo){
                echo json_encode("user no existe");
                exit;
            }else{
                if (password_verify($pass,$rdo->passwd)) {
                    $_SESSION['username'] = $rdo->username;
					$_SESSION['tiempo'] = time();
                    include($path . "/model/middleware_auth.php");
                    $token=midd_encode($user);
                    echo json_encode($token);
                    exit;
                }else {
                    echo json_encode("contraseña incorrecta");
                    exit;
                }
            }
        }catch (Exception $e){
            echo json_encode("error");
            exit;
        }
    break;

    case 'token_c';
        $token=($_POST['token']);

        include($path . "/model/middleware_auth.php");
        $check=midd_decode($token);
        $exp_time = json_decode($check);
        
        //comprobar si el token ha expirado o aun esta activo
        if($exp_time->exp == null || $exp_time->exp < time()){
            echo json_encode("Tiempo excedido");
            exit;
        } else {
            $user_check = json_decode($check);
            $dao = new DAO_login();
            $rdo = $dao->select_user($user_check->name);

            echo json_encode($rdo);
            exit;
        }
    break;
    
    case 'actividad';
        if (!isset($_SESSION["tiempo"])) {  
              echo json_encode("inactivo_fatal");
              exit;
        } else {
            if((time() - $_SESSION["tiempo"]) >= 1800) {  
                  echo json_encode("inactivo"); 
                  exit();
            }else{
                echo json_encode("activo");
                exit();
            }
        }
    break;

    case 'controluser':
        $token=($_POST['token']);
        if ($token){
            include($path . "/model/middleware_auth.php");
            $check_control=midd_decode($token);
            $name_token = json_decode($check_control);
        }        

        if(isset ($_SESSION['username'])&&($_SESSION['username'])==$name_token->name){
            echo json_encode("valido");
            exit();
        }
        echo json_encode("anonimo");
        exit();
       
    break;

    case 'refresh_token';
        $token=($_POST['token']);
        if ($token){
            include($path . "/model/middleware_auth.php");
            $check_control=midd_decode($token);
            $name_token = json_decode($check_control);
            $user = $name_token->name;            

            $token_restored=midd_encode($user);
            echo json_encode($token_restored);
            exit;
        }        
    break;

    case 'refresh_session';
        session_regenerate_id();
        echo json_encode("sesion restaurada");
        exit;
    break;

    //Drop de la cookie de Session, asi cuando hago un logout, se borra y vulve al usuario anonimo(con sesion nueva por el interval de protecturl()) y al ser 
    //usuario anonimo, si intentan hacer algo con el token se van al login directamente sin resultado alguno en el intento de hack
    case 'delete_session';
        setcookie("PHPSESSID","",time()-3600,"/");
        echo json_encode("sesion destruida");
        exit;
    break;
}
<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/framework_php_GitHub';
include($path . "/modules/shop/model/DAO_shop.php");
if (isset($_SESSION["tiempo"])) {  
    $_SESSION["tiempo"] = time(); //Devuelve la fecha actual
}


switch ($_GET['op']) {
    case 'list';
        include ('/modules/shop/view/inc/home_shop.html');
        break;

    case 'shopAll';
        $homeQuery = new DAO_shop();
        $selSlide = $homeQuery -> selectAll($_POST['total_prod'],$_POST['items_page']);
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;

    case 'details';
        $homeQuery = new DAO_shop();
        $selSlide = $homeQuery -> details($_GET['id']);
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;

    case 'moreCars';
        $homeQuery = new DAO_shop();
        $selSlide = $homeQuery -> moreCars($_POST['id'],$_POST['move'],$_POST['xpage']);
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;
        
    case 'visitas';
        $homeQuery = new DAO_shop();
        $selSlide = $homeQuery -> visitas($_POST['id']);
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;

    case 'print_filters';
        $homeQuery = new DAO_shop();
        $selSlide = $homeQuery -> print_filters();
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;

    case 'filter';
        $homeQuery = new DAO_shop();
        $selSlide = $homeQuery -> filters($_POST['filter'],$_POST['total_prod'],$_POST['items_page']);
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;

    case 'redirect';
        $homeQuery = new DAO_shop();
        $selSlide = $homeQuery -> redirect($_POST['filtros'],$_POST['total_prod'],$_POST['items_page']);
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;

    case 'search';
            $homeQuery = new DAO_shop();
            $selSlide = $homeQuery -> search($_POST['filters_search'],$_POST['total_prod'],$_POST['items_page']);
            if (!empty($selSlide)) {
                echo json_encode($selSlide);
            }
            else {
                echo "error";
            }
            break;

    case 'count';    
        $homeQuery = new DAO_shop();
        $selSlide = $homeQuery -> select_count();
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;

    case 'count_filters';    
        $homeQuery = new DAO_shop();
        $selSlide = $homeQuery -> select_count_filter($_POST['filter']);
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;

    case 'count_home';    
        $homeQuery = new DAO_shop();
        $selSlide = $homeQuery -> count_home($_POST['filtros']);
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;
    
    case 'count_search';    
        $homeQuery = new DAO_shop();
        $selSlide = $homeQuery -> count_search($_POST['filters_search']);
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;

    case 'load_likes';
        $token=($_POST['token']);
        if ($token){
            $jwt = parse_ini_file($path . "/model/jwt.ini");
            $secret = $jwt['secret'];

            include($path . "/model/JWT.php");
            $JWT = new JWT;
            
            $check_control = $JWT->decode($token, $secret);
            $name_token = json_decode($check_control);

            $dao = new DAO_shop();
            $rdo = $dao->select_load_likes($name_token->name);

            if (!$rdo){
                echo json_encode("no likes");
                exit;
            }else{
                echo json_encode($rdo);
                exit;
            }
        }  
    break;

    case 'load_likes_details';
        $token=($_POST['token']);
        $id=($_POST['id']);
        if ($token){
            $jwt = parse_ini_file($path . "/model/jwt.ini");
            $secret = $jwt['secret'];

            include($path . "/model/JWT.php");
            $JWT = new JWT;
            
            $check_control = $JWT->decode($token, $secret);
            $name_token = json_decode($check_control);

            $dao = new DAO_shop();
            $rdo = $dao->select_load_likes_details($name_token->name, $id);

            if (!$rdo){
                echo json_encode("no likes");
                exit;
            }else{
                echo json_encode($rdo);
                exit;
            }
        }  
    break;

    case 'control_likes';
        $token=($_POST['token']);
        $id=($_POST['id']);

        if ($token){
            $jwt = parse_ini_file($path . "/model/jwt.ini");
            $secret = $jwt['secret'];

            include($path . "/model/JWT.php");
            $JWT = new JWT;
            
            $check_control = $JWT->decode($token, $secret);
            $name_token = json_decode($check_control);


            $dao = new DAO_shop();
            $rdo = $dao->select_one_likes($name_token->name, $id);

            if (!$rdo){
                $dao2 = new DAO_shop();
                $rdo2 = $dao2->insert_likes($name_token->name,$id);
                echo json_encode($rdo2);
                exit;
            }else{                
                $dao2 = new DAO_shop();
                $rdo2 = $dao2->delete_likes($name_token->name,$id);
                echo json_encode($rdo2);
                exit;
                
            }
        }  

        echo json_encode($id);
        exit;
    break;
}
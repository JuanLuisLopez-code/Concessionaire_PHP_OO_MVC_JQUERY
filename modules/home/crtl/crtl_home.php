<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/framework_php_GitHub';
include($path . "/modules/home/model/DAO_home.php");
if (isset($_SESSION["tiempo"])) {  
    $_SESSION["tiempo"] = time(); //Devuelve la fecha actual
}

switch ($_GET['op']) {
    case 'list';
        include ('/modules/home/view/inc/homepage.html');
        break;
    
    case 'homePageSlide';
        $homeQuery = new DAO_home();
        $selSlide = $homeQuery -> selectBrand();
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }else {
            echo "error";
        }
        break;

    case 'homePageCat';
        $homeQuery = new DAO_home();
        $selCatBrand = $homeQuery -> selectCategoria();
        if (!empty($selCatBrand)) {
            echo json_encode($selCatBrand);
        }else{
            echo "error";
        }
        break;

    case 'homePageType';
        $homeQuery = new DAO_home();
        $selCatBrand = $homeQuery -> selectType();
        if (!empty($selCatBrand)) {
            echo json_encode($selCatBrand);
        }else{
            echo "error";
        }
        break;
}
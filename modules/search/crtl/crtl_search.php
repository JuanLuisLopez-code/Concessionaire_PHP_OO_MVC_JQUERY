<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/framework_php_GitHub';
include($path . "/modules/search/model/DAO_search.php");


switch ($_GET['op']) {

    case 'search_brand';
        $homeQuery = new DAO_search();
        $selSlide = $homeQuery -> search_brand();
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;

    case 'search_category_null';
        $homeQuery = new DAO_search();
        $selSlide = $homeQuery -> search_category_null();
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;

    case 'search_category';
        $homeQuery = new DAO_search();
        $selSlide = $homeQuery -> search_category($_POST['brand']);        
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;

    case 'autocomplete';
    try{
        $dao = new DAO_search();
        if (!empty($_POST['brand']) && empty($_POST['category'])){
            $rdo = $dao->select_only_brand($_POST['complete'], $_POST['brand']);
        }else if(!empty($_POST['brand']) && !empty($_POST['category'])){
            $rdo = $dao->select_brand_category($_POST['complete'], $_POST['brand'], $_POST['category']);
        }else if(empty($_POST['brand']) && !empty($_POST['category'])){
            $rdo = $dao->select_only_category($_POST['category'], $_POST['complete']);
        }else {
            $rdo = $dao->select_city($_POST['complete']);
        }
    }catch (Exception $e){
        echo json_encode("catch");
        exit;
    }
    if(!$rdo){
        echo json_encode("rdo!!!");
        exit;
    }else{
        $dinfo = array();
        foreach ($rdo as $row) {
            array_push($dinfo, $row);
        }
        echo json_encode($dinfo);
    }
    break; 
}
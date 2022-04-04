<?php
    switch($_GET['modules']){
        case "car":
        include_once('modules/'.$_GET['modules'].'/crtl/crtl_'.$_GET['modules'].'.php');
        break;

        case "exception";
        include_once('modules/'.$_GET['modules'].'/crtl/crtl_'.'error'.'.php');
			break;

        case "home";
        include_once('modules/'.$_GET['modules'].'/crtl/crtl_'.$_GET['modules'].'.php');
			break;

        case "shop";
        include_once('modules/'.$_GET['modules'].'/crtl/crtl_'.$_GET['modules'].'.php');
            break;
            
        case "login";
        include_once('modules/'.$_GET['modules'].'/crtl/crtl_'.$_GET['modules'].'.php');
            break;
		
        default:
            include_once('index.php');
        }
?>
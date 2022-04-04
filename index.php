<?php

    include_once('view/inc/debug.php');
    include_once('view/inc/header.html');
    include_once('view/inc/menu.html');
    
?>

<?php

    if ((isset($_GET['modules'])) && ($_GET['modules'] === 'home') ){
    include("modules/home/view/inc/homepage.html");
    }
    else
    if ((isset($_GET['modules'])) && ($_GET['modules'] === 'login') ){
        include("modules/login/view/inc/login.html");
        }

    else
    if ((isset($_GET['modules'])) && ($_GET['modules'] === 'shop') ){
        include("modules/shop/view/inc/home_shop.html");
        }

    else
    if ((isset($_GET['modules'])) && ($_GET['modules'] === 'exception') ){
		  include("modules/exception/view/inc/503.html");

    }
    else
    if ((isset($_GET['modules'])) && ($_GET['modules'] === 'car') ){
		include("view/inc/top_page_car.html");
	}else{
        include("modules/home/view/inc/homepage.html");
    }
?>

<?php
include_once('view/inc/pages.php');
include_once('view/inc/footer.html');
?>

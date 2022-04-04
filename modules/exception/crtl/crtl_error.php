<?php
include("modules/exception/model/DAO_error.php");
        switch($_GET['op']){

                case '404';
                
                include_once("modules/exception/view/inc/404.php");

                break;

                case '503';

                        $daoerror = new DAO_error();
                        $rdo = $daoerror->insert_error();

                //include("modules/exception/view/inc/503.html");

                break;

        }

?>
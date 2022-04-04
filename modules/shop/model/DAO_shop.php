<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/framework_php_GitHub';
include($path . "/model/connect.php");

class DAO_shop {
    
    function selectAll($total_prod, $items_page) {

       $select = "SELECT c.*, ct.cat_name, t.type_name, b.brand_name
       FROM car c, categoria ct, type t, brand b
       WHERE c.categoria=ct.id_categoria AND c.combustible=t.id_type AND c.marca = b.id_brand 
       ORDER BY c.visitas DESC
       LIMIT $total_prod, $items_page";

        $conexion = connect::con();
        $res = mysqli_query($conexion, $select);
        connect::close($conexion);

        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

    function details($id) {
        
        $id = $_GET['id'];

        $select = "SELECT c.*, i.img, b.brand_name, t.type_name, ca.*
        FROM car c, car_img i, brand b, type t, categoria ca
        WHERE c.id = i.car AND c.marca = b.id_brand AND c.combustible = t.id_type AND c.id = '$id' AND c.categoria = ca.id_categoria";
 
         $conexion = connect::con();
         $res = mysqli_query($conexion, $select);
         connect::close($conexion);
 
         $retrArray = array();
         if ($res -> num_rows > 0) {
             while ($row = mysqli_fetch_assoc($res)) {
                 $retrArray[] = $row;
             }
         }
         return $retrArray;
    }

    function moreCars($id, $move, $xpage) {
        $select = "SELECT ca.cat_name, c.*, b.brand_name, t.type_name
        FROM car c, categoria ca, brand b, type t
        WHERE c.categoria = (SELECT cc.categoria
                            FROM car cc
                            WHERE cc.id = '$id') AND c.categoria = ca.id_categoria AND b.id_brand = c.marca AND t.id_type = c.combustible LIMIT $move, $xpage";
 
        $conexion = connect::con();
        $res = mysqli_query($conexion, $select);
        connect::close($conexion);
 
        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

    function visitas($id) {

        $select = "UPDATE car c
        SET visitas = visitas+1
        WHERE c.id = '$id'";
 
        $conexion = connect::con();
        $res = mysqli_query($conexion, $select);
        connect::close($conexion);
 
        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

    function print_filters() {
        
        $select = "SELECT * FROM car";
 
        $conexion = connect::con();
        $res = mysqli_query($conexion, $select);
        connect::close($conexion);

        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

    function filters($filter,$total_prod, $items_page){
        $consulta = "SELECT c.*, i.img, ca.cat_name, t.type_name, b.brand_name
        FROM car c INNER JOIN car_img i INNER JOIN categoria ca INNER JOIN type t INNER JOIN brand b
        ON c.id = i.car AND  i.img LIKE ('%1%') AND c.categoria = ca.id_categoria AND c.combustible = t.id_type AND c.marca = b.id_brand";
        
            for ($i=0; $i < count($filter); $i++){
                if ($i==0){
                    if ($filter[$i][0] == 'orden'){
                        $consulta.= " ORDER BY " . $filter[$i][1] . " ASC";

                    }else{
                    $consulta.= " WHERE c." . $filter[$i][0] . "=" . $filter[$i][1];
                    }
                }else {
                    if ($filter[$i][0] == 'orden'){
                        $consulta.= " ORDER BY " . $filter[$i][1] . " ASC";

                    }else{$consulta.= " AND c." . $filter[$i][0] . "=" . $filter[$i][1];}
                }        
            }
            $consulta.= " LIMIT $total_prod, $items_page";

        $conexion = connect::con();
        $res = mysqli_query($conexion, $consulta);
        connect::close($conexion);

        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

    function redirect($filtros,$total_prod, $items_page){

        $select = "SELECT *
        FROM car c, brand b, car_img ci, categoria ca, type t
        WHERE c.marca = b.id_brand AND c.categoria = ca.id_categoria 
        AND c.combustible = t.id_type AND c.id = ci.car AND ci.img LIKE '%1%'";


        if ($filtros[0]['categoria']){
            $prueba = $filtros[0]['categoria'][0];
            $select.= " AND ca.cat_name = '$prueba'";
        }
        else if($filtros[0]['type']) {
            $prueba = $filtros[0]['type'][0];
            $select.= " AND t.type_name = '$prueba'";
        }
        else if($filtros[0]['marca']) {
            $prueba = $filtros[0]['marca'][0];
            $select.= " AND c.marca = '$prueba'";
        }
        $select.= " LIMIT $total_prod, $items_page";
       
        $conexion = connect::con();
        $res = mysqli_query($conexion, $select);
        connect::close($conexion);

        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }
    
    function search($filters_search,$total_prod, $items_page){
       
        $count = 1;

        $city = ($filters_search[0]['city'][0]);
        $city_2 = ($filters_search[2]['city'][0]);

        $consulta = "SELECT c.*, i.img, ca.cat_name, t.type_name, b.brand_name
        FROM car c INNER JOIN car_img i INNER JOIN categoria ca INNER JOIN type t INNER JOIN brand b
        ON c.id = i.car AND  i.img LIKE ('%1%') AND c.categoria = ca.id_categoria AND c.combustible = t.id_type AND c.marca = b.id_brand";

        for ($i=0; $i < $count; $i++){
            if ($count==1){
                if ($filters_search[0]['brand'][0]){
                    $consulta .= " WHERE c.marca = " . ($filters_search[0]['brand'][0]);
                    $count = 2;
                }
                else if ($filters_search[0]['category'][0]){
                    $consulta .= " WHERE c.categoria = " . ($filters_search[0]['category'][0]);
                    $count = 2;
                }
                else if ($filters_search[0]['city'][0]){
                    $consulta .= " WHERE c.city = " . "'$city'";
                    $count = 2;
                }
            }else{
                if ($filters_search[1]['category'][0]){
                    $consulta .= " AND c.categoria = " . ($filters_search[1]['category'][0]);
                }
                if ($filters_search[2]['city'][0]){
                    $consulta .= " AND c.city = " . "'$city_2'";
                }
            }
        }
        $consulta.= " LIMIT $total_prod, $items_page";
       
        $conexion = connect::con();
        $res = mysqli_query($conexion, $consulta);
        connect::close($conexion);

        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

    function select_count(){
        $select = "SELECT COUNT(*) contador
        FROM car";

        $conexion = connect::con();
        $res = mysqli_query($conexion, $select);
        connect::close($conexion);

        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

    function select_count_filter($filter){
        $consulta = "SELECT COUNT(*) contador
        FROM car c INNER JOIN car_img i INNER JOIN categoria ca INNER JOIN type t INNER JOIN brand b
        ON c.id = i.car AND  i.img LIKE ('%1%') AND c.categoria = ca.id_categoria AND c.combustible = t.id_type AND c.marca = b.id_brand";
                 
            for ($i=0; $i < count($filter); $i++){
                if ($i==0){
                    if ($filter[$i][0] == 'orden'){
                        $consulta.= " ORDER BY " . $filter[$i][1] . " ASC";

                    }
                    else{
                    $consulta.= " WHERE c." . $filter[$i][0] . "=" . $filter[$i][1];
                    }
                }
                else {
                    if ($filter[$i][0] == 'orden'){
                        $consulta.= " ORDER BY " . $filter[$i][1] . " ASC";

                    }
                    else{$consulta.= " AND c." . $filter[$i][0] . "=" . $filter[$i][1];}
                }        
            }   
       
        $conexion = connect::con();
         $res = mysqli_query($conexion, $consulta);
         connect::close($conexion);

         $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

    function count_home($filtros){

        $select = "SELECT COUNT(*) contador
        FROM car c, brand b, car_img ci, categoria ca, type t
        WHERE c.marca = b.id_brand AND c.categoria = ca.id_categoria 
        AND c.combustible = t.id_type AND c.id = ci.car AND ci.img LIKE '%1%'";

        if ($filtros[0]['categoria']){
            $prueba = $filtros[0]['categoria'][0];
            $select.= " AND ca.cat_name = '$prueba'";
        }
        else if($filtros[0]['type']) {
            $prueba = $filtros[0]['type'][0];
            $select.= " AND t.type_name = '$prueba'";
        }
        else if($filtros[0]['marca']) {
            $prueba = $filtros[0]['marca'][0];
            $select.= " AND c.marca = '$prueba'";
        }
       
        $conexion = connect::con();
        $res = mysqli_query($conexion, $select);
        connect::close($conexion);

        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

    function count_search($filters_search){
        
        $count = 1;

        $city = ($filters_search[0]['city'][0]);
        $city_2 = ($filters_search[2]['city'][0]);

        $consulta = "SELECT COUNT(*) contador
        FROM car c INNER JOIN car_img i INNER JOIN categoria ca INNER JOIN type t INNER JOIN brand b
        ON c.id = i.car AND  i.img LIKE ('%1%') AND c.categoria = ca.id_categoria AND c.combustible = t.id_type AND c.marca = b.id_brand";

        for ($i=0; $i < $count; $i++){
            if ($count==1){
                if ($filters_search[0]['brand'][0]){
                    $consulta .= " WHERE c.marca = " . ($filters_search[0]['brand'][0]);
                    $count = 2;
                }
                else if ($filters_search[0]['category'][0]){
                    $consulta .= " WHERE c.categoria = " . ($filters_search[0]['category'][0]);
                    $count = 2;
                }
                else if ($filters_search[0]['city'][0]){
                    $consulta .= " WHERE c.city = " . "'$city'";
                    $count = 2;
                }
            }else{
                if ($filters_search[1]['category'][0]){
                    $consulta .= " AND c.categoria = " . ($filters_search[1]['category'][0]);
                }
                if ($filters_search[2]['city'][0]){
                    $consulta .= " AND c.city = " . "'$city_2'";
                }
            }
        }
       
        $conexion = connect::con();
        $res = mysqli_query($conexion, $consulta);
        connect::close($conexion);

        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }
    
    function select_load_likes($user){
        $consulta="SELECT * FROM likes WHERE username='$user'";   
       
        $conexion = connect::con();
        $res = mysqli_query($conexion, $consulta);
        connect::close($conexion);

        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

    function select_load_likes_details($user, $id){
        $consulta="SELECT * FROM likes WHERE username='$user' AND car_id='$id'";   
       
        $conexion = connect::con();
        $res = mysqli_query($conexion, $consulta)->fetch_object();
        connect::close($conexion);

        return $res;
    }

    function select_one_likes($user, $id){
        $consulta="SELECT * FROM likes WHERE username='$user' AND car_id='$id'";   
       
        $conexion = connect::con();
        $res = mysqli_query($conexion, $consulta)->fetch_object();
        connect::close($conexion);

        return $res;
    }

    function insert_likes($user, $id){
        $consulta = "INSERT INTO likes (username, car_id) VALUES ('$user','$id')";

        $conexion = connect::con();
        $res = mysqli_query($conexion, $consulta);
        connect::close($conexion);

        return $res;
    }

    function delete_likes($user, $id){
        $consulta = "DELETE FROM `likes` WHERE username='$user' AND car_id='$id'";

        $conexion = connect::con();
        $res = mysqli_query($conexion, $consulta);
        connect::close($conexion);

        return $res;
    }
}
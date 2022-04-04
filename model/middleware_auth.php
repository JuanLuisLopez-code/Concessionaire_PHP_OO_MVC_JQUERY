<?php
include($_SERVER['DOCUMENT_ROOT'] . '/framework_php_GitHub/model/JWT.php');
function midd_encode($user){
    $jwt = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/framework_php_GitHub/model/jwt.ini');
    $header = $jwt['header'];
    $secret = $jwt['secret'];
    $payload = '{"iat":"'.time().'","exp":"'.time() + (610).'","name":"'.$user.'"}';
    
    $JWT = new JWT;
    $token = $JWT->encode($header, $payload, $secret);
   
    return $token;
}
function midd_decode($token){
    $jwt = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/framework_php_GitHub/model/jwt.ini');
    $secret = $jwt['secret'];

    include($path . "/model/JWT.php");
    $JWT = new JWT;
    $check = $JWT->decode($token, $secret);

    return $check;
}
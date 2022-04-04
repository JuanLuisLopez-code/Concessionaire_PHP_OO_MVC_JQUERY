<?php
  include_once("model/connect.php");

//   $data = 'dao';
//   die('<script>console.log('.json_encode( $data ) .');</script>');

    class DAO_error{
        
        

        function insert_error(){

            //die('<script>console.log('.json_encode( $_GET['error'] ) .');</script>');

            $error = $_GET['error'];
            $type = $_GET['type'];

            //die('<script>console.log('.json_encode( $error ) .');</script>');
            $sql = "INSERT INTO log_errors (error, type, fecha_hora)" . "VALUES ('$error', '$type', NOW()) " ;
            $conexion = connect::con();
                  $res = mysqli_query($conexion, $sql);
                  connect::close($conexion);
              return $res;
          }

}

?>
<?php
  $path = $_SERVER['DOCUMENT_ROOT'] . '/framework_php';
  include($path . "/model/connect.php");
  
//include_once("model/connect.php");

  // $data = 'dao';
  // die('<script>console.log('.json_encode( $data ) .');</script>');

    class DAO_car{
        
        function insert_car($datos){

            //  $data = 'hola insert_car';
            //  die('<script>console.log('.json_encode( $data ) .');</script>');

              $marca=$datos['marca'];
              $modelo=$datos['modelo'];
              $estado=$datos['estado'];
              $num_bast=$datos['num_bast'];
              $matricula=$datos['matricula'];
              $color=$datos['color'];
              $puertas=$datos['puertas'];
              $combustible=$datos['combustible'];
              $f_matriculacion=$datos['fecha'];
              $ex_visual = null;
              foreach ($datos['ex_visual'] as $indice) {
                $ex_visual=$ex_visual."$indice:";
              }
              foreach ($datos['ex_tecnico'] as $indice) {
                $ex_tecnico=$ex_tecnico."$indice:";
              }

            

              $sql = "INSERT INTO car (marca, modelo, estado, num_bast, matricula, color, puertas, combustible, f_matriculacion, ex_visual, ex_tecnico)"
                . " VALUES ('$marca', '$modelo', '$estado', '$num_bast', '$matricula', '$color', '$puertas', '$combustible', '$f_matriculacion', '$ex_visual', '$ex_tecnico')";

                //die('<script>console.log('.json_encode( $ex_visual ) .');</script>');
                
                $conexion = connect::con();
                $res = mysqli_query($conexion, $sql);
                connect::close($conexion);
            return $res;
        }   
        
        
        function select_all_car(){
            $sql = "SELECT * FROM car ORDER BY id ASC";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        function select_car(){
          $id = $_GET['id'];
          $sql = "SELECT * FROM car WHERE id = '$id'";
          
          $conexion = connect::con();
          $res = mysqli_query($conexion, $sql)->fetch_object();
          connect::close($conexion);

          return $res;
        }



        function update_car($datos){

          //  $data = 'hola insert_car';
          //  die('<script>console.log('.json_encode( $data ) .');</script>');

            $marca=$datos['marca'];
            $modelo=$datos['modelo'];
            $estado=$datos['estado'];
            $num_bast=$datos['num_bast'];
            $matricula=$datos['matricula'];
            $color=$datos['color'];
            $puertas=$datos['puertas'];
            $combustible=$datos['combustible'];
            foreach ($datos['ex_visual'] as $indice) {
              $ex_visual=$ex_visual."$indice:";
            }
            foreach ($datos['ex_tecnico'] as $indice) {
              $ex_tecnico=$ex_tecnico."$indice:";
            }
            

            $sql = "UPDATE car SET marca='$marca', modelo='$modelo', estado='$estado', num_bast='$num_bast', matricula='$matricula', color='$color', puertas='$puertas', combustible='$combustible', ex_visual='$ex_visual', ex_tecnico='$ex_tecnico' WHERE num_bast='$num_bast'";

              $conexion = connect::con();
              $res = mysqli_query($conexion, $sql);
              //die('<script>console.log('.json_encode( $res ) .');</script>');
              connect::close($conexion);
          return $res;
      }

      function delete_car(){
        $matricula=($_GET['matricula']);
        $sql = "DELETE FROM car WHERE matricula='$matricula'";
        //die('<script>console.log('.json_encode( $car ) .');</script>');
        $conexion = connect::con();
              $res = mysqli_query($conexion, $sql);
              connect::close($conexion);
          return $res;
      }





      function delete_all(){
        $sql = "DELETE FROM car";
        //die('<script>console.log('.json_encode( $car ) .');</script>');
        $conexion = connect::con();
              $res = mysqli_query($conexion, $sql);
              connect::close($conexion);
          return $res;
      }



      function dummies_car(){
        $sql = "INSERT INTO car (marca, modelo, estado, num_bast, matricula, color, puertas, combustible, f_matriculacion, ex_visual, ex_tecnico, image)"
                . " VALUES ('BMW', 'M3', 'KM0', '1234', 'ASD1234', 'Gris', '5', 'Gasolina', '12/12/2021', 'Aleron:', 'Pantalla:', 'view/images/bmwM3.jpg'), 
                           ('Mercedes', 'Benc', 'KM0', '5678', 'ASD5678', 'Gris', '5', 'Diesel', '12/12/2021', 'Aleron:', 'Pantalla:', 'view/images/1.jpg'),
                           ('Ferrari', 'Ferrari', 'Pocos KM', '1111', 'ASD1111', 'Gris', '3', 'Diesel', '12/12/2021', 'Aleron:', 'Pantalla:', 'view/images/3.jpg'),
                           ('Audi', 'A3', 'Seminuevo', '2222', 'ASD2222', 'Blanco', '5', 'Electrico', '12/12/2021', 'Aleron:', 'Pantalla:', 'view/images/6.jpg'),
                           ('Toyota', 'Toyota', 'Seminuevo', '3333', 'ASD3333', 'Rojo', '3', 'Gasolina', '12/12/2021', 'Aleron:', 'Pantalla:', 'view/images/pic5.jpg')";
                
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        
        return $res;
    }
}

?>
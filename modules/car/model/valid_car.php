<?php

    function valida_bastidor_BD($num_bast) {
        $check = false;
        $sql = "SELECT * FROM car WHERE num_bast='$num_bast'";
        
        $connexion = connect::con();
        $res = mysqli_query($connexion, $sql);

    //    die('<script>console.log('.json_encode( $res->num_rows ) .');</script>');

        connect::close($connexion);
        
        if ($res->num_rows == 0) {
            $check = false;
        } else {
            $check = true;
        }
        return $check;
    }

    function valida_matricula_BD($matricula) {
        $check = false;
        $sql = "SELECT * FROM car WHERE matricula='$matricula'";
        
        $connexion = connect::con();
        $res = mysqli_query($connexion, $sql);

    //    die('<script>console.log('.json_encode( $res->num_rows ) .');</script>');

        connect::close($connexion);
        
        if ($res->num_rows == 0) {
            $check = false;
        } else {
            $check = true;
        }
        return $check;
    }

    function validate_php() {
        $check = false;
        // $data = 'valid_car.php validar';
        // die('<script>console.log('.json_encode( $data ) .');</script>');

        $num_bast = $_POST['num_bast'];
        $matricula = $_POST['matricula'];
        $v_num_bast = valida_bastidor_BD($num_bast);
        $v_matricula = valida_matricula_BD($matricula);


        //die('<script>console.log('.json_encode( $v_num_bast ) .');</script>');
        if (!$v_num_bast) {
            $e_num_bast = " ";

            if (!$v_matricula) {
                $e_matricula = " ";
            } else {
                $e_matricula = "La matricula ya existe.";
                echo '<script language="javascript"> toastr.error("MATRICULA EN USO"); </script>';
                $check = true;
            }

        } else {
            $e_num_bast = "El bastidor ya existe.";
            echo '<script language="javascript"> toastr.error("BASTIDOR EN USO"); </script>';
            $check = true;
        }
        // die('<script>console.log('.json_encode( $check ) .');</script>');

        

        return $check;
    }
?>
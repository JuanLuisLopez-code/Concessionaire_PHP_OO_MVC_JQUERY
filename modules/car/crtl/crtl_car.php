<?php
        $path = $_SERVER['DOCUMENT_ROOT'] . '/framework_php_GitHub';
        include($path . "/modules/car/model/DAO_car.php");

// include("modules/car/model/DAO_car.php");

        switch($_GET['op']){



                case 'list';
                 

                try{
                        
                        $daocar = new DAO_car();
                        $rdo = $daocar->select_all_car();



                }catch (Exception $e){
                        $callback = 'index.php?modules=exception&op=503&error=list_dao_excp&type=503';
                                die('<script>window.location.href="'.$callback .'";</script>');
                }
                
                if(!$rdo){
                        $callback = 'index.php?modules=exception&op=503&error=list_rdo_excp&type=503';
                                die('<script>window.location.href="'.$callback .'";</script>');
                        }else{
                        include_once("modules/car/view/list.php");
                        }
                break;


                case 'dummies';
                 

                try{
                        
                        $daocar = new DAO_car();
                        $delete = $daocar->delete_all();
                        $rdo = $daocar->dummies_car();

                        //die('<script>console.log('.json_encode( $rdo ) .');</script>');

                }catch (Exception $e){
                        $callback = 'index.php?modules=exception&op=503&error=dummies_dao_excp&type=503';
                                die('<script>window.location.href="'.$callback .'";</script>');
                }
                
                if(!$rdo){
                                $callback = 'index.php?modules=exception&op=503&error=dummies_rdo_excp&type=503';
                                die('<script>window.location.href="'.$callback .'";</script>');
                        }else{
                                $callback = 'index.php?modules=car&op=list';
                                die('<script>window.location.href="'.$callback .'";</script>');
                        }
                break;
        

                case 'read';
                
                try{
                        $daocar = new DAO_car();                        
                        $rdo = $daocar->select_car($_GET['id']);
                        
                }catch (Exception $e){
                        $callback = 'index.php?modules=exception&op=503&error=read_dao_excp&type=503';
                                die('<script>window.location.href="'.$callback .'";</script>');
                }
                if(!$rdo){
                                $callback = 'index.php?modules=exception&op=503&error=read_rdo_excp&type=503';
                                die('<script>window.location.href="'.$callback .'";</script>');
                        }else{
                        include_once("modules/car/view/read.php");
                        }
                break;

                
                

                case 'create';

                

            include("modules/car/model/valid_car.php");

            $check = true;
            
            //die('<script>console.log('.json_encode( isset($_POST['create']) ) .');</script>');

            if (isset($_POST['create'])) {
               

                $check=validate_php();

                if (!$check){
                    $_SESSION['car']=$_POST;
                    
                
                    try{
                        $daocar = new DAO_car();
    		        $rdo = $daocar->insert_car($_POST);

                        }catch (Exception $e){
                                $callback = 'index.php?modules=exception&op=503&error=create_dao_excp&type=503';
                                        die('<script>window.location.href="'.$callback .'";</script>');
                        }
                        
                        if($rdo){
                                echo '<script language="javascript">alert("Registrado en la base de datos correctamente")</script>';
                                //echo '<script language="javascript"> toastr.error("BASTIDOR EN USO"); </script>';
                                $callback = 'index.php?modules=car&op=list';
                                die('<script>window.location.href="'.$callback .'";</script>');
                        }else{
                                $callback = 'index.php?modules=exception&op=503&error=create_rdo_excp&type=503';
                                die('<script>window.location.href="'.$callback .'";</script>');
                        }
                }
            }
            include("modules/car/view/create.php");
            //console_log (isset($_POST['create']));
            //die('<script>console.log('.json_encode( isset($_POST['create']) ) .');</script>');
            break;






            case 'update';
            

            include("modules/car/model/valid_car.php");
            
            
            $check = true;


            if (isset($_POST['update'])){
              console_log("asd");
                $check = false;
                if (!$check){
                        
                    $_SESSION['car']=$_POST;
                    
                    try{
                        $daocar = new DAO_car();
    		        $rdo = $daocar->update_car($_POST);
                            
                    }catch (Exception $e){
                        $callback = 'index.php?modules=exception&op=503&error=update_dao_excp&type=503';
        			    die('<script>window.location.href="'.$callback .'";</script>');
                    }
                    
		            if($rdo){
            			echo '<script language="javascript">alert("Actualizado en la base de datos correctamente")</script>';
            			$callback = 'index.php?modules=car&op=list';
        			    die('<script>window.location.href="'.$callback .'";</script>');
            		}else{
            			$callback = 'index.php?modules=exception&op=503&error=update_rdo_excp&type=503';
    			        die('<script>window.location.href="'.$callback .'";</script>');
            		}
                }
            }

            try{
                
               
                $daocar = new DAO_car();
            	$rdo = $daocar->select_car($_GET['id']);
            	$car=get_object_vars($rdo);

            }catch (Exception $e){
                $callback = 'index.php?modules=exception&op=503&error=update2_dao_excp&type=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
    			$callback = 'index.php?modules=exception&op=503&error=update2_rdo_excp&type=503';
    			die('<script>window.location.href="'.$callback .'";</script>');
    		
        	   
    		}
                    
                    else{
                        include("modules/car/view/update.php");}
                
                break;



                case 'delete';


                if (isset($_POST['delete'])){
                        //die('<script>console.log('.json_encode( "dentro del isset" ) .');</script>');
                        try{
                        $daocar = new DAO_car();
                        console_log($_GET['matricula']);
                        $rdo = $daocar->delete_car($_GET['matricula']);
                        //die('<script>window.location.href="'."hola" .'";</script>');

                        }catch (Exception $e){
                        $callback = 'index.php?modules=exception&op=503&error=delete_dao_excp&type=503';
                                die('<script>window.location.href="'.$callback .'";</script>');
                        }
                        
                        if($rdo){
                                        echo '<script language="javascript">alert("Borrado en la base de datos correctamente")</script>';
                                        $callback = 'index.php?modules=car&op=list';
                                die('<script>window.location.href="'.$callback .'";</script>');
                                }else{
                                        $callback = 'index.php?modules=exception&op=503&error=delete_rdo_excp&type=503';
                                        die('<script>window.location.href="'.$callback .'";</script>');
                                }
                }
                
                include("modules/car/view/delete.php");
                break;



                case 'delete_all';
                 

                try{
                        
                        $daocar = new DAO_car();
                        $rdo = $daocar->delete_all();

                        //die('<script>console.log('.json_encode( $rdo ) .');</script>');

                }catch (Exception $e){
                        $callback = 'index.php?modules=exception&op=503&error=delete_all_dao_excp&type=503';
                                die('<script>window.location.href="'.$callback .'";</script>');
                }
                
                if(!$rdo){
                                $callback = 'index.php?modules=exception&op=503&error=delete_all_rdo_excp&type=503';
                                die('<script>window.location.href="'.$callback .'";</script>');
                        }else{
                                $callback = 'index.php?modules=car&op=list';
                                die('<script>window.location.href="'.$callback .'";</script>');
                        }
                break;

                        
                case 'read_modal':

                        // echo $_GET["id"];
                        // exit;
                        try{
                                $daocar = new DAO_car();                        
                                $rdo = $daocar->select_car($_GET['id']);
                                $car=get_object_vars($rdo);
                                
                        }catch (Exception $e){
                            echo json_encode("error");
                            exit;
                        }
                        if(empty($rdo)){
                               
                                echo json_encode("error");
                            exit;
                                }else{
                                
                                echo json_encode($car);
                            //echo json_encode("error");
                            exit;
                                }
                        break;

                        case 'read_modal':

                        // echo $_GET["id"];
                        // exit;
                        try{
                                $daocar = new DAO_car();                        
                                $rdo = $daocar->select_car($_GET['id']);
                                $car=get_object_vars($rdo);
                                
                        }catch (Exception $e){
                            echo json_encode("error");
                            exit;
                        }
                        if(empty($rdo)){
                               
                                echo json_encode("error");
                            exit;
                                }else{
                                
                                echo json_encode($car);
                            //echo json_encode("error");
                            exit;
                                }
                        break;

                        case 'KM0':
                                // echo $_GET["id"];
                                // exit;
                                break;

        }
        

?>
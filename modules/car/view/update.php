<div class="wrap">
    <div class="content">
    	<div class="content ser">
    <form method="POST" name="update_car" id="update_car">
        <table border='0'>
            <tr>            
                <td>Marca: </td>
                <td><input type="text" id="marca" name="marca" placeholder="marca" value="<?php {echo $car['marca'];}?>"/></td>
                <td>
                    <span id="error_marca_update" class="error">
                        <?php
                            echo "$error_marca_update";
                            
                        ?>
                    </span>
                </td>
            </tr>
            <tr>  
                <td>Modelo: </td>
                <td><input type="text" id="modelo" name="modelo" placeholder="modelo" value="<?php {echo $car['modelo'];}?>"/></td>
                <td>
                    <span id="error_modelo_update" class="error">
                        <?php
                            echo "$error_modelo_update";
                            
                        ?>
                    </span>
                </td>
            </tr> 
            <tr> 

                <td>Estado: </td>
                <td><input type="text" id="estado" name="estado" placeholder="estado" value="<?php {echo $car['estado'];}?>"/></td>
                <td>
                    <span id="error_estado_update" class="error">
                        <?php
                            echo "$error_estado_update";
                            
                        ?>
                    </span>
                </td>

                </tr>
                <tr>
                <td>Bastidor: </td>
                <td><input type="text" id="num_bast" name="num_bast" placeholder="num_bast" value="<?php {echo $car['num_bast'];}?>"readonly/></td>
                <td>
                    <span id="error_bastidor_update" class="error">
                        <?php
                            echo "$error_bastidor_update";
                            
                        ?>
                    </span>
                </td>
                </tr>
                <tr> 
                <td>Matricula: </td>
                <td><input type="text" id="matriculo" name="matricula" placeholder="matricula" value="<?php {echo $car['matricula'];}?>"readonly/></td>
                <td>
                    <span id="error_matricula_update" class="error">
                        <?php
                            echo "$error_matricula_update";
                            
                        ?>
                    </span>
                </td>
            </tr> 
            <tr> 
                <td>Color: </td>
                <td><input type="text" id="color" name="color" placeholder="color" value="<?php {echo $car['color'];}?>"/></td>
                <td>
                    <span id="error_color_update" class="error">
                        <?php
                            echo "$error_color_update";
                            
                        ?>
                    </span>
                </td>
            </tr> 

            <tr>
                <td>Puertas: </td>
                <td>
                    <?php
                    
                       
                        if ($car['puertas']==="3"){
                    ?>
                        <input type="radio" id="puertas" name="puertas" placeholder="puertas" value="3" checked/>3
                        <input type="radio" id="puertas" name="puertas" placeholder="puertas" value="5"/>5
                    <?php    
                        }else{
                    ?>
                         <input type="radio" id="puertas" name="puertas" placeholder="puertas" value="3" />3
                        <input type="radio" id="puertas" name="puertas" placeholder="puertas" value="5"checked/>5
                    <?php   
                        }
                    ?>
                </td>
                <td>
                    <span id="error_puertas" class="error">
                        <?php
                            echo "$error_puertas";
                        ?>
                    </span>
                </td>
            </tr>

            <tr>
                <td>Combustible: </td>
                <td><select id="combustible" name="combustible" placeholder="combustible">
                    <?php
                       
                        if($car['combustible']==="Electrico"){
                    ?>
                        <option value="Electrico" selected>Electrico</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Gasolina">Gasolina</option>
                    <?php
                        }elseif($car['combustible']==="Diesel"){
                    ?>
                        <option value="Electrico">Electrico</option>
                        <option value="Diesel" selected>Diesel</option>
                        <option value="Gasolina">Gasolina</option>
                    <?php
                        }else{
                    ?>
                        <option value="Electrico">Electrico</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Gasolina" selected>Gasolina</option>
                    <?php
                        }
                    ?>
                    </select></td>
                <td>
                    <span id="error_combustible" class="error">
                        <?php
                            echo "$error_combustible";
                        ?>
                    </span>
                </td>
            </tr>

            <tr>
                <td>Extras Visuales: </td>
                <?php
                    $lang=explode(":", $car['ex_visual']);
                    //die('<script>console.log('.json_encode( $car['ex_visual'] ) .');</script>');
                ?>
                <td><select multiple size="3" id="ex_visual[]" name="ex_visual[]" placeholder="ex_visual">
                    <?php
                        $busca_array=in_array("Luces", $lang);
                        if($busca_array){
                    ?>
                        <option value="Luces" selected>Luces</option>
                    <?php
                        }else{
                    ?>
                        <option value="Luces">Luces</option>
                    <?php
                        }
                    ?>
                    <?php
                        $busca_array=in_array("Vinillos", $lang);
                        if($busca_array){
                    ?>
                        <option value="Vinillos" selected>Vinillos</option>
                    <?php
                        }else{
                    ?>
                        <option value="Vinillos">Vinillos</option>
                    <?php
                        }
                    ?>
                    <?php
                        $busca_array=in_array("Aleron", $lang);
                        if($busca_array){
                    ?>
                        <option value="Aleron" selected>Aleron</option>
                    <?php
                        }else{
                    ?>
                        <option value="Aleron">Aleron</option>
                    <?php
                        }
                    ?>
                    </select>
                <td>
                    <span id="error_ex_visual" class="error">
                        <?php
                            echo "$error_ex_visual";
                        ?>
                    </span>
                </td>
            </tr>

            <tr>
                <td>Extras tecnicos: </td>
                <?php
                    $afi=explode(":", $car['ex_tecnico']);
                ?>
                <td>
                    <?php
                        $busca_array=in_array("Pantalla", $afi);
                        if($busca_array){
                    ?>
                        <input type="checkbox" id= "ex_tecnico[]" name="ex_tecnico[]" value="Pantalla" checked/>Pantalla
                    <?php
                        }else{
                    ?>
                        <input type="checkbox" id= "ex_tecnico[]" name="ex_tecnico[]" value="Pantalla"/>Pantalla
                    <?php
                        }
                    ?>
                    <?php
                        $busca_array=in_array("Asientos", $afi);
                        if($busca_array){
                    ?>
                        <input type="checkbox" id= "ex_tecnico[]" name="ex_tecnico[]" value="Asientos" checked/>Asientos
                    <?php
                        }else{
                    ?>
                        <input type="checkbox" id= "ex_tecnico[]" name="ex_tecnico[]" value="Asientos"/>Asientos
                    <?php
                        }
                    ?>
                    <?php
                        $busca_array=in_array("Sensor", $afi);
                        if($busca_array){
                    ?>
                        <input type="checkbox" id= "ex_tecnico[]" name="ex_tecnico[]" value="Sensor" checked/>Sensor</td>
                    <?php
                        }else{
                    ?>
                    <input type="checkbox" id= "ex_tecnico[]" name="ex_tecnico[]" value="Sensor"/>Sensor</td>
                    <?php
                        }
                    ?>
                </td>
                <td>
                    <span id="error_ex_tecnico" class="error">
                        <?php
                            echo "$error_ex_tecnico";
                        ?>
                    </span>
                </td>
            </tr>


            <tr>
                <td><button type="submit" name="update" id="update" value="Submit" onclick="return validate_update()">Update</button></td>
                <td align="right"><button><a href="index.php?modules=car&op=list">Volver</a></button></td>
            </tr>
        </table>
    </form>
</div>
</div>
</div>
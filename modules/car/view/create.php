<div class="wrap">
    <div class="content">
    	<div class="content ser">
    <form method="POST" name="alta_car" id="alta_car">
        
        <table>
            <tr>
                <td data-tr="Marca:">Marca: </td>
                <td><input type="text" id="marca" name="marca" placeholder="marca" value="" /></td>
                <td>
                    <span id="error_marca" class="error">
                        <?php
                            echo "$error_marca";
                        ?>
                    </span>
                </td>
            </tr>

            <tr>
                <td data-tr="Modelo:">Modelo: </td>
                <td><input type="text" id="modelo" name="modelo" placeholder="modelo" value=""/></td>
                <td>
                    <span id="error_modelo" class="error">
                        <?php
                            echo "$error_modelo";
                        ?>
                    </span>
                </td>
            </tr>

            <tr>
                <td data-tr="Estado:">Estado: </td>
                <td><input type="text" id="estado" name="estado" placeholder="estado" value=""/></td>
                <td>
                    <span id="error_estado" class="error">
                        <?php
                            echo "$error_estado";
                        ?>
                    </span>
                </td>
            </tr>

            <tr>
                <td data-tr="Bastidor:">Bastidor: </td>
                <td><input type="text" id="num_bast" name="num_bast" placeholder="num_bast" value=""/></td>
                <td>
                    <span id="error_bastidor" class="error" >
                        <?php
                            echo "$error_bastidor";
                        ?>
                    </span>
                </td>
            </tr>

            <tr>
                <td data-tr="Matricula:">Matricula: </td>
                <td><input type="text" id="matricula" name="matricula" placeholder="matricula" value=""/></td>
                <td>
                    <span id="error_matricula" class="error">
                        <?php
                            echo "$error_matricula";
                        ?>
                    </span>
                </td>
            </tr>

            <tr>
                <td data-tr="Color:">Color: </td>
                <td><input type="text" id="color" name="color" placeholder="color" value=""/></td>
                <td>
                    <span id="error_color" class="error">
                        <?php
                            echo "$error_color";
                        ?>
                    </span>
                </td>
            </tr>

            <tr>
                <td data-tr="Puertas:">Puertas: </td>
                <td><input type="radio" id="puertas" name="puertas" placeholder="puertas" value="3"/>3
                    <input type="radio" id="puertas" name="puertas" placeholder="puertas" value="5"/>5</td>
                <td>
                    <span id="error_puertas" class="error">
                        <?php
                            echo "$error_puertas";
                        ?>
                    </span>
                </td>
            </tr>

            <tr>
                <td data-tr="Combustible:">Combustible: </td>
                <td><select id="combustible" name="combustible" placeholder="combustible">
                    <option value="Electrico">Electrico</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Gasolina">Gasolina</option>
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
                <td data-tr="Fecha de matriculacion:">Fecha de matriculacion: </td>
                <td><input type="text" id="fecha" name="fecha" placeholder="fecha de matriculacion" value=""/></td>
                <td>
                    <span id="error_fecha" class="error">
                        <?php
                            echo "$error_fecha";
                        ?>
                    </span>
                </td>
            </tr>

            <tr>
                <td data-tr="Extras visuales:">Extras Visuales: </td>
                <td><select multiple size="3" id="ex_visual[]" name="ex_visual[]" placeholder="ex_visual">
                    <option value="Luces">Luces Led</option>
                    <option value="Vinillos">Vinillos</option>
                    <option value="Aleron">Aleron</option>
                    </select>
                </td>
                <td>
                    <span id="error_ex_visual" class="error">
                        <?php
                            echo "$error_ex_visual";
                        ?>
                    </span>
                </td>
            </tr>

            <tr>
                <td data-tr="Extras tecnicos:">Extras Tecnicos: </td>
                <td><input type="checkbox" id= "ex_tecnico[]" name="ex_tecnico[]" placeholder= "ex_tecnico" value="Pantalla"/> Pantalla
                    <input type="checkbox" id= "ex_tecnico[]" name="ex_tecnico[]" placeholder= "ex_tecnico" value="Asientos"/>Asientos calentables
                    <input type="checkbox" id= "ex_tecnico[]" name="ex_tecnico[]" placeholder= "ex_tecnico" value="Sensor"/>Sensor marcha atras</td>
                <td>
                    <span id="error_ex_tecnico" class="error">
                        <?php
                            echo "$error_ex_tecnico";
                        ?>
                    </span>
                </td>
            </tr>

            
                <td><button type="submit" name="create" id="create" value="Submit" onclick="return validate()" data-tr="Crear">Crear</button></td>
                <td align="right"><button><a href="index.php?modules=car&op=list" data-tr="Volver">Volver</a></button></td>
            </tr>
        </table>
    </form>
</div>
</div>
</div>
<div class="wrap">
    <div class="content">
    	<div class="content ser">
    			<h3 class="details" data-tr="Lista de coches">Lista de coches</h3>
    	</div>
    	<div class="content ser">
        <p><a href="index.php?modules=car&op=create"></a></p>
    		
        <table id="table_crud">
                    <tr>

                    <td data-tr="Marca"><b>Marca</b></td>
                    <td data-tr="Estado"><b>Estado</b></td>
                    <td data-tr="Bastidor"><b>Bastidor</b></td>
                    <td data-tr="Matricula"><b>Matricula</b></td>
                    <td data-tr="Color"><b>Color</b></td>
                    <td colspan="3"> <?php
                    echo '<button id="boton_create"> <a href="index.php?modules=car&op=create" data-tr="Crear">Crear</a>  </button>';
                    ?></td>
                </tr>
                <?php
                    if ($rdo->num_rows === 0){
                        echo '<tr>';
                        echo '<td align="center"  colspan="3" data-tr="No hay coches">No hay coches</td>';
                        echo '</tr>';
                    }else{
                        
                        foreach ($rdo as $row) {
                       		echo '<tr>';
                    	   	echo '<td>'. $row['marca'] . '</td>';
                    	   	echo '<td>'. $row['estado'] . '</td>';
                            echo '<td>'. $row['num_bast'] . '</td>';
                            echo '<td>'. $row['matricula'] . '</td>';
                            echo '<td>'. $row['color'] . '</td>';

                            print ("<td><div class='car' id='".$row['id']."'>Read</div></td>");  //READ
                    	   

                            //READ
                    	   	//echo '<td><a class="Button_read" id="Button_read" href="index.php?modules=car&op=read&id='.$row['id'].'">Read</a></td>';
                            //<a href='index.php?modules=car&op=read_modal&id= ".$row['id']."'>

                            echo '<td><a class="Button_update" id="Button_update" href="index.php?modules=car&op=update&id='.$row['id'].'">Update</a></td>';
                            echo '<td><a class="Button_delete" id="Button_delete" href="index.php?modules=car&op=delete&matricula='.$row['matricula'].'">Delete</a></td>';
                            // console_log($row);
                    	   	echo '</td>';
                    	   	echo '</tr>';
                        }
                    }
                ?>
            </table>
    	</div>
    </div>
</div>

<!-- modal window -->
<section id="modalcontent">
    <div id="details_car">
    </div>
</section>
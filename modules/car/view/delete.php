<div class="wrap">
    <div class="content">
    	<div class="content ser">
    <form method="post" name="delete_user" id="delete_user" action="index.php?modules=car&op=delete&matricula=<?php echo $_GET['matricula']; ?>">
        <table>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td><h1 data-tr="¿Desea seguro borrar al coche">¿Desea seguro borrar al coche <?php echo $_GET['matricula'];?></h1></td>
                
            </tr>
            
            <tr>
            
                <td><br><button type="submit" class="Button_green"name="delete" id="delete" value="Submit" data-tr="Aceptar">Aceptar</button></td>
                <td><br><button><a class="Button_volver" href="index.php?modules=car&op=list" data-tr="Cancelar">Cancelar</a></button></td>
<td>
             
</td>
            </tr>
        </table>
    </form>
</div>
</div>
</div>
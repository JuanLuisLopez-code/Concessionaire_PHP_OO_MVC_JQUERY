<div id="contenido_read">
<h1>Informacion de coches</h1>
<p>
<table>
    <tr>
            <?php
                
                foreach ($rdo as $row) {
                    echo '<tr>';
                    echo '<td data-tr="Marca">Marca </td>';
                    echo '<td width=125>'. $row['marca'] . '</td>';
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td data-tr="Modelo">Modelo </td>';
                    echo '<td width=125>'. $row['modelo'] . '</td>';
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td data-tr="Estado">Estado </td>';
                    echo '<td width=125>'. $row['estado'] . '</td>';
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td data-tr="Bastidor">Bastido  </td>';
                    echo '<td width=125>'. $row['num_bast'] . '</td>';
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td data-tr="Matricula">Matricula </td>';
                    echo '<td width=125>'. $row['matricula'] . '</td>';
                    echo '</tr>';


                    echo '<tr>';
                    echo '<td data-tr="Fecha de matriculacion">Fecha matriculacion  </td>';
                    echo '<td width=125>'. $row['f_matriculacion'] . '</td>';
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td data-tr="Color">Color  </td>';
                    echo '<td width=125>'. $row['color'] . '</td>';
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td data-tr="Puertas">Puertas </td>';
                    echo '<td width=125>'. $row['puertas'] . '</td>';
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td data-tr="Combustible">Combustible  </td>';
                    echo '<td width=125>'. $row['combustible'] . '</td>';
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td data-tr="Extras visuales">Extras visuales </td>';
                    echo '<td width=125>'. $row['ex_visual'] . '</td>';
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td data-tr="Extras tecnicos">Extras tecnicos </td>';
                    echo '<td width=125>'. $row['ex_tecnico'] . '</td>';
                    echo '</tr>';
                }

            ?>

    </tr>
</table>
</p>
<p><a href="index.php?modules=car&op=list">Volver</a></p>
</div>
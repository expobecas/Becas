<h3 class = "center">Casos</h3>
<div class = "row">
    <table class="col l8 s12 offset-l3 offset-m3 white highlight centered responsive-table">
        <thead>
            <tr>
                <th>Descripción del caso</th>
                <th>Fecha que se generó el caso</th>
                <th>Estado de solicitud</th>
                <th>Fecha de cita</th>
                <th>Alumno</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
        <?php
        foreach($casos as $row)
        {
            $fecha = explode(' ', $row['start']);
            print("
            <tr>
            <td>$row[descripcion]</td>
            <td>$row[fecha]</td>
            <td>$row[estado_solicitud]</td>
            <td>$fecha[0]</td>
            <td>$row[primer_nombre]".' '."$row[segundo_nombre]".' '."$row[primer_apellido]".' '."$row[segundo_apellido]</td>
            <td>
            <a type='button' href='../' class='waves-effect waves-light btn green tooltipped boton_table editar' data-position='bottom' data-tooltip='Editar'><i class='material-icons'>edit</i></a>
            <a type='button' href='../' class='waves-effect waves-light btn red tooltipped boton_table eliminar' data-position='bottom' data-tooltip='Eliminar'><i class='material-icons'>delete</i></a>
            </td>
            </tr>
            ");
        }
        ?>
        </tbody>
    </table>
</div>
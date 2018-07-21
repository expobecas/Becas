<div class="container row">
    <table class="highlight col offset-l2 white" >
    <div class="fixed-action-btn toolbar ">
		<a class="btn-floating btn-large grey lighten-5" href="create.php"><i class="large material-icons cyan-text darken-2">add</i></a>	
	</div>  

<!--Elementos que poseerá la tabla-->
        <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>CARNET</th>
            <th>GRADO</th>
            <th>ESPECIALIDAD</th>
            <th>ENCARGADA/O</th>
            <th>TELEFONO</th>
            <th>ACCION</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($data as $row){
            //Información de las tablas
            print("
                <tr>
                    <td>$row[id_solicitud]</td>
                    <td>$row[primer_nombre]</td>
                    <td>$row[primer_apellido]</td>
                    <td>$row[n_carnet]</td>
                    <td>$row[grado]</td>
                    <td>$row[especialidad]</td>
                    <td>$row[encargado]</td>
                    <td>$row[cel_mama]</td>
                    <td>
				<a href='update.php?id=$row[id_caso]' class='blue-text'><i class='material-icons green-text'>mode_edit</i></a>
				<a href='delete.php?id=$row[id_caso]' class='red-text'><i class='material-icons red-text'>delete</i></a>
			</td>
                </tr>
            ");
        }
        ?>
        </tbody>
    </table>
</div>

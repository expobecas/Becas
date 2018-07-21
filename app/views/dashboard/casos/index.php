<div class = "row">
    <h3 class = "col offset-l6">Casos</h3>
</div>
<div class = "row">
<form method="POST" target="_blank">
<?php
print("
<a href='../../app/views/dashboard/casos/reporte.php?id=$_SESSION[id_usuario]' class='waves-effect waves-light btn green col offset-l3'>Generar reporte</a>
");
?>
</form>
    
</div>
<div class = "row">
    <table class="col l8 s12 offset-l3 offset-m3 white highlight centered responsive-table">
        <thead>
            <tr>
            <th>Alumno</th>
                <th>Fecha que se generó el caso</th>
                <th>Estado de solicitud</th>
                <th>Fecha de cita</th>
                <th class="botones_table">Acciones</th>
            </tr>
        </thead>

        <tbody id="datos">
        </tbody>
    </table>
</div>

<div id="modalCasos" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4 class="modal-title" id="titulo">Detalle Casos</h4>
        <div class="divider"></div>
        <div class="row">
            <div class="col s6" id="id_caso">
                <h6>Id:</h6>
                <input type="text" id="id" name="id" class="validate"/>
            </div>
            <div class="col s12">
                <h6>Titulo:</h6>
                <input type="text" id="tituloEvento" name="tituloEvento" class="validate"/>
            </div>
            
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" type="submit" id="agregar" class="waves-effect waves-light btn btn-small">Agregar</a>
        <a href="#!" type="submit" id="modificar" class="waves-effect waves-light btn btn-small">Modificar</a>
        <a href="#!" type="submit" id="eliminar" class="waves-effect waves-light btn btn-small red">Eliminar</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-grey btn btn-small grey">Cancelar</a>
    </div>
</div>
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
    <table class="col l8 s12 offset-l3 offset-m3 white highlight centered responsive-table" id="tablecaso">
        <thead>
            <tr>
            <th>Alumno</th>
                <th>Fecha que se generó el caso</th>
                <th>Estado de solicitud</th>
                <th>Fecha de cita</th>
                <th class="botones_table">Acciones</th>
            </tr>
        </thead>

        <tbody id="casos">
        </tbody>
    </table>
</div>

<div id="modalCasos" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4 class="modal-title center" id="titulo">Detalle del Caso</h4>
        <div class="divider"></div>
        <div class="row">
            <div class="input-field col s4">
                <input disabled placeholder=" " type="text" id="fecha" name="fecha" class="validate negrita"/>
                <label for="fecha">Fecha que se generó el caso</label>
            </div>
        </div>
        <div class="row">
            <div class="col s1" id="id_caso">
                <input type="text" id="id" name="id" class="validate"/>
            </div>
            <div class="input-field col s4">
                <input disabled placeholder=" " type="text" id="carnet" name="carnet" class="validate negrita"/>
                <label for="carnet">Número de carnet</label>
            </div>
            <div class="input-field col s4">
                <input disabled placeholder=" " type="text" id="alumno" name="alumno" class="validate negrita"/>
                <label for="alumno">Nombre del alumno</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col l12">
                <textarea placeholder=" " id="descripcion" class="materialize-textarea" name="descripcion" data-length="500"></textarea>
                <label for="descripcion">Escribir la descripción del caso</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" type="submit" id="modificar_caso" class="waves-effect waves-light btn btn-small">Modificar</a>
        <a href="#!" type="submit" id="eliminar_caso" class="waves-effect waves-light btn btn-small red">Eliminar</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-grey btn btn-small grey">Cancelar</a>
    </div>
</div>
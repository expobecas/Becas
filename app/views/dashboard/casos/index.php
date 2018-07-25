<!--TÍTULO CASOS-->
<div class="row">
   <div class="col offset-l3 titulo-font">
      <h4>Casos</h4>
   </div>
</div>
<div class = "row">
<form method="POST" target="_blank" class="col offset-l9">
<?php
print("
<a href='../../app/views/dashboard/casos/reporte.php?id=$_SESSION[id_usuario]' class='waves-effect waves-light btn sg1'>Generar reporte</a>
");
?>
</form>
</div>
<!--TABLA SOLICITUDES GENERALES-->
<div class="tabla">
<div class="row">
   <div class="col offset-l3 l8 white">
      <div class="col titulo-font">
            <h5>Información.</h5>
      </div>
      <table class="white highlight bordered tb-sol" id="tablecaso">
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
</div>
</div>

<!--DETALLE DEL CASO-->
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
                <textarea disabled placeholder=" " id="descripcion" class="materialize-textarea negrita" name="descripcion" data-length="500"></textarea>
                <label for="descripcion">Escribir la descripción del caso</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" type="submit" id="modificar_caso" class="waves-effect waves-light btn btn-small">Modificar</a>
        <a href="#!" type="submit" id="eliminar_caso" class="waves-effect waves-light btn btn-small red">Eliminar</a>
        <a href="#!" type="submit" id="guardar" class="waves-effect waves-light btn btn-small">Guardar cambios</a>
        <a href="#!" type="submit" id="cancelar_cambios" class="waves-effect waves-light btn btn-small grey">Cancelar cambios</a>
        <a href="#!" id="cancelar" class="modal-action modal-close waves-effect waves-grey btn btn-small grey">Cancelar</a>
    </div>
</div>


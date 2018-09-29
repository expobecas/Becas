<!--TÍTULO CASOS-->
<div class="row">
   <div class="col offset-l3 titulo-font">
      <h4>Casos</h4>
   </div>
</div>
<div class = "row">
    <div class="input-field col s12 m6 l3 offset-l3"> 
        <input id="buscar_caso" type="text" name="buscar_caso" class="validate"/>
        <label for="buscar_caso">Buscar casos por número de carnet</label>
    </div>
    <form method="POST" target="_blank" class="col offset-l3">
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
                    <th>N° de carnet</th>
                    <th>Alumno</th>
                    <th>Fecha que se generó el caso</th>
                    <th>Estado de solicitud</th>
                    <th>Fecha de cita</th>
                    <th class="botones_table">Casos</th>
                    <th class="botones_table">Seguiminetos</th>
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
            <div class="input-field col l4 m4 s8">
                <input disabled placeholder=" " type="text" id="fecha" name="fecha" class="validate negrita"/>
                <label for="fecha">Fecha que se generó el caso</label>
            </div>
        </div>
        <div class="row">
            <div class="col s1 id_caso">
                <input type="text" id="id" name="id" class="validate"/>
            </div>
            <div class="input-field col l4 m4 s6">
                <input disabled placeholder=" " type="text" id="carnet" name="carnet" class="validate negrita"/>
                <label for="carnet">Número de carnet</label>
            </div>
            <div class="input-field col l6 m6 s8">
                <input disabled placeholder=" " type="text" id="alumno" name="alumno" class="validate negrita"/>
                <label for="alumno">Nombre del alumno</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col l12 m12 s12">
                <textarea disabled placeholder=" " id="descripcion" class="materialize-textarea negrita" name="descripcion" data-length="500"></textarea>
                <label for="descripcion">Escribir la descripción del caso</label>
            </div>
        </div>
        <div class="row">
            <div id="vistas">
                
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

<!--SEGUIMIENTOS DE LOS SEGUIMIENTOS-->
<div id="modalSeguimiento" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4 class="modal-title center" id="titulo">Seguimientos del caso</h4>
        <div class="divider"></div>
        <div class="row">
            <div id="frmmostrar">
                <div class="card fijar" class="z-depth-4">
                    <div class="card-tabs">
                        <ul class="tabs tabs-fixed-width">
                            <li class="tab col l6" class="active"><a id="tab_table" href="#table">Tabla de seguimientos</a></li>
                            <li class="tab col l6"><a id="tab_periodo" href="#periodo">Seguimientos por periodo</a></li>
                        </ul>
                    </div>
                </div>
                <div id="table" class="z-depth-4">
                    <table class="white highlight bordered tb-sol" id="tableseguimiento">
                        <thead>
                            <tr>
                                <th>Periodo</th>
                                <th>Descripcion</th>
                                <th>Soluciones o acuerdos</th>
                            </tr>
                        </thead>
                        <tbody id="seguimientos">
                        </tbody>
                    </table>
                </div>
                <div id="periodo">
                    
                </div>
            </div>
            <div id="frmcrear">
                <div class="col s1 id_caso">
                    <input type="text" id="id_caso" name="id_caso" class="validate"/>
                </div>
                <div class="input-field col l12 m12 s12">
                    <select id="periodos">
                    </select>
                </div>
                <div class="input-field col l12 m12 s12">
                    <textarea id="crear_descripcion" class="materialize-textarea negrita" name="crear_descripcion" data-length="700"></textarea>
                    <label for="crear_descripcion">Escribir la descripción</label>
                </div>
                <div class="input-field col l12 m12 s12">
                    <textarea id="crear_solucion" class="materialize-textarea negrita" name="crear_solucion" data-length="700"></textarea>
                    <label for="crear_solucion">Describir las soluciones o acuerdos</label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a id="crear_seguimiento" class="waves-effect waves-light btn btn-small">Crear Seguimiento</a>
        <a id="guardar_seguimiento" class="waves-effect waves-light btn btn-small blue">Guardar</a>
        <a id="cancelar_seguimiento" class="waves-effect waves-light btn btn-small grey">Cancelar</a>
        <a id="cerrar" class="modal-action modal-close waves-effect waves-grey btn btn-small grey">Cerrar</a>
    </div>
</div>
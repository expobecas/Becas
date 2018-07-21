<div class="container">
    <div class="row">
        <div class="col offset-xl2 offset-l2" id="Calendario">

        </div>
        
    </div>
</div>
<div class="row">
    <div class="tablecitas" id="formcita">
        <a href="#" class="control_t" id="control_tabla">Tabla</a>
        <a href="#" class="control_c" id="control_calendario">Calendario</a>
        <div class="contenedor">
            <div class="row">
                <table class="col l12 highlight responsive-table" id="cita">
                    <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                    </tr>
                    </thead>
                    <tbody id="datos">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


  
</main>
<!--modal-->
<div id="modal1" class="modal">
    <div class="modal-content">
      <h4 class="modal-title" id="titulo"></h4>
      <div class="divider"></div>
      <h5><div id="descripcion"></div></h5>
    </div>
    <div class="modal-footer">
        <a href="#!" type="submit" class="waves-effect waves-light btn btn-small">Agregar</a>
        <a href="#!" type="submit" class="waves-effect waves-light btn btn-small">Modificar</a>
        <a href="#!" type="submit" class="waves-effect waves-light btn btn-small red">Eliminar</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-grey btn btn-small grey">Cancelar</a>
    </div>
</div>

<!--modal para agregar, modificar y eliminar eventos-->
<div id="modalEventos" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4 class="modal-title" id="titulo">Agregar Evento</h4>
        <div class="divider"></div>
        <div class="row">
            <div class="col s6" id="id_cita">
                <h6>Id:</h6>
                <input type="text" id="id" name="id" class="validate"/>
            </div>
            <div class="col s12">
                <h6>Titulo:</h6>
                <input type="text" id="tituloEvento" name="tituloEvento" class="validate"/>
            </div>
            <div class="col s6">
                <h6>Fecha:</h6>
                <input type="text" id="fecha" name="fecha" class="validate"/>
            </div>
            <div class="col s6">
                <h6>Hora:</h6>
                <input type="text" id="hora" name="hora" class="validate"/>
            </div>
            <div class="col s12">
                <h6>Descripcion:</h6>
                <textarea id="descripcionEvento" name="descripcionEvento" class="materialize-textarea" class="validate"></textarea>
            </div>
            <div class="col s12" id="detalle">
                <h6>Titulo:</h6>
                <input type="text" id="id_detalle" name="id_detalle" value="<?php echo $_GET['id']?>" class="validate"/>
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
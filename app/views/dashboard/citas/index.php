<div class="container">
    <div class="row">
        <div class="col offset-xl1 offset-l2" id="Calendario">

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
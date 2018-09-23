<h3 class="center">Crear Caso</h3>
<form method="POST"  autocomplete="off" id="caso" encrype="multipart/form-data">
    <div class="row">
        <div class="input-field col l8 m8 s12 offset-l3">
            <textarea id="descripcion_c" class="materialize-textarea" name="descripcion_c" data-length="500"></textarea>
            <label for="descripcion_c">Escribir la descripción del caso</label>
        </div>
        <div class="file-field input-field col l8 m8 s12 offset-l3">
            <div class="btn">
                <span>imagenes</span>
                <input type="file" name="imagenes[]" id="imagenes" multiple/>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Seleccione una o varias imagenes"/>
            </div>
        </div>
        <div class="col offset-l3">
            <div class="row" id="vista"></div>
        </div>
        
    </div>

    <div class="row">
        <div class="col offset-l8">
            <a id="rechazar" class="waves-effect waves-light red btn">Rechazar</a>
            <a id="aprobar" class="waves-effect waves-light green btn">Aprobar</a>
        </div>
    </div>
</form>
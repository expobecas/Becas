<h3 class="center">Crear Caso</h3>
<form method="POST"  autocomplete="off" id="caso" encrype="multipart/form-data">
    <div class="row">
        <div class="input-field col l8 m8 offset-l3">
            <textarea id="descripcion" class="materialize-textarea" name="descripcion" data-length="500"></textarea>
            <label for="descripcion">Escribir la descripción del caso</label>
        </div>
        <div class="file-field input-field col l8 offset-l3">
            <div class="btn">
                <span>imagenes</span>
                <input type="file" id="imagenes" multiple>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Seleccione una o varias imagenes">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col offset-l8">
            <button type="submit" name="rechazar" class="waves-effect waves-light red btn">Rechazar</button>
            <button type="submit" name="aprobar" class="waves-effect waves-light green btn">Aprobar</button>
        </div>

        <div class="col offset-l3">
            <a id="subir" class="waves-effect waves-light red btn">Subir</a>
            <div id="vista"></div>
        </div>
        
    </div>

    
</form>
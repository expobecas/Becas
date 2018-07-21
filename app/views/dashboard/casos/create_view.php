<h3 class="center">Crear Caso</h3>
<form method="POST">
    <div class="row">
        <div class="input-field col l8 m8 offset-l3">
            <textarea id="descripcion" class="materialize-textarea" name="descripcion" data-length="500"></textarea>
            <label for="descripcion">Escribir la descripción del caso</label>
        </div>
    </div>

    <div class="row">
        <div class="col offset-l8">
            <button type="submit" name="rechazar" class="waves-effect waves-light red btn">Rechazar</button>
            <button type="submit" name="aprobar" class="waves-effect waves-light green btn">Aprobar</button>
        </div>
    </div>
</form>

  <form method="POST" class="white" autocomplete="off">
  <div class="row">
  <div class="col titulo-font">
    <h5>Agregar categoría</h5>
  </div>
  </div>
    <div class="row">
      <div class="input-field col s6 l12">
      <input name="tipo" id="tipo" type="text" class="validate" onkeypress = 'return soloLetras(event)' required/>
        <label for="tipo">Categoría</label>
      </div>
      <div class="row">
      <div class="input-field col s6 l12 offset-l3">
      <button class="waves-effect waves-light btn boton-editar2 offset-l4 sg2 add-c" type='submit' name='crear'> Agregar </button>
      </div>
    </div>
  </form>

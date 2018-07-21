<form method='post' enctype='multipart/form-data'>
  <div class="row">
    <div class="input-field col s6 offset-l3 white-text">
        <input id="mensaje" type="text" name="mensaje"  class="white-text" class="validate" value="<?php print($mensaje->getMensaje()) ?>" required/>
        <label for="mensaje">Mensaje</label>
    </div>
  </div>

  <div class='row center-align'>
        <a href='index.php' class='btn waves-effect grey tooltipped' data-tooltip='Cancelar'><i class='material-icons'>cancel</i></a>
        <button type='submit' name='crear' class='btn waves-effect blue tooltipped' data-tooltip='Crear'><i class='material-icons'>save</i></button>
    </div>
</form>
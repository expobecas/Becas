<div class="row">
    <form class="col s12 offset-l4 white l5" method="POST">
    <div class="row">
    <div class="col titulo-font">
    <h6>Escribe tu mensaje:</h6>
    </div>
    <div class="row">
        <div class="input-field col s12 black-text">
        <i class="material-icons prefix">account_circle</i>
        <input name="estudiante" id="estudiante" type="text" class="validate" value='<?php print($comentarios->getId_estudiante())?>' required/>
        <label for="estudiante">Codigo</label>
        </div>
      </div>
        <div class="input-field col s6 l12">
          <i class="material-icons prefix">mode_edit</i>
          <textarea id="icon_prefix2" class="materialize-textarea" name="mensaje"></textarea>
          <label for="icon_prefix2">Mensaje</label>
        </div>
        <div class="col offset-l4 l4">
      <button class="waves-effect waves-light btn s-general sg3" type="submit" name="enviar">Envíar<i class="material-icons right">send</i></button>
   </div>
      </div>
    </form>
  </div>
<!--FORMULARIO DE MODIFICAR TIPO DE USUARIO-->
<div class="row">
    <form method="POST" class="col s12 offset-l4 l6 m12 white" autocomplete="off">
    <p class="titulo-EP"><strong>Modificar tipo</strong></p>
      <div class="divider"></div>
    <div class="row">
    </div>
      <div class="row">
        <div class="input-field col s6 push-l1 l10">
        <input id="tipo" type="text" class="validate" name='tipo' value="<?php print($tipo->getTipo());?>">
          <label for="first_name">Tipo</label>
        </div>
        <div class="row">
        <div class="input-field col s6 l12 m12 offset-l3">
        <button class="waves-effect waves-light btn boton-editar2 offset-l4 sg3" type='submit' name='modificar'> Modificar </button>
        <a href="../../dashboard/usuarios/index.php" class="waves-effect waves-light btn boton-editar2 offset-l4 sg1" type='submit' name='cancelar'> Cancelar </a>
        </div>
      </div>
    </form>
  </div>
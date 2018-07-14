<div class="row">
    <form method="POST" class="col s12 offset-l4 l6 white">
    <div class="row">
    <div class="col titulo-font">
      <h5>Modificar categoría</h5>
   </div>
    </div>
      <div class="row">
        <div class="input-field col s6 push-l1 l10">
          <input name="tipo" id="first_name" type="text" class="validate" value="<?php print($categorias->getTipo());?>" required/>
          <label for="first_name">Categoría</label>
        </div>
        <div class="row">
        <div class="input-field col s6 l12 offset-l3">
        <button class="waves-effect waves-light btn boton-editar2 offset-l4 sg3" type='submit' name='modificar'> Modificar </button>
        <a href="../../dashboard/patrocinadores/index.php" class="waves-effect waves-light btn boton-editar2 offset-l4 sg1" type='submit' name='cancelar'> Cancelar </a>
        </div>
      </div>
    </form>
  </div>
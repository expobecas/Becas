<div class="row">
   <form class="col s4 l6 offset-l4 white formulario" method="POST">
      <p class="titulo-EP"><strong>Agregar usuario</strong></p>
      <div class="divider"></div>
      <div class="row  col m12">
         <div class="input-field col s12 l12">
            <?php Page::showSelect("tipo", "tipo", $usuario->getTipo(), $usuario->getTipoe());?>
         </div>
      </div>
      <div class="row">
         <div class="input-field col s4 l6">
            <input id="usuario" type="text" name='usuario' class='validate' value='<?php print($usuario->getUsuario()) ?>' required/>
            <label for="usuario">Usuario</label>
         </div>
         <div class="input-field col s4 l6">
            <input id="contraseña" type="password" name='contraseña' class='validate' value='<?php print($usuario->getClave()) ?>' required/>
            <label for="contraseña">Password</label>
         </div>
      </div>
      <div>
         <button class="waves-effect waves-light btn sg2" type='submit' name='crear'>Agregar</button>
         <a href="../../dashboard/usuarios/index.php" class="waves-effect waves-light btn boton-editar2 offset-l4 sg1" type='submit' name='cancelar'> Cancelar </a>
      </div>
   </form>
</div>


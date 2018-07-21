<div class="row  col offset-l4 offset-m6">
<div class="col offset-l4 offset-m6"></div>
<div class="row">
   <form class="col s4 l4 offset-l5 white formulario" method="POST">
      <p class="titulo-EP"><strong>Editar usuario</strong></p>
      <div class="divider"></div>
      <div class="row">
         <div class="input-field col s6">
            <input id="nombres" type="text" name='nombres' class="black-text" class='validate' value='<?php print($usuario->getNombres()) ?>' required/>
            <label for="nombres">Nombres</label>
         </div>
         <div class="input-field col s6">
            <input id="apellidos" type="text" name='apellidos' class='validate' value='<?php print($usuario->getApellidos()) ?>' required/>
            <label for="apellidos">Apellidos</label>
         </div>
      </div>
      <div class="input-field col s12">
         <?php
            Page::showSelect("Tipo", "tipo", $usuario->getTipo(), $usuario->getTipoe());                                     
            ?> 
      </div>
      <div class="row">
         <div class="input-field col s6">
            <input id="usuario" type="text" name='usuario' class='validate' value='<?php print($usuario->getUsuario()) ?>' required/>
            <label for="usuario">Usuario</label>
         </div>
         <div class="row">
            <div class="input-field col s6">
               <input id="contraseña" type="password" name='contraseña' class='validate' value='<?php print($usuario->getClave()) ?>' required/>
               <label for="contraseña">Password</label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col offset-s1 s12">
               <button class="waves-effect waves-light btn boton-editar2 offset-l4 sg2" type='submit' name='actualizar'>Modificar</button>
               <a href="../../dashboard/usuarios/index.php" class="waves-effect waves-light btn boton-editar2 offset-l4 sg1" type='submit' name='cancelar'> Cancelar </a>
            </div>
         </div>
      </div>
   </form>
</div>
</form>
</div>
</div>
</div>


<div class="row  col offset-l4 offset-m6">
<<<<<<< HEAD
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

=======
<div class="col offset-l4 offset-m6">
</div>
<div class="row">
<h1 class="black-text col offset-l6 offset-m2">Modificar Usuario</h1>
    <form class="col s4 l4 offset-l5 white formulario" method="POST">
      <div class="row">
        <div class="input-field col s4">
          <input id="nombres" type="text" name='nombres' class="black-text" class='validate' value='<?php print($usuario->getNombres()) ?>' required/>
          <label for="nombres">Nombres</label>
        </div>
        <div class="input-field col s4">
          <input id="apellidos" type="text" name='apellidos' class='validate' value='<?php print($usuario->getApellidos()) ?>' required/>
          <label for="apellidos">Apellidos</label>
        </div>
      </div>
      <?php
           Page::showSelect("Tipo", "tipo", $usuario->getTipo(), $usuario->getTipoe());                                     
         ?>
      <div class="row">
        <div class="input-field col s4">
          <input id="usuario" type="text" name='usuario' class='validate' value='<?php print($usuario->getUsuario()) ?>' required/>
          <label for="usuario">Usuario</label>
        </div>
      <div class="row">
        <div class="input-field col s4">
          <input id="contraseña" type="password" name='contraseña' class='validate' value='<?php print($usuario->getClave()) ?>' required/>
          <label for="contraseña">Password</label>
        </div>
      </div>
      <div class="row">
      <div class="input-field col s12">
      
<button class="waves-effect waves-light btn" type='submit' name='actualizar'>Modificar</button>
<a href='index.php' class='btn waves-effect grey tooltipped' data-tooltip='Cancelar'><i class='material-icons'>cancel</i></a>

  </div>
  </div>
      </div>
    </form>
    </div>
    </form>
    </div>
    


    
>>>>>>> 5fa3c353cd7c6962fd67c551785619ba461af590

<div class="row  col offset-l4 offset-m6">
<div class="col offset-l4 offset-m6">
</div>
<div class="row">
<h1 class="black-text col offset-l6 offset-m2">Agregar Usuario</h1>
    <form class="col s4 l4 offset-l5 white formulario" method="POST">
      <div class="row">
        <div class="input-field col s4">
          <input id="nombres" type="text" name='nombres' class="white-text" class='validate' value='<?php print($usuario->getNombres()) ?>' required/>
          <label for="nombres">Nombres</label>
        </div>
        <div class="input-field col s4">
          <input id="apellidos" type="text" name='apellidos' class='validate' value='<?php print($usuario->getApellidos()) ?>' required/>
          <label for="apellidos">Apellidos</label>
        </div>
      </div>
      <div class="row  col m12">
      <div class="input-field col s12">
      <?php
           Page::showSelect("tipo", "tipo", $usuario->getTipo(), $usuario->getTipoe());                                     
         ?>
          </div>
      <div class="row">
        <div class="input-field col s4">
          <input id="usuario" type="text" name='usuario' class='validate' value='<?php print($usuario->getUsuario()) ?>' required/>
          <label for="usuario">Usuario</label>
        </div>
        </div>
      <div class="row">
        <div class="input-field col s4">
          <input id="contraseña" type="password" name='contraseña' class='validate' value='<?php print($usuario->getClave()) ?>' required/>
          <label for="contraseña">Password</label>
        </div>
      </div>
      
      
<button class="waves-effect waves-light btn" type='submit' name='crear'>Agregar</button>
<a href='index.php' class='btn waves-effect grey tooltipped' data-tooltip='Cancelar'><i class='material-icons'>cancel</i></a>
</div>
  </div>
  </div>
      </div>
    </form>
    </div>
    </form>
    </div>
    </div>
    


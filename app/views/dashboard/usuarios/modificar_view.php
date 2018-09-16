<div class="row">
    <form class="col s4 l6 offset-l4 white formulario" method="POST" autocomplete="off">
    <p class="titulo-EP"><strong>Modificar usuario</strong></p>
      <div class="divider"></div>
      <div class="row">
        <div class="col l12 s12 m12x">
        <?php
           Page::showSelect("Tipo", "tipo", $usuario->getTipo(), $usuario->getTipoe());                                     
         ?>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4 l6">
          <input id="usuario" type="text" name='usuario' class='validate' value='<?php print($usuario->getUsuario()) ?>' required/>
          <label for="usuario">Usuario <i class='material-icons icon-form'>perm_identity</i></label>
        </div>
      <div class="row">
        <div class="input-field col s4 l6">
          <input id="correo" type="text" name='correo' class='validate' value='<?php print($usuario->getCorreo()) ?>' required/>
          <label for="correo">Correo <i class='material-icons icon-form'>mail_outline</i></label>
        </div>
        <div class="row">
         <div class="input-field col s4 l6">
            <input id="nombres" type="text" name='nombres' class='validate' value='<?php print($usuario->getNombres()) ?>' required/>
            <label for="nombres">Nombres <i class='material-icons icon-form'>person</i></label>
         </div>
         <div class="input-field col s4 l6">
            <input id="apellidos" type="text" name='apellidos' class='validate' value='<?php print($usuario->getApellidos()) ?>' required/>
            <label for="apellidos">Apellidos <i class='material-icons icon-form'>person</i></label>
         </div>
      </div>
      </div>
      <div class="row">
      <div class="input-field col s12 offset-l3">
      
<button class="waves-effect waves-light btn sg2" type='submit' name='actualizar'>Modificar</button>
<a href="../../dashboard/usuarios/index.php" class="waves-effect waves-light btn boton-editar2 offset-l4 sg1" type='submit' name='cancelar'> Cancelar </a>

  </div>
  </div>
      </div>
    </form>
    </div>
    


    

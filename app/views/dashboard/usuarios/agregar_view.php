<!--FORMULARIO PARA AGREGAR USUARIO-->
<div class="row">
   <form class="col s4 l8 offset-l3 white formulario" method="POST" autocomplete="off">
      <p class="titulo-EP"><strong>Agregar usuario</strong></p>
      <div class="divider"></div>
      <div class="row col m12">
         <div class="input-field col s12 l6">
            <?php Page::showSelect("tipo", "tipo", $usuario->getTipo(), $usuario->getTipoe());?>
         </div>
         <div class="input-field col s4 l6">
            <input id="correo" type="text" name='correo' class='validate' value='<?php print($usuario->getCorreo()) ?>' required/>
            <label for="correo">Correo <i class='material-icons icon-form'>mail_outline</i></label>
         </div>
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
      <div class="row">
         <div class="input-field col s4 l6">
            <input id="usuario" type="text" name='usuario' class='validate' value='<?php print($usuario->getUsuario()) ?>' required/>
            <label for="usuario">Usuario <i class='material-icons icon-form'>perm_identity</i></label>
         </div>
         <div class="input-field col s4 l6">
            <input id="contraseña" type="password" name='contraseña' class='validate' value='<?php print($usuario->getClave()) ?>' required/>
            <label for="contraseña">Password <i class='material-icons icon-form'>lock_outline</i></label>
         </div>
      </div>
      <!--PRIMERA FILA-->
      <div class="divider"></div>
   <div id="formpatro">
   <p class="titulo-EP"><strong>Agregar patrocinador</strong></p>
      <div class="divider"></div>
      <div class="row">
         <div class="input-field col s6">
         <?php
           Page::showSelect("categoria", "categoria", $patrocinadores->getTipo(), $patrocinadores->getCategorias());                                     
         ?>
         </div>
         <div class="input-field col s6">
            <input id="nombre2" type="text" class="validate" name='profesion'>
            <label for="nombre2">Profesion <i class='material-icons icon-form'>card_travel</i></label>
         </div>
      </div>
      <!--SEGUNDA FILA--> 
      <div class="row">
         <div class="input-field col s6">
            <input id="usuario" type="text" class="validate" name='cargo'>
            <label for="usuario">Cargo <i class='material-icons icon-form'>card_membership</i></label>    
         </div>
         <div class="input-field col s6">
            <input id="carnet" type="text" class="validate" name='empresa'>
            <label for="carnet">Empresa <i class='material-icons icon-form'>domain</i></label>
         </div>
      </div>
      <div class="row">
         <div class="input-field col s6">
            <input id="grado" type="text" class="validate" name='direccion'>
            <label for="grado">Dirección <i class='material-icons icon-form'>edit</i></label>
         </div>
         <div class="input-field col s6">
            <input id="especialidad" type="text" class="validate" name='telefono'>
            <label for="especialidad">Teléfono <i class='material-icons icon-form'>local_phone</i></label>
         </div>
      </div>
   </div>
      <!--BOTON-->
      <div class="row">
      <div class="col offset-l3 l11">
         <button class="waves-effect waves-light btn boton-editar2 sg2" type='submit' name='crear'> Agregar</button>
         <a href="../../dashboard/patrocinadores/index.php" class="waves-effect waves-light btn boton-editar2 offset-l4 sg1" type='submit' name='cancelar'> Cancelar </a>
      </div>
      </div>
   </form>
</div>


 
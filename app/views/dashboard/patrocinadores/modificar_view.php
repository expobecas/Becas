<!--FORMULARIO PARA EDICIÓN DE PERFIL-->
<div class="row">
   <form class="col s12 l6 offset-l4 white edit_form" method='POST'>
      <p class="titulo-EP"><strong>Editar Patrocinador</strong></p>
      <div class="divider"></div>
      <!--PRIMERA FILA-->
      <div class="row">
         <div class="input-field col s6">
         <?php
           Page::showSelect("categoria", "categoria", $patrocinadores->getTipo(), $patrocinadores->getCategorias());                                     
         ?>
         </div>
         <div class="input-field col s6">
            <input id="profesion" type="text" class="validate" name='profesion' value="<?php print($patrocinadores->getProfesion());?>">
            <label for="profesion">Profesion</label>
         </div>
      </div>
      <!--SEGUNDA FILA-->
      <div class="row">
         <div class="input-field col s6">
            <input id="nombres" type="text" class="validate" name='nombres' value="<?php print($patrocinadores->getNombres());?>">
            <label for="nombres">Nombres</label>
         </div>
         <div class="input-field col s6">
            <input id="apellidos" type="text" class="validate" name='apellidos' value="<?php print($patrocinadores->getApellidos());?>">
            <label for="apellidos">Apellidos</label>
         </div>
         
      </div>
      <!--TERCERA FILA-->
      <div class="row">
         <div class="input-field col s6">
            <input id="cargo" type="text" class="validate" name='cargo' value="<?php print($patrocinadores->getCargo());?>">
            <label for="cargo">Cargo</label>    
         </div>
         <div class="input-field col s6">
            <input id="empresa" type="text" class="validate" name='empresa' value="<?php print($patrocinadores->getNombre_empresa());?>">
            <label for="empresa">Empresa</label>
         </div>
      </div>
      <div class="row">
         <div class="input-field col s6">
            <input id="direccion" type="text" class="validate" name='direccion' value="<?php print($patrocinadores->getDireccion());?>">
            <label for="direccion">Dirección</label>
         </div>
         <div class="input-field col s6">
            <input id="telefono" type="text" class="validate" name='telefono' value="<?php print($patrocinadores->getTelefono());?>">
            <label for="telefono">Teléfono</label>
         </div>
      </div>
      <!--BOTON-->
      <div class="row">
      <div class="col offset-l4 l11">
         <button class="waves-effect waves-light btn boton-editar2 offset-l4 sg2" type='submit' name='actualizar'> Editar información </button>
      </div>
      </div>
   </form>
</div>


 
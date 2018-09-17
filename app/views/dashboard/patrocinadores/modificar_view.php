<!--FORMULARIO PARA AGREGAR PATROCINADORES-->
<div class="row">
   <form class="col s12 l7 offset-l4 m10 offset-m1 white edit_form" method='POST' autocomplete="off"> <!--OFFSET = CUANTAS COLUMNAS DEBE MOVERSE EL OBJETO-->
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
            <input id="nombre2" type="text" class="validate" name='profesion' value="<?php print($patrocinadores->getProfesion());?>">
            <label for="nombre2">Profesion</label>
         </div>
      </div>
      <!--SEGUNDA FILA--> 
      <div class="row">
         <div class="input-field col s6">
            <input id="usuario" type="text" class="validate" name='cargo'  value="<?php print($patrocinadores->getCargo());?>">
            <label for="usuario">Cargo</label>    
         </div>
         <div class="input-field col s6">
            <input id="carnet" type="text" class="validate" name='empresa'  value="<?php print($patrocinadores->getNombre_empresa());?>">
            <label for="carnet">Empresa</label>
         </div>
      </div>
            <!--DATOS--> 
            <div class="row">
         <div class="input-field col s6">
            <input id="nombres" type="text" class="validate" name='nombres'  value="<?php print($patrocinadores->getNombres());?>">
            <label for="nombres">Nombres</label>    
         </div>
         <div class="input-field col s6">
            <input id="apellidos" type="text" class="validate" name='apellidos'  value="<?php print($patrocinadores->getApellidos());?>">
            <label for="apellidos">Apellidos</label>
         </div>
      </div>
         <!--TERCER FILA--> 
      <div class="row">
         <div class="input-field col s6">
            <input id="grado" type="text" class="validate" name='direccion'  value="<?php print($patrocinadores->getDireccion());?>">
            <label for="grado">Dirección</label>
         </div>
         <div class="input-field col s6">
            <input id="especialidad" type="text" class="validate" name='telefono'  value="<?php print($patrocinadores->getTelefono());?>">
            <label for="especialidad">Teléfono</label>
         </div>
      </div>
   </div>
   <!--CUARTA FILA-->
   <div class="row">
         <div class="input-field col s12">
            <input id="correo" type="email" class="validate" name='correo' value="<?php print($patrocinadores->getCorreo());?>">
            <label for="correo">Correo</label>
         </div>
   </div>
      <!--BOTON-->
      <div class="row">
      <div class="col offset-l3 l11 offset-m3 offset-s1">
         <button class="waves-effect waves-light btn boton-editar2 sg3" type='submit' name='actualizar'> Modificar</button>
         <a href="../../dashboard/patrocinadores/index.php" class="waves-effect waves-light btn boton-editar2 offset-l4 sg1" type='submit' name='cancelar'> Cancelar </a>
      </div>
      </div>
   </form>
</div>


 
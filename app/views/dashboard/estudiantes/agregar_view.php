<!--FORMULARIO PARA EDICIÓN DE PERFIL-->
<div class="row">
   <form class="col s12 l7 offset-l4 white edit_form" method='POST' autocomplete="off">
      <p class="titulo-EP"><strong>Agregar estudiante</strong></p>
         <div class="input-field col s6 l6">
            <input id="nombre1" type="text" name='nombre1' class='validate' value='<?php print($estudiantes->getNombre1()) ?>' required/>
            <label for="nombre1">Primer nombre</label>
         </div>
      <div class="row">
         <div class="input-field col s6 l6">
            <input id="nombre2" type="text" name="nombre2" class='validate' value='<?php print($estudiantes->getNombre2()) ?>' required/>
            <label for="nombre2">Segundo nombre</label>
         </div>
         <div class="input-field col s6 l6">
            <input id="apellido1" type="text" name='apellido1' class='validate' value='<?php print($estudiantes->getApellido1()) ?>' required/>
            <label for="apellido1">Primer apellido</label>
         </div>
         <div class="input-field col s6 l6">
            <input id="apellido2" type="text" name='apellido2' class='validate' value='<?php print($estudiantes->getApellido2()) ?>' required/>
            <label for="apellido2">Segundo apellido</label>
         </div>
      </div>
      <div class="row">
         <div class="input-field col s12 l6">
            <input id="usuario" type="text" name='usuario' class='validate' value='<?php print($estudiantes->getUsuario()) ?>' required/>
            <label for="usuario">Usuario</label>
            </div>
         <div class="input-field col s6 l6">
            <input id="clave1" type="password" name='clave1' class='validate' value='<?php print($estudiantes->getContraseña()) ?>' required/>
            <label for="clave1">Contraseña</label>
         </div>
         <div class='input-field col s6 m6'>
            <input id='clave2' type='password' name='clave2' class='validate'/>
            <label for='clave2'>Confirmar contraseña</label>
        </div>
        <div class="input-field col s12 l6">
            <input id="carnet" type="text" name='carnet' class='validate' value='<?php print($estudiantes->getNum_carnet()) ?>' required/>
            <label for="carnet">N_carnet</label>
            </div>
            <div class="input-field col s6 l6">
            <input id="grado" type="text" name='grado' class='validate' value='<?php print($estudiantes->getGrado()) ?>' required/>
            <label for="grado">Grado</label>
            </div>
            <div class="input-field col s6 l6">
            <input id="especialidad" type="text" name='especialidad' class='validate' value='<?php print($estudiantes->getEspecialidad()) ?>' required/>
            <label for="especialidad">Especilidad</label>
            </div>


      </div>
   </div>
      <!--BOTON-->
      <div class="row">
      <div class="col offset-l7 l11">
         <button class="waves-effect waves-light btn boton-editar2 sg2" type='submit' name='crear'> Agregar</button>
         <a href="../../dashboard/estudiantes/index.php" class="waves-effect waves-light btn boton-editar2 offset-l4 sg1" type='submit' name='cancelar'> Cancelar </a>
      </div>
      </div>
   </form>
</div>
<!--FORMULARIO PARA EDICIÓN DE PERFIL-->
<div class="row">
   <form class="col s12 l6 offset-l4 white edit_form" method='POST'>
      <p class="titulo-EP"><strong>Editar Perfil</strong></p>
      <div class="divider"></div>
      <!--PRIMERA FILA-->
      <div class="row">
         <div class="input-field col s6">
            <input id="nombre1" type="text" class="validate" name='nombre1'  disabled value='<?php print($estudiantes->getNombre1())?>' required/>
            <label for="nombre1">Primer nombre</label>
         </div>
         <div class="input-field col s6">
            <input id="nombre2" type="text" class="validate" name='nombre2'  disabled value='<?php print($estudiantes->getNombre2())?>' required/>
            <label for="nombre2">Segundo nombre</label>
         </div>
      </div>
      <!--SEGUNDA FILA-->
      <div class="row">
         <div class="input-field col s6">
            <input id="apellido1" type="text" class="validate" name='apellido1'  disabled value='<?php print($estudiantes->getApellido1())?>' required/>
            <label for="apellido1">Primer apellido</label>
         </div>
         <div class="input-field col s6">
            <input id="apellido2" type="text" class="validate" name='apellido2' disabled value='<?php print($estudiantes->getApellido2())?>' required/>
            <label for="apellido2">Segundo apellido</label>
         </div>
         
      </div>
      <!--TERCERA FILA-->
      <div class="row">
         <div class="input-field col s6">
            <input id="usuario" type="text" class="validate" name='usuario' value='<?php print($estudiantes->getUsuario())?>' required/>
            <label for="usuario">Usuario</label>    
         </div>
         <div class="input-field col s6">
            <input id="carnet" type="text" class="validate" name='carnet' disabled value='<?php print($estudiantes->getNum_carnet())?>' required/>
            <label for="carnet">Carnet</label>
         </div>
      </div>
      <div class="row">
         <div class="input-field col s6">
            <input id="grado" type="text" class="validate" name='grado' disabled value='<?php print($estudiantes->getGrado())?>' required/>
            <label for="grado">Grado</label>
         </div>
         <div class="input-field col s6">
            <input id="especialidad" type="text" class="validate" name='especialidad' disabled value='<?php print($estudiantes->getEspecialidad())?>' required/>
            <label for="especialidad">Especialidad</label>
         </div>
      </div>
      <!--BOTON-->
      <div class="row">
      <div class="col offset-l4 l11">
         <button class="waves-effect waves-light btn boton-editar2 offset-l4" type='submit' name='editar'> Editar información </button>
      </div>
      </div>
   </form>
</div>


 
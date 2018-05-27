<!--FORMULARIO PARA EDICIÓN DE PERFIL-->
  <div class="row">
    <form class="col s12 l6 offset-l4 white edit_form" method='POST'>
        <p class="titulo-EP"><strong>Editar Perfil</strong></p>
        <div class="divider"></div>
    <!--PRIMERA FILA-->
      <div class="row">
        <div class="input-field col s6">
          <input id="nombre1" type="text" class="validate" name='nombre1'  value='<?php print($estudiantes->getNombre1())?>' required/>
          <label for="nombre1">Primer nombre</label>
        </div>
        <div class="input-field col s6">
          <input id="nombre2" type="text" class="validate" name='nombre2' value='<?php print($estudiantes->getNombre2())?>' required/>
          <label for="nombre2">Segundo nombre</label>
        </div>
      </div>
      <!--SEGUNDA FILA-->
      <div class="row">
      <div class="input-field col s6">
      <input id="apellido1" type="text" class="validate" name='apellido1' value='<?php print($estudiantes->getApellido1())?>' required/>
      <label for="apellido1">Primer apellido</label>
    </div>
    <div class="input-field col s6">
      <input id="apellido2" type="text" class="validate" name='apellido2'value='<?php print($estudiantes->getApellido2())?>' required/>
      <label for="apellido2">Segundo apellido</label>
    </div>
      </div>
      <!--TERCERA FILA-->
      <div class="row">
      <div class="input-field col s6">
      <input id="usuario" type="text" class="validate" name='usuario' value='<?php print($estudiantes->getUsuario())?>' required/>
      <label for="usuario">Usuario</label>
    </div>
      </div>
      <div class="boton-editar">
      <button class="waves-effect waves-light btn boton-editar2 offset-l4" type='submit' name='editar'>Editar información</button>
  </div>
    </form>
  </div>
 
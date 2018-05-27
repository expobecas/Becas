<div class="ingresar_fondo">
<div class="row">
    <form method='post' class="col s12 m8 l4 push-l4 cuadrado push-m2 z-depth-5  ingresar_form">
    <!--<h5 class="white-text">Acceder</h5>-->
      <div class="row">
      <img class="logo" src="../../../web/img/login/logo_ricaldone.png" alt="logo">
        <div class="input-field col s12">
          <input id='usuario' type="text" name='usuario' class="validate" value='<?php print($alumno->getUsuario()) ?>' required>
          <label for='usuario'>Usuario</label>
        </div>
        <div class="input-field col s12">
          <input id="password" type="password" name='clave' class="validate" value='<?php print($alumno->getContraseña()) ?>' required>
          <label for="password">Contraseña</label>
        </div>
      </div>
      <button class="waves-effect waves-light btn ingresar" type='submit' name='ingresar'>Ingresar</button>      
      </div>
    </form>
  </div>
  </div>
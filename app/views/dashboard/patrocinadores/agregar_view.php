<!--FORMULARIO PARA EDICIÓN DE PERFIL-->
<div class="row">
   <form class="col s12 l6 offset-l4 white edit_form" method='POST'>
      <p class="titulo-EP"><strong>Agregar patrocinador</strong></p>
      <div class="divider"></div>
      <!--PRIMERA FILA-->
      <div class="row">
         <div class="input-field col s6">
         <?php
           Page::showSelect("tipo", "tipo", $patrocinadores->getTipo(), $patrocinadores->getCategorias());                                     
         ?>
         </div>
         <div class="input-field col s6">
            <input id="nombre2" type="text" class="validate" name='profesion'>
            <label for="nombre2">Profesion</label>
         </div>
      </div>
      <!--SEGUNDA FILA-->
      <div class="row">
         <div class="input-field col s6">
            <input id="apellido1" type="text" class="validate" name='nombres' >
            <label for="apellido1">Nombres</label>
         </div>
         <div class="input-field col s6">
            <input id="apellido2" type="text" class="validate" name='apellidos'>
            <label for="apellido2">Apellidos</label>
         </div>
         
      </div>
      <!--TERCERA FILA-->
      <div class="row">
         <div class="input-field col s6">
            <input id="usuario" type="text" class="validate" name='cargo'>
            <label for="usuario">Cargo</label>    
         </div>
         <div class="input-field col s6">
            <input id="carnet" type="text" class="validate" name='empresa'>
            <label for="carnet">Empresa</label>
         </div>
      </div>
      <div class="row">
         <div class="input-field col s6">
            <input id="grado" type="text" class="validate" name='direccion'>
            <label for="grado">Dirección</label>
         </div>
         <div class="input-field col s6">
            <input id="especialidad" type="text" class="validate" name='telefono'>
            <label for="especialidad">Teléfono</label>
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


 
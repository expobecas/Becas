<!--FORMULARIO PARA EDICIÓN DE PERFIL-->
<div class="row">
   <form class="col s4 l8 offset-l3  white edit_form" method='POST' autocomplete="off">
      <p class="titulo-EP"><strong>Agregar becas</strong></p>
      <div class="divider"></div>
      <!--PRIMERA FILA-->
      <div class="row">
         <div class="input-field col s8 l5">
         <?php
           Page::showSelect("Codigo del estudiante", "detalle", $becas->getDetalle(), $becas->getDetalles());                                     
         ?>
   </div>
          <div class="input-field col s10 l5">
         <?php
           Page::showSelect("Patrocinador", "patrocinador",  $becas->getPatrocinador(), $becas->getPatrocinadores());                                     
         ?>
         </div>
         <div class="row">
         <div class="input-field col s8 l5">
         <?php
           Page::showSelect("Periodo de pago", "periodo", $becas->getPeriodo_pago(), $becas->getPeriodo());                                     
         ?>
      <!--SEGUNDA FILA-->
      
         <div class="input-field col s10">
         <input id="fecha" name='fecha' type="text" class="datepicker">
         <label for="fecha">Fecha<i class='material-icons icon-form'>event</i></label>
         </div>
         </div>
      </div>
      <!--BOTON-->
      <div class="row">
      <div class="col offset-l3 l8">
         <button class="waves-effect waves-light btn boton-editar2 sg2" type='submit' name='crear'> Agregar</button>
         <a href="../../dashboard/becas/index.php" class="waves-effect waves-light btn boton-editar2 offset-l8 sg1" type='submit' name='cancelar'> Cancelar </a>
      </div>
      </div>
   </form>
</div>
<!--FORMULARIO PARA EDICIÓN DE PERFIL-->
<div class="row">
   <form class="col s4 l7 offset-l4 white edit_form" method='POST'>
      <p class="titulo-EP"><strong>Agregar becas</strong></p>
      <div class="divider"></div>
      <!--PRIMERA FILA-->
      <div class="row">
         <div class="input-field col s8">
         <?php
           Page::showSelect("Detalle", "detalle", $becas->getDetalle(), $becas->getDetalles());                                     
         ?>
         <div class="row">
         <div class="input-field col s10">
         <?php
           Page::showSelect("Patrocinador", "patrocinadores",  $becas->getPatrocinador(), $becas->getPatrocinadores());                                     
         ?>
         </div>
         <div class="input-field col s10">
            <input id="monto" type="text" class="validate" name='monto'>
            <label for="monto">Monto</label>
         </div>
      </div>
      <!--SEGUNDA FILA-->
      <div class="row">
         <div class="input-field col s10">
            <input id="periodo" type="text" class="validate" name='periodo' >
            <label for="periodo">Periodo de pago</label>
         </div>
         <div class="input-field col s10">
            <input id="fecha" type="text" class="validate" name='fecha'>
            <label for="fecha">Fecha</label>
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
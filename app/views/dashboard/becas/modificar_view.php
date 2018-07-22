<!--FORMULARIO PARA EDICIÓN DE PERFIL-->
<div class="row">
   <form class="col s12 l6 offset-l4 white edit_form" method='POST'>
      <p class="titulo-EP"><strong>Modificar becas</strong></p>
      <div class="divider"></div>
      <!--PRIMERA FILA-->
      <div class="row">
         <div class="input-field col s4">
         <?php
           Page::showSelect("detalle", "detalle", $becas->getDetalle(), $becas->getDetalles());                                     
         ?>
         <div class="row">
         <div class="input-field col s4">
         <?php
           Page::showSelect("patrocinador", "patrocinador", $becas->getPatrocinador(), $becas->getPatrocinadores());                                     
         ?>
         </div>
         <div class="input-field col s6">
            <input id="monto" type="text" class="validate" name='monto'>
            <label for="monto">Monto</label>
         </div>
      </div>
      <!--SEGUNDA FILA-->
      <div class="row">
         <div class="input-field col s6">
            <input id="periodo" type="text" class="validate" name='periodo' >
            <label for="periodo">Periodo de pago</label>
         </div>
         <div class="input-field col s6">
            <input id="fecha" type="text" class="validate" name='fecha'>
            <label for="fecha">Fecha</label>
         </div>
         
      </div>
      <!--BOTON-->
      <div class="row">
      <div class="col offset-l3 l11">
         <button class="waves-effect waves-light btn boton-editar2 sg2" type='submit' name='crear'> Agregar</button>
         <a href="../../dashboard/becas/index.php" class="waves-effect waves-light btn boton-editar2 offset-l4 sg1" type='submit' name='cancelar'> Cancelar </a>
      </div>
      </div>
   </form>
</div>
<!--FORMULARIO PARA EDICIÓN DE PERFIL-->
<div class="row">
   <form class="col s12 l7 offset-l4 white edit_form" method='POST' autocomplete="off">
      <p class="titulo-EP"><strong>Modificar pagos</strong></p>
         <div class="input-field col s4 l6">
            <input id="fecha1" name='fecha1' input type="text" class="datepicker" value='<?php print($pagos->getFechaRecibo()) ?>' required/>
            <label for="fecha1">Fecha<i class='material-icons icon-form'>mail_outline</i></label>
         </div>
         <div class="row col m12">
         <div class="input-field col s12 l6">
            <?php Page::showSelect("Patrocinador", "tipo", $pagos->getId_patrocinador(), $pagos->getPatrocinadores());?>
         </div>
         <div class="input-field col s4 l6">
            <input id="monto" type="text" name='monto' class='validate' value='<?php print($pagos->getMonto()) ?>' required/>
            <label for="monto">Monto<i class='material-icons icon-form'>drafts</i></label>
         </div>
      </div>
      <div class="row">
      <div class="input-field col s4 l6">
      <input id="fecha2" name='fecha2' input type="text" class="datepicker" value='<?php print($pagos->getFechaEntregado()) ?>' required/>
      <label for="fecha2">Fecha<i class='material-icons icon-form'>event</i></label>
   </div>

      </div>
   </div>
      <!--BOTON-->
      <div class="row">
      <div class="col offset-l7 l11">
         <button class="waves-effect waves-light btn boton-editar2 sg2" type='submit' name='actualizar'>Modificar</button>
         <a href="../../dashboard/pagos/index.php" class="waves-effect waves-light btn boton-editar2 offset-l4 sg1" type='submit' name='cancelar'> Cancelar </a>
      </div>
      </div>
   </form>
</div>
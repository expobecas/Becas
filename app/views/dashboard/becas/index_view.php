<!--TÍTULO-->
<div class="row">
   <div class="col offset-l3 titulo-font">
      <h4>
         Becas
      </h4>
   </div>
</div>
<!--BOTONES-->
<div class="row">
<div class="col offset-l10">
      <a class="waves-effect waves-light btn s-general sg3" href="agregar.php">Agregar</a>
   </div>
   <div class="col">
   </div>
</div>
<!--TABLA SOLICITUDES GENERALES-->

<div class="row">
<div class="tabla">
   <div class="col offset-l3 l8 white">
   <div class="col titulo-font">
      <h5>Información</h5>
   </div>
      <table class="white highlight bordered tb-sol text-tbody">
         <thead class="color-thead">
            <tr>
               <th>DETALLE</th>
               <th>PATROCINADOR</th>
               <th>MONTO</th>
               <th>PERIODO DE PAGO</th>
               <th>FECHA</th>
               <th>Acción</th>
            </tr>
         </thead>
         <tbody>
         <?php 
               foreach($data as $row){
               print("
               <tr>
               <td>$row[id_detalle]</td>
               <td>$row[nombre_empresa]</td>
               <td>$row[monto]</td>
               <td>$row[periodo_pago]</td>
               <td>$row[fecha_ini_beca]</td>
               <td>
               <a href='modificar.php?id=$row[id_becas]' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Editar'><img src='../../web/img/admin/icon/edit.png'></a>
               <a href='eliminar.php?id=$row[id_becas]' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Eliminar'><img src='../../web/img/admin/icon/eraser.png'></a>
               </td>
               </tr>");
               }
            ?>
         </tbody>
      </table>
   </div>
</div>
</div>
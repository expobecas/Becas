<!--TÍTULO-->
<div class="row">
   <div class="col offset-l3 titulo-font">
      <h4>
         Becas
      </h4>
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
               <th>Carnet</th>
               <th>Nombres</th>
               <th></th>
               <th>Apellidos</th>
               <th></th>
               <th>Grado</th>
               <th>Monto</th>
               <th>Periodo de pago</th>
               <th>Estado</th>
               <th>Acción</th>
            </tr>
         </thead>
         <tbody>
         <?php 
               foreach($data as $row){
               print("
               <tr>
               <td>$row[n_carnet]</td>
               <td>$row[primer_nombre]</td>
               <td>$row[segundo_nombre]</td>
               <td>$row[primer_apellido]</td>
               <td>$row[segundo_apellido]</td>
               <td>$row[grado]</td>
               <td>$row[monto]</td>
               <td>$row[periodo_pago]</td>
               <td>$row[estado_solicitud]</td>
               <td>
               <a href='../../../app/views/public/jefes/reportes/becas.php?id=$row[id_becas]' target='_blank' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Más información'><img src='../../../web/img/jefes/icon/clipboard.png'></a>
               </td>
               </tr>");
               }
            ?>
         </tbody>
      </table>
   </div>
</div>
</div>  
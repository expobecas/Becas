<!--TÍTULO-->
<div class="row">
   <div class="col offset-l3 titulo-font">
      <h4>Solicitudes</h4>
   </div>
</div>
<!--BOTONES-->
<div class="row">
<div class="col offset-l10 l7">
<a class="waves-effect waves-light btn s-general sg3 tooltipped " href="../../app/views/dashboard/solicitudes/reporte_solicitudTipo.php" data-tooltip='Solicitud por tipo' data-position='bottom' >Reporte</a>
 </div>
   </div>
</div>
<!--TABLA SOLICITUDES GENERALES-->
<div class="tabla">
<div class="row">
   <div class="col offset-l3 l8 white">
      <div class="col titulo-font">
            <h5>Todas las solicitudes.</h5>
      </div>
      <table class="white highlight bordered tb-sol">
         <thead class="color-thead">
            <tr>
               <th>N° Solicitud</th>
               <th>Nombre</th>
               <th>Apellido</th>
               <th>Carnet</th>
               <th>Grado</th>
               <th>Especialidad</th>
               <th>Encargada/o</th>
               <th>Teléfono</th>
               <th>Acción</th>
            </tr>
         </thead>
         <tbody>
            <?php 
               foreach($data as $row){
               print("
               <tr>
               <td>$row[id_solicitud]</td>
               <td>$row[primer_nombre]</td>
               <td>$row[primer_apellido]</td>
               <td>$row[n_carnet]</td>
               <td>$row[grado]</td>
               <td>$row[especialidad]</td>
               <td>$row[encargado]</td>
               <td>$row[tel_fijo]</td>
               <td>
               <a href='detalle_solicitud.php' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Ver solicitud'><img src='../../web/img/admin/icon/clipboard.png'></a>
               <a href='../citas/index.php?id=$row[id_detalle]' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Agregar Cita'><img src='../../web/img/admin/icon/folder.png'></a>
               <a href='../casos/create_caso.php?id=$row[id_detalle]' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Agregar Caso'><img src='../../web/img/admin/icon/folder.png'></a>
               </td>
               </tr>");
               }
            ?>
         </tbody>
      </table>
   </div>
</div>
</div>
<!--ULTIMAS SOLICITUDES-->
<div class="tabla">
<div class="row">
   <div class="col offset-l3 l8 white">
   <div class="col titulo-font">
      <h5>Ultimas solicitudes entrantes.</h5>
   </div>
      <table class="white highlight bordered tb-sol">
         <thead class="color-thead">
            <tr>
            <th>N° Solicitud</th>
               <th>Nombre</th>
               <th>Apellido</th>
               <th>Carnet</th>
               <th>Grado</th>
               <th>Especialidad</th>
               <th>Encargada/o</th>
               <th>Teléfono</th>
               <th>Acción</th>
            </tr>
         </thead>
         <tbody>
            <?php 
               foreach($data2 as $row){
               print("
               <tr>
               <td>$row[id_solicitud]</td>
               <td>$row[primer_nombre]</td>
               <td>$row[primer_apellido]</td>
               <td>$row[n_carnet]</td>
               <td>$row[grado]</td>
               <td>$row[especialidad]</td>
               <td>$row[encargado]</td>
               <td>$row[tel_fijo]</td>
               <td>
               <a href='detalle_solicitud.php' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Ver solicitud'><img src='../../web/img/admin/icon/clipboard.png'></a>
               <a href='detalle_solicitud.php' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Agregar caso'><img src='../../web/img/admin/icon/folder.png'></a>
               </td>
               </tr>");
               }
               ?>
         </tbody>
      </table>
   </div>
</div>
</div>
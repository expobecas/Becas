<!--TÍTULO-->
<div class="row">
   <div class="col offset-l3 titulo-font">
      <h4>
         Estado de las solicitudes
      </h4>
   </div>
</div>
<!--TÍTULO SOLICITUDES APROBADAS-->
<div class="row">
   <div class="col offset-l3 titulo-font">
      <h5>
         Solicitudes aprobadas
      </h5>
   </div>
</div>
<!--TABLA SOLICITUDES APROBADAS-->
<div class="tabla">
<div class="row">
   <div class="col offset-l3 l8 white">
   <div class="col titulo-font">
      <h5>Datos</h5>
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
               if($data){
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
                    <a href='detalle_solicitud.php' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Ver solicitud'><img src='../../../web/img/jefes/icon/clipboard.png'></a>
                    </td>
                    </tr>");
                    }
               }else{
                   print("
                   <tr>
                  <td>No hay solicitudes aprobadas<td>
                  </tr>");
               }
            ?>
         </tbody>
      </table>
   </div>
</div>
</div>
<!--TÍTULO SOLICITUDES RECHAZADAS-->
<div class="row">
   <div class="col offset-l3 titulo-font">
      <h5>
         Solicitudes rechazadas
      </h5>
   </div>
</div>
<!--TABLA SOLICITUDES RECHAZADAS-->
<div class="tabla">
<div class="row">
   <div class="col offset-l3 l8 white">
   <div class="col titulo-font">
      <h5>Datos</h5>
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
               if($data2){
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
                    <a href='detalle_solicitud.php' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Ver solicitud'><img src='../../../web/img/jefes/icon/clipboard.png'></a>
                    </td>
                    </tr>");
                    }
               }else{
                   print("
                   <tr>
                  <td>No hay solicitudes rechazadas<td>
                  </tr>");
               }
            ?>
         </tbody>
      </table>
   </div>
</div>
</div>
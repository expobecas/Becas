<!--TÍTULO-->
<div class="row">
   <div class="col offset-l3 titulo-font">
      <h4>
         Solicitudes
      </h4>
   </div>
</div>
<!--BOTONES-->
<div class="row">
   <div class="col offset-l5">
      <a class="waves-effect waves-light btn s-general sg3">Aprobadas</a>
   </div>
   <div class="col">
      <a class="waves-effect waves-light btn s-general sg1">En proceso</a>
   </div>
   <div class="col">
      <a class="waves-effect waves-light btn s-general sg2">Rechazadas</a>
   </div>
</div>
<!--TABLA SOLICITUDES GENERALES-->
<div class="tabla">
<div class="row">
   <div class="col offset-l3 l8 white">
   <div class="col titulo-font ">
      <h5>Todas las solicitudes.</h5>
   </div>
      <table class="white highlight bordered tb-sol">
         <thead class="color-thead">
            <tr>
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
               <td>$row[primer_nombre]</td>
               <td>$row[primer_apellido]</td>
               <td>$row[n_carnet]</td>
               <td>$row[grado]</td>
               <td>$row[especialidad]</td>
               <td>$row[encargado]</td>
               <td>$row[tel_fijo]</td>
               <td>
               <a href='' class='ver-mas tooltipped' data-position='right' data-delay='50' data-tooltip='Ver más'><i class='material-icons'>remove_red_eye</i></a>
               </td>
               </tr>");
               }
            ?>
         </tbody>
      </table>
   </div>
</div>
</div>
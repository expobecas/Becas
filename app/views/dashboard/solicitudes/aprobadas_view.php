<!--TÍTULO-->
<div class="row">
   <div class="col offset-l3 titulo-font">
      <h4>Solicitudes</h4>
   </div>
</div>
<!--BOTONES/OPCIONES -->
<?php 
require_once("opciones_view.php");
?>
<!--TABLA SOLICITUDES APROBADAS-->
<div class="tabla">
<div class="row">
<div class="col white offset-l3 l8 offset-m1 m10 s12">
      <div class="col titulo-font">
            <h5>Solicitudes aprobadas</h5>
            <p>En este apartado pueden visualizarse solo las solicitudes aprobadas.</p>
            </div>
            </div>
            <div class="col offset-l3 white l8 offset-m1 m10 s12">
            <table class="white highlight bordered striped responsive-table">
                  <thead class="color-thead">
                  <tr class="letra">
                        <th>N° Solicitud</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Carnet</th>
                        <th>Grado</th>
                        <th>Especialidad</th>
                        <th>Encargada/o</th>
                        <th>Teléfono</th>
                        <th>Fecha de ingreso</th>
                        <th>Acción</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  foreach($data as $row)
                  {
                  $id_detalle = $row['id_detalle'];
                  $id_detalle = password_hash($id_detalle, PASSWORD_DEFAULT);
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
                  <td>$row[fecha]</td>
                  <td>
                  <a href='detalle_solicitud.php' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Ver solicitud'><img src='../../web/img/admin/icon/clipboard.png'></a>
                  </td>
                  </tr>");
                  }
                   ?>
                  </tbody>
            </table>
      </div>
      </div>
</div>
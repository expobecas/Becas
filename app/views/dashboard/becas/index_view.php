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
    <div class="col offset-l7 offset-s3 offset-m2">
        <div class="col">
            <a class="waves-effect waves-light btn s-general sg3 tooltipped"  data-tooltip='Agregar una beca' data-position='bottom' href="agregar.php">Agregar &nbsp</a>
        </div>
        <div class="col">
            <a class="waves-effect waves-light btn s-general sg1 tooltipped "  target="_blank" href="../../app/views/dashboard/becas/reporte_becas.php" data-tooltip='Reporte de becas' data-position='bottom'>Reporte de becas</a>
        </div>
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
               <th>CODIGO DEL ESTUDIANTE</th>
               <th>PRIMER NOMBRE</th>
               <th>PRIMER APELLIDO</th>
               <th>PATROCINADOR</th>
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
               <td>$row[n_carnet]</td>
               <td>$row[primer_nombre]</td>
               <td>$row[primer_apellido]</td>
               <td>$row[nombre_empresa]</td>
               <td>$row[periodo]</td>
               <td>$row[fecha_ini_beca]</td>
               <td>
               <a href='modificar.php?id=$row[id_becas]' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Editar'><img src='../../web/img/admin/icon/edit.png'></a>
               </td>
               </tr>");
               }
            ?>
         </tbody>
      </table>
   </div>
</div>
</div>
<?php require_once("../../app/controllers/dashboard/tipo_pago/index_controller.php"); ?>
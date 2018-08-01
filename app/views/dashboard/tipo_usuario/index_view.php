<!--TÍTULO-->
<div class="row">
   <div class="col offset-l3 titulo-font">
      <h5>
         Tipo usuario
      </h5>
   </div>
</div>
<!--TABLA SOLICITUDES GENERALES-->
<div id="tipo" class="row">
   <div class="row">
      <div class="tabla">
         <div class="col offset-l3 l4 m11 white">
            <div class="titulo-font">
               <h5>Tipo existentes</h5>
            </div>
            <table class="white highlight bordered tb-sol text-tbody responsive-table">
               <thead class="color-thead">
                  <tr>
                     <th>TIPO</th>
                     <th>ACCION</th>
                  </tr>
               </thead>
               <tbody>
                  <?php    
                     foreach($data as $row){
                     print("
                     <tr>
                     <td>$row[tipo_usuario]</td>
                     <td>
                     <a href='../../dashboard/tipo_usuario/modificar.php?id=$row[id_tipo]' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Editar'><img src='../../web/img/admin/icon/edit.png'></a>
                     <a href='../../dashboard/tipo_usuario/eliminar.php?id=$row[id_tipo]' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Eliminar'><img src='../../web/img/admin/icon/eraser.png'></a>
                     </td>
                     </tr>");
                     }
                     ?>
               </tbody>
            </table>
         </div>
      </div>
      <div class="row">
   <div class="col l3 offset-l1">
   <?php require_once("../../app/controllers/dashboard/tipo_usuario/agregar_controller.php");?> 
   </div>
   </div>
   </div>
</div>


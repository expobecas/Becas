<!--TÍTULO-->
<div class="row">
   <div class="col offset-l3 titulo-font">
      <h5>
         Categorías
      </h5>
   </div>
</div>
<!--TABLA SOLICITUDES GENERALES-->
<div id="#categorias" class="row">
<div class="tabla">
<div class="row">
      <div class="col white offset-l3 l4 offset-m1 m10 s12">
            <div class="col titulo-font">
                  <h5>Categorías</h5>
                  <p>Categorías que pueden poseer los patrocinadores.</p>
            </div>
      </div>
      <div class="col offset-l3 white l4 offset-m1 m10 s12">
      <table class="white highlight bordered tb-sol text-tbody responsive-table">
         <thead class="color-thead">
            <tr>
               <th>Categoria</th>
               <th>Acción</th>
            </tr>
         </thead>
         <tbody>
         <?php 
               foreach($data as $row){
               print("
               <tr>
               <td>$row[tipo_patrocinador]</td>
               <td>
               <a href='../../dashboard/categorias/modificar.php?id=$row[id_tipo_patro]' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Editar'><img src='../../web/img/admin/icon/edit.png'></a>
               <a href='../../dashboard/categorias/eliminar.php?id=$row[id_tipo_patro]' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Eliminar'><img src='../../web/img/admin/icon/eraser.png'></a>
               </td>
               </tr>");
               }
            ?>
         </tbody>
      </table>
</div>
<div class="col l3 offset-l1">
<?php require_once("../../app/controllers/dashboard/categorias/agregar_controller.php");?>
</div> 
</div>
</div>
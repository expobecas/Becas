<!--TÍTULO-->
<div class="row">
   <div class="col offset-l3 titulo-font">
      <h4>
         Patrocinadores
      </h4>
   </div>
</div>
<!--BOTONES-->
<div class="row">
<div class="col offset-l8">
        <a class="waves-effect waves-light btn s-general sg3 tooltipped" data-position='bottom' data-delay='50' data-tooltip='Agregar patrocinador' href="agregar.php">Agregar</a>
    </div>
<div class="col">
      <a class="waves-effect waves-light btn s-general sg1 tooltipped " href="../../app/views/dashboard/patrocinadores/tipo_reporte.php" data-tooltip='Usuarios por tipo' data-position='bottom' >Reporte</a>
   </div>
</div>
<!--TABLA SOLICITUDES GENERALES-->

<div class="row">
<div class="tabla">
    <div class="col white offset-l3 l8 offset-m1 m10 s12">
            <div class="col titulo-font">
                  <h5>Patrocinadores</h5>
                  <p>Aquí se puede visualizar la información principal, para ver más o modificar seleccione el icono del lápiz.</p>
            </div>
      </div>
      <div class="col offset-l3 white l8 offset-m1 m10 s12">
      <table class="white highlight bordered tb-sol text-tbody responsive-table">
         <thead class="color-thead">
            <tr>
               <th>Categoría</th>
               <th>Profesion</th>
               <th>Nombres</th>
               <th>Apellidos</th>
               <th>Acción</th>
            </tr>
         </thead>
         <tbody>                                                  
         <?php 
               foreach($data as $row){
               print("
               <tr>
               <td>$row[tipo_patrocinador]</td>
               <td>$row[profesion]</td>
               <td>$row[nombres]</td>
               <td>$row[apellidos]</td>
               <td>
               <a href='editar.php?id=$row[id_patrocinador]' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Editar y ver más'><img src='../../web/img/admin/icon/edit.png'></a>
               <a href='eliminar.php?id=$row[id_patrocinador]' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Eliminar'><img src='../../web/img/admin/icon/eraser.png'></a>
               </td>
               </tr>");
               }
            ?>
         </tbody>
      </table>
   </div>
</div>
</div>
<?php require_once("../../app/controllers/dashboard/categorias/index_controller.php"); ?>
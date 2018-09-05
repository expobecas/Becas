<!--TÍTULO-->
<div class="row">
   <div class="col offset-l3 titulo-font">
      <h4>
         Usuarios
      </h4>
   </div>
</div>
<!--BOTONES-->
<div class="row">
<div class="col offset-l9">
      <a class="waves-effect waves-light btn s-general sg3" href="agregar.php">Agregar</a>
   </div>
<div class="col ">
      <a class="waves-effect waves-light btn s-general sg1 tooltipped " href="../../app/views/dashboard/usuarios/tipousuario_reporte.php" data-tooltip='Usuarios por tipo' data-position='bottom' >Reporte</a>
   </div>
</div>
<!--TABLA USUARIO GENERALES-->
<div class="row">
<div class="tabla">
   <div class="col offset-l3 l8 s12 m11 white">
   <div class="titulo-font">
      <h5>Información</h5>
   </div>
      <table class="white highlight bordered tb-sol text-tbody responsive-table">
         <thead class="color-thead">
            <tr>
               <th>Tipo</th>
               <th>Nombres</th>
               <th>Apellidos</th>
               <th>Usuario</th>
               <th>Correo</th>
               <th>Acción</th>
            </tr>
         </thead>
         <tbody>
         <?php 
               foreach($data as $row){
               print("
               <tr>
               <td>$row[tipo_usuario]</td>
               <td>$row[nombres]</td>
               <td>$row[apellidos]</td>
               <td>$row[usuario]</td>
               <td>$row[correo]</td>
               <td>
               <a href='modificar.php?id=$row[id_usuario]' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Editar'><img src='../../web/img/admin/icon/edit.png'></a>
               <a href='eliminar.php?id=$row[id_usuario]' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Eliminar'><img src='../../web/img/admin/icon/eraser.png'></a>
               </td>
               </tr>");
               }
            ?>
         </tbody>
      </table>
   </div>
</div>
</div>
<?php require_once("../../app/controllers/dashboard/tipo_usuario/index_controller.php"); ?>

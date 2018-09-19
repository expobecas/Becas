<!--TÍTULO-->
<div class="row">
   <div class="col offset-l3 titulo-font">
      <h4>
         Estudiantes
      </h4>
   </div>
</div>
<!--BOTONES-->
<div class="row">
<div class="col offset-l10">
      <a class="waves-effect waves-light btn s-general sg3" href="agregar.php">Agregar</a>
   </div>
</div>
<!--TABLA SOLICITUDES GENERALES-->

<div class="row">
<div class="tabla">
<div class="col white offset-l3 l8 offset-m1 m10 s12">
            <div class="col titulo-font">
      <h5>Información</h5>
   </div>
   </div>
   <div class="col offset-l3 white l8 offset-m1 m10 s12">
      <table class="white highlight bordered tb-sol text-tbody responsive-table">
         <thead class="color-thead">
            <tr>
               <th>Primer nombre</th>
               <th>Segundo nombre</th>
               <th>Primer apellido</th>
               <th>Segundo apellido</th>
               <th>Usuario</th>
               <th>N_carnet</th>
               <th>Grado</th>
               <th>Especialidad</th>
            </tr>
         </thead>
         <tbody>                                                  
         <?php 
               foreach($data as $row){
               print("
               <tr>
               <td>$row[primer_nombre]</td>
               <td>$row[segundo_nombre]</td>
               <td>$row[primer_apellido]</td>
               <td>$row[segundo_apellido]</td>
               <td>$row[usuario]</td>
               <td>$row[n_carnet]</td>
               <td>$row[grado]</td>
               <td>$row[especialidad]</td>
               <td>
<<<<<<< HEAD
               <a href='modificar.php?id=$row[id_estudiante]' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Editar y ver más'><img src='../../web/img/admin/icon/edit.png'></a>
               <a href='eliminar.php?id=$row[id_estudiante]' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Eliminar'><img src='../../web/img/admin/icon/eraser.png'></a>
=======
>>>>>>> ceef539181d6eb3dc9ab8418692cfff897a11a1c
               </td>
               </tr>");
               }
            ?>
         </tbody>
      </table>
   </div>
</div>
</div>
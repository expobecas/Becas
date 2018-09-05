<!--TÍTULO-->
<div class="row">
   <div class="col offset-l3 titulo-font">
      <h4>
         Casos
      </h4>
   </div>
</div>
<!--TABLA CASOS GENERALES-->
<div class="row">
<div class="tabla">
   <div class="col offset-l3 l8 white">
   <div class="col titulo-font">
      <h5>Información</h5>
   </div>
      <table class="white highlight bordered tb-sol text-tbody">
             <!--Elementos que poseerá la tabla-->
      <thead>
         <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>CARNET</th>
            <th>GRADO</th>
            <th>ESPECIALIDAD</th>
            <th>ENCARGADA/O</th>
            <th>TELEFONO</th>
            <th>ACCION</th>
         </tr>
      </thead>
      <tbody>
      <?php
        foreach($data as $row){
            //Información de las tablas
        print("
        <tr>
            <td>$row[id_solicitud]</td>
            <td>$row[primer_nombre]</td>
            <td>$row[primer_apellido]</td>
            <td>$row[n_carnet]</td>
            <td>$row[grado]</td>
            <td>$row[especialidad]</td>
            <td>$row[encargado]</td>
            <td>$row[cel_mama]</td>
            <td> <a href='editar.php' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Eliminar'><img src='../../../web/img/admin/icon/eraser.png'></a></td>
        </tr>
        ");
      }?>
      </tbody>
      </table>
   </div>
</div>
</div>
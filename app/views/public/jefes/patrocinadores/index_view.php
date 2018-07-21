<!--TÍTULO PATROCINADORES-->
<div class="row">
   <div class="col offset-l3 titulo-font">
      <h4>
         Patrocinadores
      </h4>
   </div>
</div>
<!--TABLA = VISTA DE PATROCINADORES-->
<div class="row">
<div class="tabla">
   <div class="col offset-l3 l8 white">
   <div class="col titulo-font">
      <h5>Información</h5>
   </div>
      <table class="white highlight bordered tb-sol text-tbody">
         <thead class="color-thead">
            <tr>
               <th>Categoría</th>
               <th>Profesion</th>
               <th>Nombres</th>
               <th>Apellidos</th>
               <th>Cargo</th>
               <th>Empresa</th>
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
            <td>$row[cargo]</td>
            <td>$row[nombre_empresa]</td>
            <td>
            <a href='../../../app/views/public/jefes/reportes/patrocinadores.php?id=$row[id_patrocinador]' target='_blank' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Más información'><img src='../../../web/img/jefes/icon/clipboard.png'></a>
            </td>
            </tr>");
            }
            ?>
         </tbody>
      </table>
   </div>
</div>
</div>  
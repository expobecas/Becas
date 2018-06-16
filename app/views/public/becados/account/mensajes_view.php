<div class="row">
    <div class="col offset-l3 titulo-font">
    <h4>Bandeja de entrada</h4>
    </div>
</div>
<div class="row">
<div class="col l8 offset-l3 white">
   <table class="bordered highlight">
      <thead>
         <tr>
            <th>Usuario</th>
            <th>Comentario </th>
            <th>Fecha</th>
         </tr>
      </thead>
      <tbody>
          <?php
          foreach($data as $row){
              print("
              <tr>
              <td class='blue-text'>$row[nombres] $row[apellidos]</td>
              <td>$row[comentario]</td>
              <td>$row[fecha]</td>
              </tr>
              ");
          }
         ?>
      </tbody>
   </table>
</div>
</div>


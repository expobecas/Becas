<div class="row">
<div class="col l8 offset-l3 white">
   <table class="bordered highlight">
      <thead>
         <tr>
            <th>Usuario</th>
            <th>Comentario </th>
            <th>fecha</th>
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


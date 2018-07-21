<!--TITULO-->
<div class="row">
    <div class="col offset-l3 titulo-font">
    <h4>Mensajes envíados</h4>
    </div>
</div>
<!--TABLA DE BANDEJA DE COMENTARIOS-->
<div class="row">
<div class="col l8 offset-l3 white"> 
<table class="bordered highlight">
      <thead>
         <tr>
            <th>Estudiantes</th>
            <th>Comentario </th>
            <th>Fecha</th>
         </tr>
      </thead>
      <tbody>
          <?php
          if($data){
            foreach($data as $row){
                print("
                <tr>
                <td class='blue-text'>$row[primer_nombre] $row[primer_apellido]</td>
                <td>$row[comentario]</td>
                <td>$row[fecha]</td>
                </tr>
                ");
            }
          }else{
              print("
              <tr>
              <td>No tienes ningun mensaje</td>
              </tr>
              ");
          }
         ?>
      </tbody>
   </table>
</div>
</div>




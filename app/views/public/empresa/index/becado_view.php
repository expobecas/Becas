<!--Viista del carrito-->
<div class="container row">
    <table class="highlight col offset-l2 white" >
<!--Elementos que poseerá la tabla-->
        <thead>
        <tr>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>CARNET</th>
            <th>MONTO</th>
            <th>PERIODO DE PAGO</th>
            <th>FECHA INICIO</th>
            <th>ACCION</th>
        </tr>
        </thead>
        <tbody>
       
        <?php
        if($data){
        foreach($data as $row){
            //Información de las tablas
            print("
                <tr>
                    <td>$row[primer_nombre]</td>
                    <td>$row[primer_apellido]</td>
                    <td>$row[n_carnet]</td>
                    <td>$row[monto]</td>
                    <td>$row[periodo_pago]</td>
                    <td>$row[fecha_ini_beca]</td>
                    <td>
                 <a href='enviar_mensaje.php?id=$row[id_estudiante]' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Enviar mensaje'><img src='../../../web/img/empresa/icons/enviar.jpg'></a>
               </td>
                </tr>
            ");
        }
    }
        ?>
        </tbody>
    </table>
</div>

<div class="row">
<div class="col  l1 s12 m6 l2 offset-l3">
    <div class="card horizontal">
      <div class="card-image">
      <h5 class="header">Total: <?php echo $total[0][0]?> </h5>
      </div>
      <div class="card-stacked">
        <div class="card-content">
        </div>
      </div>
    </div>
  </div>
  </div>

<!--TABLA CATEGORÍA DE USUARIOS-->
<div id="tipo">
    <div class="row">
        <div class="tabla">
            <div class="col offset-l3 l4 m12 white">
                <div class="titulo-font">
                    <h5>Tipo existentes</h5>
                </div>
                <table class="white highlight bordered tb-sol text-tbody responsive-table">
                    <thead class="color-thead">
                        <tr>
                            <th>TIPO</th>
                            <th>ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php    
                     foreach($data as $row){
                     print("
                     <tr>
                     <td>$row[periodo]</td>
                     <td>
                     <a href='../../dashboard/tipo_pago/modificar.php?id=$row[id_periodo]' class='ver-mas tooltipped' data-position='bottom' data-delay='50' data-tooltip='Editar'><img src='../../web/img/admin/icon/edit.png'></a>
                     </td>
                     </tr>");
                     }
                     ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col l3 offset-l1 s12 m12 white">
                <?php require_once("../../app/controllers/dashboard/tipo_pago/agregar_controller.php");?>
            </div>
        </div>
    </div>
</div>
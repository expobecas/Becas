<?php
require_once("../../app/views/dashboard/templates/page.class.php");
Page::templateHeader("Actualizar Pagos");
require_once("../../app/controllers/dashboard/pagos/modificar_controller.php");
Page::templateFooter();
?>
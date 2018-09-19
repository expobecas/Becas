<?php
require_once("../../app/views/dashboard/templates/page.class.php");
Page::templateHeader("Agregar Pagos");
require_once("../../app/controllers/dashboard/pagos/agregar_controller.php");
Page::templateFooter();
?>
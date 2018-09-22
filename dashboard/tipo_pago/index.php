<?php
require_once("../../app/views/dashboard/templates/page.class.php");
Page::templateHeader("Periodo de pago");
require_once("../../app/controllers/dashboard/tipo_pago/index_controller.php");
Page::templateFooter();
?>
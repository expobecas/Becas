<?php
require_once("../../app/views/dashboard/templates/page.class.php");
Page::templateHeader("Pagos");
require_once("../../app/controllers/dashboard/pagos/index_controller.php");
Page::templateFooter();
?>
<?php
require_once("../../app/views/dashboard/templates/page.class.php");
Page::templateHeader("Patrocinadores");
require_once("../../app/controllers/dashboard/patrocinadores/agregar_controller.php");
Page::templateFooter();
?>
<?php
require_once("../../app/views/dashboard/templates/page.class.php");
Page::templateHeader("Tipo usuario");
require_once("../../app/controllers/dashboard/tipo_usuario/eliminar_controller.php");
Page::templateFooter();
?>
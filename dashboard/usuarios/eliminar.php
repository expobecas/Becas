<?php
require_once("../../app/views/dashboard/templates/page.class.php");
Page::templateHeader("Usuario");
require_once("../../app/controllers/dashboard/usuarios/eliminar_controller.php");
Page::templateFooter();
?>
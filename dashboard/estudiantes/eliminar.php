<?php
require_once("../../app/views/dashboard/templates/page.class.php");
Page::templateHeader("Eliminar Estudiantes");
require_once("../../app/controllers/dashboard/estudiantes/eliminar_controller.php");
Page::templateFooter();
?>
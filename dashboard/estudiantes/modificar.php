<?php
require_once("../../app/views/dashboard/templates/page.class.php");
Page::templateHeader("Modificar Estudiantes");
require_once("../../app/controllers/dashboard/estudiantes/modificar_controller.php");
Page::templateFooter();
?>
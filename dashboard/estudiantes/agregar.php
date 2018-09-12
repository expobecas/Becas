<?php
require_once("../../app/views/dashboard/templates/page.class.php");
Page::templateHeader("Agregar Estudiantes");
require_once("../../app/controllers/dashboard/estudiantes/agregar_controller.php");
Page::templateFooter();
?>
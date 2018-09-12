<?php
require_once("../../app/views/dashboard/templates/page.class.php");
Page::templateHeader("Estudiantes");
require_once("../../app/controllers/dashboard/estudiantes/index_controller.php");
Page::templateFooter();
?>
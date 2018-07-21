<?php
require_once("../../../app/views/public/empresa/templates/page.class.php");
Page::templateHeader("Cerrar sesión");
require_once("../../../app/controllers/public/empresa/ingresar/logout_controller.php");
Page::templateFooter();
?>
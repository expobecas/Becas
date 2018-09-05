<?php
require_once("../../app/views/dashboard/templates/page.class.php");
Page::templateHeader("Cambiar contraseña");
require_once("../../app/controllers/dashboard/ingresar/contraseña_controller.php");
Page::templateFooter();
?>
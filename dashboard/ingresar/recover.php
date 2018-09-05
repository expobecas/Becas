<?php
require_once("../../app/views/public/templates/page.class_login.php");
Page::templateHeader("Recuperar contraseña");
require_once("../../app/controllers/dashboard/ingresar/recover_controller.php");
Page::templateFooter();
?>
<?php
require_once("../../app/views/public/templates/page.class_login.php");
Page::templateHeader("Cerrar sesión");
require_once("../../app/controllers/public/ingresar/logout_controller.php");
Page::templateFooter();
?>
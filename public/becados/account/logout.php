<?php
require_once("../../../app/views/public/templates/page.class_login.php");
Page::templateHeader("Cerrar sesión");
require_once("../../../app/controllers/public/becados/account/logout_controller.php");
Page::templateFooter();
?>
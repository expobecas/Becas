<?php
require_once("../../../app/views/public/templates/page.class_login2.php");
Page::templateHeader("Cerrar sesión");
require_once("../../../app/controllers/public/alumno/account/logout_controller.php");
Page::templateFooter();
?>
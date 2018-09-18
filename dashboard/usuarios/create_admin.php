<?php
require_once('../../app/views/dashboard/templates/page.class.php');
Page::templateHeader("Primer usuario");
require_once("../../app/controllers/dashboard/usuarios/create_admin_controller.php");
Page::templateFooter();
?>
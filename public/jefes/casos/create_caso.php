<?php
require_once('../../app/views/dashboard/templates/page.class.php');
Page::templateHeader('Crear caso');
require_once('../../app/controllers/dashboard/casos/create_controller.php');
Page::templateFooter();
?>
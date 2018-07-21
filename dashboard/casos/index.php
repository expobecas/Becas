<?php
require_once('../../app/views/dashboard/casos/templates/page.class.php');
Page::templateHeader('Casos');
require_once('../../app/controllers/dashboard/casos/index_controller.php');
Page::templateFooter();
?>
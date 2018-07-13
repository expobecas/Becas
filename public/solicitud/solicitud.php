<?php
require_once("../../app/views/public/templates/page.class.php");
Page::templateHeader("Solicitud");
require_once("../../app/controllers/public/solicitud/solicitud_controller.php");
Page::templateFooter();
?>
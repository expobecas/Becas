<?php
require_once("../../../app/views/public/jefes/templates/page.class.php");
Page::templateHeader("Index");
require_once("../../../app/controllers/public/jefes/patrocinador/index_controller.php");
Page::templateFooter();
?>
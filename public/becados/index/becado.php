<?php
require_once("../../../app/views/public/becados/templates/page.class_be.php");
Page::templateHeader("Index");
require_once("../../../app/controllers/public/becados/index/general_controller.php");
Page::templateFooter();
?>
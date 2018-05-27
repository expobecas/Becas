<?php
require_once("../../../app/views/public/becados/templates/page.class_be.php");
Page::templateHeader("Index");
require_once("../../../app/views/public/becados/index/becado_view.php");
Page::templateFooter();
?>
<?php
require_once("../../../app/views/public/alumno/templates/page.class_al.php");
Page::templateHeader("Index");
require_once("../../../app/views/public/alumno/index/index_view.php");
Page::templateFooter();
?>
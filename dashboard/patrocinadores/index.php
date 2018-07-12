<?php
require_once("../../app/views/dashboard/templates/page.class.php");
Page::templateHeader("Patrocinadores");
require_once("../../app/views/dashboard/patrocinadores/index_view.php");
Page::templateFooter();
?>
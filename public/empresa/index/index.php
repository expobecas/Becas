<?php
require_once("../../../app/views/public/empresa/templates/page.class.php");
Page::templateHeader("Index");
require_once("../../../app/views/public/empresa/index/index_view.php");
Page::templateFooter();
?>
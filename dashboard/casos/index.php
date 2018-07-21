<?php
require_once('../../app/views/dashboard/templates/page.class.php');
Page::templateHeader('Casos');
require_once('../../app/views/dashboard/casos/index.php');
Page::templateFooter();
?>
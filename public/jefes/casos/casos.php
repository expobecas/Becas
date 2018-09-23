<?php
require_once('../../../app/views/public/jefes/templates/page.class.php');
Page::templateHeader('Casos');
require_once('../../../app/views/public/jefes/casos/index.php');
Page::templateFooter();
?>
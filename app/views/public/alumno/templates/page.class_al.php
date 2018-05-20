<?php 
require_once("../../../app/helpers/validator.class.php");
require_once("../../../app/helpers/component.class.php");
class Page extends component{
    public static function templateHeader($title){
        session_start();
        ini_set("date.timezone","America/El_Salvador");
        print("
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='utf-8'>
            <title>$title</title>
            <link type='text/css' rel='stylesheet' href='../../../web/css/materialize.min.css'/>
            <link type='text/css' rel='stylesheet' href='../../../web/css/material_icons.css'/>
            <link type='text/css' rel='stylesheet' href='../../../web/css/style_empresa.css'/>
            <script type='text/javascript' src='../../../web/js/sweetalert.min.js'></script>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
        </head>
        <body>
        <ul id='slide-out' class='side-nav fixed'>
    <li><div class='user-view'>
      <a href='#!user'><img class='circle' src='images/yuna.jpg'></a>
      <a href='#!name'><span class='white-text name'>John Doe</span></a>
      <a href='#!email'><span class='white-text email'>jdandturk@gmail.com</span></a>
    </div></li>
    <li><a href='#!'><i class='material-icons'>cloud</i>First Link With Icon</a></li>
    <li><a href='#!'>Second Link</a></li>
    <li><div class='divider'></div></li>
    <li><a class='subheader'>Subheader</a></li>
    <li><a class='waves-effect' href='#!'>Third Link With Waves</a></li>
  </ul>
  <a href='#' data-activates='slide-out' class='button-collapse'><i class='material-icons black-text'>menu</i></a>
  <main>
        ");
    }

    public static function templateFooter(){
        print("
        </main>
        <script type='text/javascript' src='../../../web/js/jquery-3.2.1.min.js'></script>
        <script type='text/javascript' src='../../../web/js/materialize.min.js'></script>
        <script type='text/javascript' src='../../../web/js/js_empresa.js'></script>
		</body>
		</html>
        ");
    }
}
?> 
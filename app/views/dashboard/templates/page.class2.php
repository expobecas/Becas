<?php 
require_once("../../app/models/database.class.php");
require_once("../../app/helpers/validator.class.php");
require_once("../../app/helpers/component.class.php");
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
            <link type='text/css' rel='stylesheet' href='../../web/css/materialize.min.css'/>
            <link type='text/css' rel='stylesheet' href='../../web/css/material_icons.css'/>
            <link type='text/css' rel='stylesheet' href='../../web/css/style_admin.css'/>
            <script type='text/javascript' src='../../web/js/jquery-3.2.1.min.js'></script>
            <script type='text/javascript' src='../../web/js/materialize.min.js'></script>
            <script type='text/javascript' src='../../web/js/sweetalert.min.js'></script>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
        </head>
        <body class='fondo-general font-web' onunload='getLogoffTime()'>
                ");
                if(isset($_SESSION['id_usuario'])){
                    print("
                    <ul id='slide-out' class='side-nav fixed content-menu white-text social-buttos'>
                    <li><div class='user-view'>
                      <a href='#!user'><img class='circle' src='../../web/img/admin/icon/man.png'></a>
                      <a href='#!name'><span class='white-text name user-name'>$_SESSION[usuario]</span></a>
                    </div></li>
                  </ul> 
 
                  <main>");
                }else{
                    print("
                <div class='ingresar_fondo'></div>
                <main class='container'>
                    ");
                    $filename = basename($_SERVER['PHP_SELF']);
                    if($filename != "acceder.php" && $filename != "create_admin.php"){
                        self::showMessage(3, "¡Debe iniciar sesión!", "../../dashboard/ingresar/acceder.php");
                        self::templateFooter();
                        exit;
                    }else{
                        print("<h3 class='center-align'>$title</h3>");
                    }
                }
        }
      
    

    public static function templateFooter(){
        
        print("
        <script type='text/javascript' src='../../web/js/js_admin.js'></script>
        <script type='text/javascript' src='../../web/js/deshabilitar.js'></script>
        <script type='text/javascript' src='../../web/js/Chart.js'></script>
        <script type='text/javascript' src='../../web/js/Chart.min.js'></script>
        ");
        $filename = basename($_SERVER['PHP_SELF']);
        if($filename != 'acceder.php' || $filename != 'create_admin.php' || $filename != 'logout.php')
        {
            print("<script type='text/javascript' src='../../web/js/js_inactividad/js_inactividad_admin.js'></script>");
        }
        if($filename == "index.php")
        {
            print("
            <script type='text/javascript' src='../../web/js/stadistics.js'></script>
            ");
        }
        if($filename == "casos.php")
        {
            print("<script type='text/javascript' src='../../web/js/js_casos.js'></script>");
        }
        print("
        </main>
		</body>
		</html>
        ");
    }
}
?>
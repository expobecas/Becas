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
            <link type='text/css' rel='stylesheet' href='../../../web/css/style_alumno.css'/>
            <script type='text/javascript' src='../../../web/js/sweetalert.min.js'></script>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
        </head>
        <body class='fondo-general'>
        ");
        if(isset($_SESSION['id_usuario'])){
            print(" <ul id='slide-out' class='side-nav fixed'>
            <li><div class='user-view'>
              <a href='#!user'><img class='circle' src='../../../web/img/alumno/users/user.png'></a>
              <a href='#!name'><span class='white-text name user-name'>usuario</span></a>
            </div></li>
            <li><a href='#!' class='white-text'><i class='material-icons white-text'>dashboard</i>Inicio</a></li>
            <li><a href='#!' class='white-text'><i class='material-icons white-text'>assignment</i>Solicitud</a></li>
            <li><a href='#!' class='white-text'><i class='material-icons white-text'>clear</i>Cerrar Sesión</a></li>
          </ul> 
          <div class='fixed-action-btn horizontal click-to-toggle'>
          <a href='#' data-activates='slide-out' class='button-collapse btn-floating btn-large red'><i class='material-icons'>menu</i></a>
          </div> 
          <main>
                ");
        }else{
            print("
            <header class='navbar-fixed'>
            <nav class='brown'>
                <div class='nav-wrapper'>
                    <a href='login.php' class='brand-logo'><i class='material-icons'>dashboard</i></a>
                </div>
            </nav>
        </header>
        <main class='container'>
            ");
            $filename = basename($_SERVER['PHP_SELF']);
			if($filename != "acceder.php"){
				self::showMessage(3, "¡Debe iniciar sesión!", "../../../public/ingresar/acceder.php");
				self::templateFooter();
				exit;
			}else{
				print("<h3 class='center-align'>$title</h3>");
			}
        }
      
    }

    public static function templateFooter(){
        print("
        </main>
        <script type='text/javascript' src='../../../web/js/jquery-3.2.1.min.js'></script>
        <script type='text/javascript' src='../../../web/js/materialize.min.js'></script>
        <script type='text/javascript' src='../../../web/js/js_alumno.js'></script>
		</body>
		</html>
        ");
    }
}
?> 
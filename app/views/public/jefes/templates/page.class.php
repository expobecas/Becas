<?php 
require_once("../../../app/models/database.class.php");
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
            <link type='text/css' rel='stylesheet' href='../../../web/css/style_jefe.css'/>
            <script type='text/javascript' src='../../../web/js/sweetalert.min.js'></script>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
        </head>
        <body class='fondo-general font-web' onunload='getLogoffTime()'>
        ");
        if(isset($_SESSION['id_usuario'])){
            print("<ul id='slide-out' class='side-nav fixed content-menu'>
            <li><div class='user-view'>
              <a href='#!user'><img class='circle' src='../../../web/img/alumno/users/user.png'></a>
              <a href='#!name'><span class='white-text name user-name'><trong>$_SESSION[usuario]</span></a>
            </div></li>
            <li><a href='../../../public/jefes/index/index.php' class='white-text'><i class='material-icons white-text'>dashboard</i>Inicio</a></li>
            <li><a href='../../../public/jefes/solicitudes/index.php' class='white-text'><i class='material-icons white-text'>folder_shared</i>Solicitudes</a></li>
            <li><a href='../../../public/jefes/becas/index.php' class='white-text'><i class='material-icons white-text'>assignment</i>Becas</a></li>
            <li><a href='../../../public/jefes/casos/casos.php' class='white-text'><i class='material-icons white-text'>description</i>Casos</a></li>
            <li><a href='../../../public/jefes/patrocinador/index.php' class='white-text'><i class='material-icons white-text'>how_to_reg</i>Patrocinadores</a></li>
            <li><a href='../../../public/jefes/index/contraseña.php' class='white-text'><i class='material-icons white-text'>autorenew</i>Cambiar clave</a></li>
            <li><a href='../../../dashboard/ingresar/logout.php' class='white-text'><i class='material-icons white-text'>clear</i>Cerrar Sesión</a></li>
          </ul>  
          <main>
          <div class='row white' id='barra'>
          <div class='col'>
          <a href='#' data-activates='slide-out' class='button-collapse menu-btn'><i class='material-icons'>menu</i></a>          
          </div>
            <div class='col offset-l9 offset-s1'>   
            <ul id='dropdown2' class='dropdown-content'>
            <li><a href='#!'>Aqui iran las super notificaciones</a></li>
            </ul>
            <a class='btn dropdown-button grey-text avisos' href='#!' data-activates='dropdown2'>Notificación<i class='material-icons right'>notifications</i></a>
            </div> 
            </div>
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
				self::showMessage(3, "¡Debe iniciar sesión!", "../../../dashboard/ingresar/acceder.php");
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
        <script type='text/javascript' src='../../../web/js/js_jefe.js'></script>
		</body>
		</html>
        ");
        $filename = basename($_SERVER['PHP_SELF']);
        if($filename != 'acceder.php' || $filename != 'create_admin.php' || $filename != 'logout.php')
        {
            print("<script type='text/javascript' src='../../../web/js/js_inactividad/js_inactividad_empresa.js'></script>");
        }
    }
}
?> 
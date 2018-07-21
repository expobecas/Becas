<?php 
require_once("../../../app/models/database.class.php");
require_once("../../../app/helpers/validator.class.php");
require_once("../../../app/helpers/component.class.php");
<<<<<<< HEAD
class Page extends component{
=======
class Page extends Component{
>>>>>>> 5fa3c353cd7c6962fd67c551785619ba461af590
    public static function templateHeader($title){
        session_start();
        ini_set("date.timezone","America/El_Salvador");
        print("
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='utf-8'>
            <title>$title</title>
<<<<<<< HEAD
            <link type='text/css' rel='stylesheet' href='../../web/css/materialize.min.css'/>
            <link type='text/css' rel='stylesheet' href='../../web/css/material_icons.css'/>
            <link type='text/css' rel='stylesheet' href='../../web/css/style_becado.css'/>
            <script type='text/javascript' src='../../web/js/sweetalert.min.js'></script>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
        </head>
        <body class='fondo-general font-web'>
        ");
        if(isset($_SESSION['id_estudiante'])){
            print("<ul id='slide-out' class='side-nav fixed content-menu'>
            <li><div class='user-view'>
              <a href='#!user'><img class='circle' src='../../web/img/alumno/users/user.png'></a>
              <a href='#!name'><span class='white-text name user-name'>$_SESSION[usuario]</span></a>
            </div></li>
            <li><a href='../../../public/becados/index/becado.php' class='white-text'><i class='material-icons white-text'>dashboard</i>Inicio</a></li>
            <li><a href='../../../public/becados/account/editar_perfil.php?id=$_SESSION[id_estudiante]' class='white-text'><i class='material-icons white-text'>settings</i>Editar perfil</a></li>
            <li><a href='../../../public/becados/account/mensajes.php?id=$_SESSION[id_estudiante]' class='white-text'><i class='material-icons white-text'>question_answer</i>Mensajes</a></li>
            <li><a href='../../../public/becados/account/logout.php' class='white-text'><i class='material-icons white-text'>clear</i>Cerrar Sesión</a></li>
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
=======
            <link type='text/css' rel='stylesheet' href='../../../web/css/materialize.min.css'/>
            <link type='text/css' rel='stylesheet' href='../../../web/css/material_icons.css'/>
            <link type='text/css' rel='stylesheet' href='../../../web/css/style_empresa.css'/>
            <script type='text/javascript' src='../../../web/js/sweetalert.min.js'></script>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
        </head>
        <body class='fondo-general'>
        ");
        if(isset($_SESSION['id_usuario'])){
            print(" <ul id='slide-out' class='side-nav fixed content-menu'>
            <li><div class='user-view'>
              <a href='#!user'><img class='circle' src='../../../web/img/alumno/users/user.png'></a>
              <a href='#!name'><span class='white-text name user-name'>$_SESSION[usuario]</span></a>
            </div></li>
            <li><a href='../../../public/empresa/index/index.php' class='white-text'><i class='material-icons white-text'>dashboard</i>Inicio</a></li>
            <li><a href='../../../public/empresa/index/becados.php' class='white-text'><i class='material-icons white-text'>assignment_ind</i>Mis becados</a></li>
            <li><a href='../../../public/empresa/index/casos.php' class='white-text'><i class='material-icons white-text'>assignment</i>Casos</a></li>
            <li><a href='../../../public/empresa/index/mensajes.php' class='white-text'><i class='material-icons white-text'>mail_outline</i>Mensajes</a></li>
            <li><a href='../../../public/ingresar/logout.php' class='white-text'><i class='material-icons white-text'>clear</i>Cerrar Sesión</a></li>
          </ul> 
          <div class='fixed-action-btn horizontal click-to-toggle'>
          <a href='#' data-activates='slide-out' class='button-collapse btn-floating btn-large red show'><i class='material-icons'>menu</i></a>
          </div> 
          <main>
          <div class='row white' id='barra'>
          <div class='col offset-l10'>   
          <ul id='dropdown2' class='dropdown-content'>
          <li><a href='#!'>Aqui iran las super notificaciones</a></li>
          </ul>
          <a class='btn dropdown-button grey-text avisos' href='#!' data-activates='dropdown2'>Notificación<i class='material-icons right'>notifications</i></a>
          </div> 
          </div>
>>>>>>> 5fa3c353cd7c6962fd67c551785619ba461af590
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
<<<<<<< HEAD
			if($filename != "ingresar.php"){
				self::showMessage(3, "¡Debe iniciar sesión!", "../../../dashboard/ingresar/acceder.php");
=======
			if($filename != "acceder.php"){
				self::showMessage(3, "¡Debe iniciar sesión!", "../../../public/ingresar/acceder.php");
>>>>>>> 5fa3c353cd7c6962fd67c551785619ba461af590
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
<<<<<<< HEAD
        <script type='text/javascript' src='../../../web/js/js_becado.js'></script>
=======
        <script type='text/javascript' src='../../../web/js/js_empresa.js'></script>
>>>>>>> 5fa3c353cd7c6962fd67c551785619ba461af590
		</body>
		</html>
        ");
    }
}
?> 
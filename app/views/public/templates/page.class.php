<?php
require_once("../../app/models/database.class.php");
require_once("../../app/helpers/validator.class.php");
require_once("../../app/helpers/component.class.php");
class Page extends Component{

    public static function templateHeader($title)
    {
        session_start();
        ini_set("date.timezone", "America/El_Salvador");
        print("
            <!DOCTYPE html>
            <html lang='es'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-compatible' content='ie-edge'>
                <title>$title</title>
            
                <link rel='stylesheet' href='../../web/css/materialize.min.css'/>
                <link rel='stylesheet' href='../../web/css/letra.css'/>
                <link rel='stylesheet' href='../../web/css/material_icons.css'/>
                <link rel='stylesheet' href='../../web/css/style_solicitud.css'/>
                <script type='text/javascript' src='../../web/js/jquery-3.2.1.min.js'></script>
                <script type='text/javascript' src='../../web/js/solicitud.js'></script>
                <script type='text/javascript' src='../../web/js/sweetalert.min.js'></script>
            
            </head>
            <body>
                <main>
        ");
    }

    public static function templateFooter()
    {
        print("
                </main>
                <script type='text/javascript' src='../../web/js/materialize.min.js'></script>
                <script type='text/javascript' src='../../web/js/public_solicitud.js'></script>
                <script type='text/javascript' src='../../web/js/validaciones.js'></script>
                <script type='text/javascript' src='../../web/js/jquery.mask.min.js'></script>
            </body>
            </html>
        ");
    }
}

?>
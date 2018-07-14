<?php
require_once("../../app/models/database.class.php");
require_once("../../app/helpers/component.class.php");
require_once("../../app/helpers/validator.class.php");

class Page extends Component
{
    public static function templateHeader()
    {
        print("
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <meta http-equiv='X-UA-Compatible' content='ie=edge'>
            <title>Calendario Prueba</title>
            <link rel='stylesheet' href='../../web/css/materialize.min.css'>
            <link rel='stylesheet' href='../../web/css/fullcalendar.min.css'>
            <script type='text/javascript' src='../../web/js/jquery-3.2.1.min.js'></script>
            <script type='text/javascript' src='../../web/js/moment.min.js'></script>
            <script type='text/javascript' src='../../web/js/fullcalendar.min.js'></script>
            <script type='text/javascript' src='../../web/js/es.js'></script>
            <script type='text/javascript' src='../../web/js/calendario.js'></script>
            
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
        </body>
        </html>
        ");
    }
}

?>
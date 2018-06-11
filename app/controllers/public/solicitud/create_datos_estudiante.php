<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/solicitud.class.php");
require_once("../../../models/institucion_proveniente.class.php");

try
{
    class datos_estudiante
    {
        function createDatos()
        {
            $institucion_proveniente = new Institucion_Proveniente;
            $solicitud = new Solicitud;

            //Obteniendo datos para el insert de la tabla institucion_proveniente
            $nombre_institucion = $_POST['institucion_prov'];
            $lugar_institucion = $_POST['departamento'];
            $Cuota = str_replace(',', '.', str_replace('.', '', $_POST['cuota']));
            $cuota_pagaba = $Cuota;
            $año = $_POST['año_realizaba'];

            if($institucion_proveniente->createInstitucion($nombre_institucion, $lugar_institucion, $cuota_pagaba, $año))
            {
                //Obteniendo datos par el insert de la tabla solicitud
                $id_genero = $_POST['genero'];
                $religion = $_POST['religion'];
                $encargado = $_POST['familia'];
                $direccion = $_POST['direccion'];
                $correo = $_POST['correo'];
                $tel_fijo = $_POST['fijo'];
                $cel_papa = $_POST['padre'];
                $cel_mama = $_POST['madre'];
                $cel_hijo = $_POST['hijo'];
                $fecha_nacimiento = $_POST['fecha_naci'];
                $lugar_nacimiento = $_POST['lugar_naci'];
                $pais_nacimiento = $_POST['pais_naci'];
                $estudios_finan = $_POST['financiados'];
                $dato = $solicitud->getInstitucion();
                foreach($dato as $id)
                {
                    $id_institucion_proveniente = $id;
                }
                if($solicitud->createSolicitud($id_genero, $religion, $encargado, $direccion, $correo, $tel_fijo, $cel_papa, $cel_mama, $cel_hijo, $fecha_nacimiento, $lugar_nacimiento, $pais_nacimiento, $estudios_finan, $id_institucion_proveniente))
                {

                }
                else
                {
                    throw new Exception(Database::getException());
                }
            }
            else
            {
                throw new Exception(Database::getException());
            }
        }
    }
    $object = new datos_estudiante;
    $object->createDatos();
}
catch(Exception $error)
{
    Component::showMessage(2, $error->getMessage(), null);
}
?>
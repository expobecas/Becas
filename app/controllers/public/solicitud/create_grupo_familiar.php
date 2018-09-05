<?php
require_once("../../../models/database.class.php");
require_once("../../../helpers/validator.class.php");
require_once("../../../helpers/component.class.php");
require_once("../../../models/grupo_familiar.class.php");

try
{
    class detalle_solicitud
    {
        function create()
        {
            $grupo_familiar = new Grupo_familiar;
            $_POST = $grupo_familiar->validateForm($_POST);
            $grupo_familiar->setIngresoFamiliar($_POST['ingreso_mensual']);
            $grupo_familiar->setTotalGastos($_POST['gasto_mensual']);
            $grupo_familiar->setIdSolicitud($_POST['id_solicitud']);
            if($_POST['monto_deuda'] != null)
            {
                $monto_deuda = str_replace(',', '.', str_replace('.', '', $_POST['monto_deuda']));
                $grupo_familiar->setMontoDeuda($monto_deuda);
            }
            if($grupo_familiar->createFamilia())
            {

            }
            else
            {
                echo json_decode(Database::getException());
            }

            $id_familia = $grupo_familiar->getIdFamilia();
            echo json_decode($id_familia);
        }
    }
    $object = new detalle_solicitud();
    $object->create();
}
catch(Exception $error)
{
    echo json_decode($error->getMessage());
}
?>
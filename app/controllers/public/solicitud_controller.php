<?php
require_once("../../app/models/familiares_estudiante.class.php");
require_once("../../app/models/gastos_mensuales.class.php");
require_once("../../app/models/grupo_familiar.class.php");
require_once("../../app/models/imagenes_vehiculo.class.php");
require_once("../../app/models/institucion_proveniente.class.php");
require_once("../../app/models/integrante_familia.class.php");
require_once("../../app/models/intermedia_propiedad.class.php");
require_once("../../app/models/propiedad.class.php");
require_once("../../app/models/remesa_familiar.class.php");
require_once("../../app/models/solicitud.class.php");
try
{
	//PRIMERA PARTE DEL FOMULARIO SOLICITUD
	//Para llenar la tabla institucion proveniente
	$institucion_proveniente = new Institucion_proveniente;
	if(isset($_POST['enviar']))
	{
		$_POST = $institucion_proveniente->validateForm($_POST);
		if($institucion_proveniente->setNombre($_POST['institucion_prov']))
		{
			if($institucion_proveniente->setLugar($_POST['departamento'].', '.$_POST['pais'])) 
			{
				if($institucion_proveniente->setCuotaPagada($_POST['cuota']))
				{
					if($institucion_proveniente->setAño($_POST['año_realizaba']))
					{

					}
					else
					{
						throw new Exception("Seleccione grado o año que realizaba");
					}
				}
				else
				{
					throw new Exception("Ingrese la cuota que pagaba");
				}
			}
			else
			{
				throw new Exception("Escriba el departamento y el pais de la institución proveniente");
			}
		}
		else
		{
			throw new Exception("Escriba el nombre de la institucion donde proviene");	
		}
	}
	

	//Para llenar la tabla solicitud
    $solicitud = new Solicitud;
    $_POST = $solicitud->validateForm($_POST);


    //SEGUNDA PARTE DEL FOMULARIO SOLICITUD
    //Para llenar la tabla integrantes
    $integrante = new Integrante_familia;

    //Para llenar la tabla familiares estudiante
    $familiares_estudiante = new Familiares_estudiante;

    //Para llenar la tabla imagenes_vehiculo
    $imagenes_vehiculo = new Imagenes_vehiculo;

    //Para llenar la tabla propiedad
    $propiedad = new Propiedad;

    //para llenar la intermedia propiedad
    $intermedia_propiedad = new Intermedia_propiedad;


    //TERCERA PARTE DEL FOMULARIO SOLICITUD
    //Para llenar la tabla gastos mensuales
    $gastos_mensuales = new Gastos_mensuales;

    //Para llenar la tabla grupo familiar
    $grupo_familiar = new Grupo_familiar;

    //Para llenar la tabla remesa familiar
    $remesa_familiar = new Remesa_familiar;

    
}
catch(Exception $error)
{
	Page::showMessage(2, $error->getMessage(), "");
}
require_once("../../app/views/public/solicitud/solicitud_view.php");

?>
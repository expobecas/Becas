<?php
require_once('../../../../app/models/database.class.php');
require_once('../../../../app/helpers/validator.class.php');
require_once('../../../../app/libraries/fpdf/fpdf.php');

//MODELOS PARA LLENAR LA SOLICITUD
require_once('../../../../app/models/solicitud.class.php');
require_once('../../../../app/models/integrante_familia.class.php');
require_once('../../../../app/models/familiares_estudiante.class.php');

$solicitud = new Solicitud;
$integrante = new Integrante_familia;
$familiares_estudiante = new Familiares_estudiante;
$solicitud->setIdSolicitud($_GET['id_solicitud']);
$datos_solicitud = $solicitud->getSolicitud();

$año = date('Y');
$mes = date('m');
$dia = date('d');
$fecha = $dia.'/'.$mes.'/'.$año;

$nombre_alumno = $datos_solicitud['primer_nombre'].' '.$datos_solicitud['segundo_nombre'].', '.$datos_solicitud['primer_apellido'].' '.$datos_solicitud['segundo_apellido'];
$especialidad = $datos_solicitud['grado'].' '.$datos_solicitud['especialidad'];

class PDF extends FPDF
{
// Cabecera de página
function Header()
{   
    //Posiciones x, y - Tamaño width y heigh
    $this->Rect(9,9,261, 197);
}
    // Pie de página
function Footer()
{
     // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Times','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
////////////////////////// INFORMACIÓN GENERAL - PAGINA 1 ////////////////////////////////////////////

        // Creación del objeto de la clase heredada
        $pdf = new PDF('L','mm','Letter'); //Pagina tamaño papel bond
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->setMargins(15,15,15);
         //Posiciones x, y - Tamaño width y heigh
        $pdf->SetFillColor(57,51,63);
        $pdf->Rect(9,29,261, 11, 'F');
        //URL-POSICION X - PISICION Y - TAMAÑO
        $pdf->Image('../../../../web/img/reportes/logo_ricaldone.jpg',30,18,34);
        // Arial bold 15
        $pdf->SetFont('Arial','',16);
        // Movernos a la derecha
        $pdf->setX(236);
        // Título
        $pdf->Cell(10,12,utf8_decode('Año: '.$año),0,0,'C');
            // Movernos a la derecha
        $pdf->setX(238);
            // Título
        $pdf->Cell(10,27,utf8_decode('N°: '.$datos_solicitud['id_solicitud']),0,0,'C');

        $pdf->Ln(6);
        // Arial bold 15
        $pdf->SetFont('Arial','B',18);
        // Movernos a la derecha
        $pdf->setX(147);
            // Título
        $pdf->Cell(10,18,utf8_decode('INSTITUTO TÉCNICO RICALDONE'),0,0,'C');
        $pdf->Ln(6);
        // Subtítulo
        $pdf->setX(147);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(10,26,utf8_decode('CUESTIONARIO SOCIOECONÓMICO'),0,0,'C'); 
        // Salto de línea
        $pdf->Ln(16);

        $pdf->SetFillColor(99, 99, 99);
        $pdf->Ln(11);
        //INFORMACIÓN PRINCIPAL
        $pdf->SetTextColor(99, 99, 99);
        $pdf->SetFont('Arial','B',13);
        // Movernos a la derecha
        $pdf->setX(39);
        // Título
        $pdf->Cell(10,18,utf8_decode('Nombre:'),0,0,'C');
        $pdf->setX(54);
        $pdf->Cell(93,18,utf8_decode($nombre_alumno),0,0,'L');
        $pdf->Ln(6);
        $pdf->setX(34);
        $pdf->Cell(10,18,utf8_decode('Especialidad:'),0,0,'C');
        $pdf->setX(54);
        $pdf->Cell(93,18,utf8_decode($especialidad),0,0,'L');
        $pdf->Ln(6);
        $pdf->setX(40);
        $pdf->Cell(10,18,utf8_decode('Código:'),0,0,'C');
        $pdf->setX(54);
        $pdf->Cell(32,18,utf8_decode($datos_solicitud['n_carnet']),0,0,'L');

        ///////////////////////////INDICACIONES GENERALES//////////////////////////////////////
        $pdf->Ln(8);
        $pdf->Rect(20,82,125, 68);
        //FORMATO DEL TÍTULO
        $pdf->SetFillColor(99, 99, 99);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Ln(9);
        $pdf->setX(20);
        //DATOS
        $pdf->Cell(125,6,utf8_decode('INDICACIONES GENERALES'),0,0,'C',1);
        //PARRAFO
        $pdf->Ln(5);
        $pdf->SetFont('Arial','',10);
        $pdf->setX(24);
        $pdf->SetTextColor(99, 99, 99);
        $pdf->setX(18);
        //GUARDO EL TEXTO EN UNA VARIABLE Y LUEGO LO IMPRIMO
        $indicaciones = "
        El Instituto Técnico Ricaldone a treavés de el Programa de Becas 
        asigna a cada estudiante una cuota acorde a su situación economica
        actual. Por lo que recomendamos:
        
        -Todo estudiante deberá llenar la solicitud para establecer una cuota 
        de escolaridad mensual. Recomendamos leer de forma cuidadosa la 
        solicitud
        
        -Entregar el documento debidamente completo, con todos los 
        documentos solicitados e información veraz, en la fecha 
        correspondientes.
        
        -Para consultas, llamar al Departamento de Trabajo Social al número
        2234-6010(directo) ó al 2234-6000(conmutador).";

        $pdf->MultiCell(180,4,utf8_decode($indicaciones)); 
        
        ///////////////////////////////7/NOTA/////////////////////////////////////////////////
        $pdf->Rect(20,156,125, 45);
        //FORMATO DEL TÍTULO
        $pdf->SetFillColor(99, 99, 99);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Ln(9);
        $pdf->setX(20);
        //TÍTULO
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(125,6,utf8_decode('NOTA'),0,0,'C',1);
        //PARRAFO
         //PARRAFO
         $pdf->Ln(3);
         $pdf->SetFont('Arial','',10);
         $pdf->setX(23);
         $pdf->SetTextColor(99, 99, 99);
         $pdf->setX(15);
         //GUARDO EL TEXTO EN UNA VARIABLE Y LUEGO LO IMPRIMO
          //GUARDO EL TEXTO EN UNA VARIABLE Y LUEGO LO IMPRIMO
        $nota = "
        Todos los datos proporcionados en este cuestionario serán verificados
        mediante mecanismos confiables definidos por el ITR, incluyendo la 
        visita domociliar; en el caso de encontrarse inconsistencia, falta de
        información y de documentos que den fe de su situación socioenconómica
        real, el ITR se reserva el derecho de tomar medidas correspientes en
        relación a la asignación de su cuota

        En el transcurso del proceso de su información académica, la cuota podrá
        tener modificaciones debido a políticas internas de la institución.";

        $pdf->MultiCell(180,4,utf8_decode($nota)); 

        ///////////////////////REQUISITOS PARA APLICANTES//////////////////////////////////
        $pdf->setY(46);
        $pdf->Rect(150,48,111, 41);
        //FORMATO DEL TÍTULO
        $pdf->SetFillColor(99, 99, 99);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Ln(2);
        $pdf->setX(150);
        //TÍTULO
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(111,6,utf8_decode('REQUISITOS PARA APLICANTE'),0,0,'C',1);
        //PARRAFO
        //PARRAFO
        $pdf->Ln(3);
        $pdf->SetFont('Arial','',10);
        $pdf->SetTextColor(99, 99, 99);
        $pdf->setX(144);
        //GUARDO EL TEXTO EN UNA VARIABLE Y LUEGO LO IMPRIMO
        $nota = "
        * Familia de escasos recursos.

        * Promedio de nota mínima 7.5.

        * Buena conducta

        * Disposición para prestar servicio social a la institución cuando se
        le solicite";
        $pdf->MultiCell(180,4,utf8_decode($nota)); 

         /////////////////////////////DOCUMENTACIÓN REQUERIDA/////////////////////////////////////////////777
         $pdf->setY(46);
         $pdf->Rect(150,93,111, 108);
         //FORMATO DEL TÍTULO
         $pdf->SetFillColor(99, 99, 99);
         $pdf->SetTextColor(255, 255, 255);
         $pdf->Ln(46);
         $pdf->setX(150);
         //TÍTULO
         $pdf->SetFont('Arial','B',10);
         $pdf->Cell(111,6,utf8_decode('DOCUMENTACIÓN REQUERIDA'),0,0,'C',1);
         //PARRAFO
         //PARRAFO
         $pdf->Ln(3);
         $pdf->SetFont('Arial','',10);
         $pdf->SetTextColor(99, 99, 99);
         $pdf->setX(144);
 
         //GUARDO EL TEXTO EN UNA VARIABLE Y LUEGO LO IMPRIMO
         $documentacion = "
         Adjunto a este cuestionario debe presentar toda la documentación 
         requerida, de lo contrario éste no sera recibido:
         
         * Si son empleados, presentar las constancias de sueldos de los
         integrantes de la familia.

         * Si trabajan por cuenta propi, deben presentar la hoja de anexo 1.
         
         * Fotocopia de pago de alquiler de vivienda.
         
         * Fotocopia de último recibo de pago de cuota de escolaridad
         (para alumnos/as de nuevo ingreso).

         *Fotocopia de recibos de pago de: energía eléctrica, agua,
         teléfono, vigilancia, servicio doméstico.
         Si no paga ningún recibo, presentar hoja de anexo 2.

         * Fotocopia de la declaración de pago de renta.
         
         * Una fotografia reciente
         
         * Fotocopia de boletas de notas del alumno.
         
         * Comprobante de deudas actuales.";
         $pdf->MultiCell(180,4,utf8_decode($documentacion)); 

         ////////////////////////////DATOS GENERALES - PAGINA 2////////////////////////////////////
        $pdf->AddPage('L','Letter');//PAGINA AÑADIDA

        //Posiciones x, y - Tamaño width y heigh
        $pdf->Rect(14,26,250, 90);
        //FORMATO DEL TÍTULO
        $pdf->SetFillColor(99, 99, 99);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Ln(11);
        $pdf->setX(14);
        //TÍTULO
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(250,6,utf8_decode('DATOS GENERALES'),0,0,'',1);

        //DATOS//
        $pdf->Ln(8);
        $pdf->SetFont('Arial','B',10);
        $pdf->SetTextColor(99, 99, 99);
        $pdf->setX(18);
        $pdf->Cell(10,6,utf8_decode('1. No. de carnét:'),0,0,'');
        $pdf->setX(48);
        $pdf->Cell(52,6,utf8_decode($datos_solicitud['n_carnet']),0,0,'C');
        // POSICIÓN X - INCLINACIÓN EN X D - LONGITUD X - INCLINACIÓN  EN X I
        $pdf->Line(48, 39 , 100, 39);//HORIZONTAL

        $pdf->Ln(7);
        $pdf->setX(18);
        $pdf->Cell(10,6,utf8_decode('2. Nombre de el o la estudiante:'),0,0,'');
        $pdf->setX(74);
        $pdf->Cell(125,6,utf8_decode($nombre_alumno),0,0,'C');
        $pdf->Line(74, 46, 200, 46);//HORIZONTAL

        $pdf->Ln(7);
        $pdf->setX(18);
        $pdf->Cell(10,6,utf8_decode('3. Sexo:'),0,0,'');
        $pdf->setX(33);
        $pdf->Cell(47,6,utf8_decode($datos_solicitud['genero']),0,0,'C');
        $pdf->Line(34, 53 , 80, 53);//HORIZONTAL

        $pdf->Ln(7);
        $pdf->setX(18);
        $pdf->Cell(10,6,utf8_decode('4. Religión:'),0,0,'');
        $pdf->setX(39);
        $pdf->Cell(61,6,utf8_decode($datos_solicitud['religion']),0,0,'C');
        $pdf->Line(39, 60 , 100, 60);//HORIZONTAL

        $pdf->Ln(7);
        $pdf->setX(18);
        $pdf->Cell(10,6,utf8_decode('5. Personas con las que vive:'),0,0,'');
        $pdf->setX(69);
        $pdf->Cell(55,6,utf8_decode($datos_solicitud['encargado']),0,0,'C');
        $pdf->Line(69, 67, 124, 67);//HORIZONTAL

        $pdf->Ln(7);
        $pdf->setX(18);
        $pdf->Cell(10,6,utf8_decode('6. Dirección exacta:'),0,0,'');
        $pdf->setX(54);
        $pdf->Cell(126,6,utf8_decode($datos_solicitud['direccion']),0,0,'C');
        $pdf->Line(54, 74, 180, 74);//HORIZONTAL
        $pdf->setX(182);
        $pdf->Cell(10,6,utf8_decode('Email:'),0,0,'');
        $pdf->setX(195);
        $pdf->Cell(65,6,utf8_decode($datos_solicitud['correo']),0,0,'C');
        $pdf->Line(195, 74, 260, 74);//HORIZONTAL

        $pdf->Ln(7);
        $pdf->setX(18);
        $pdf->Cell(10,6,utf8_decode('7. Télefonos:'),0,0,'');
        $pdf->setX(41);
        $pdf->Cell(10,6,utf8_decode('Linea fija:'),0,0,'');
        $pdf->setX(58);
        $pdf->Cell(27,6,utf8_decode($datos_solicitud['tel_fijo']),0,0,'C');
        $pdf->Line(60, 81, 85, 81);//HORIZONTAL

        $pdf->setX(86);
        $pdf->Cell(10,6,utf8_decode('Celular (papá):'),0,0,'');
        $pdf->setX(112);
        $pdf->Cell(26,6,utf8_decode($datos_solicitud['cel_papa']),0,0,'C');
        $pdf->Line(112, 81, 138, 81);//HORIZONTAL

        $pdf->setX(140);
        $pdf->Cell(10,6,utf8_decode('Celular (mamá):'),0,0,'');
        $pdf->setX(168);
        $pdf->Cell(26,6,utf8_decode($datos_solicitud['cel_mama']),0,0,'C');
        $pdf->Line(168, 81, 193, 81);//HORIZONTAL
        $pdf->setX(195);
        $pdf->Cell(10,6,utf8_decode('Celular (hijo/a):'),0,0,'');
        $pdf->setX(222);
        $pdf->Cell(26,6,utf8_decode($datos_solicitud['cel_hijo']),0,0,'C');
        $pdf->Line(222, 81, 248, 81);//HORIZONTAL

        $pdf->Ln(7);
        $pdf->setX(18);
        $pdf->Cell(10,6,utf8_decode('8. Lugar y fecha de nacimiento:'),0,0,'');
        $pdf->setX(73);
        $pdf->Cell(97,6,utf8_decode($datos_solicitud['lugar_nacimiento'].'. '.$datos_solicitud['fecha_nacimiento']),0,0,'C');
        $pdf->Line(73, 88, 170, 88);//HORIZONTAL
        $pdf->setX(172);
        $pdf->Cell(10,6,utf8_decode('País:'),0,0,'');
        $pdf->setX(182);
        $pdf->Cell(36,6,utf8_decode($datos_solicitud['pais_nacimiento']),0,0,'C');
        $pdf->Line(182, 88, 218, 88);//HORIZONTAL
        $pdf->setX(220);
        $pdf->Cell(10,6,utf8_decode('Edad: _____ años'),0,0,'');

        $pdf->Ln(7);
        $pdf->setX(18);
        $pdf->Cell(10,6,utf8_decode('9. Sus estudios son financiados por:'),0,0,'');
        $pdf->setX(82);
        $pdf->Cell(43,6,utf8_decode($datos_solicitud['estudios_finan']),0,0,'C');
        $pdf->Line(82, 95, 125, 95);//HORIZONTAL

        $pdf->Ln(7);
        $pdf->setX(18);
        $pdf->Cell(10,6,utf8_decode('10. Nombre de la institución educativa donde estudió antes de ingresar a la instiución:'),0,0,'');
        $pdf->setX(165);
        $pdf->Cell(95,6,utf8_decode($datos_solicitud['nombre_institucion']),0,0,'C');
        $pdf->Line(250, 102, 165, 102);//HORIZONTAL

        $lugar = explode(", ", $datos_solicitud['lugar_institucion']);
        $pdf->Ln(7);
        $pdf->setX(24);
        $pdf->Cell(10,6,utf8_decode('Departamento:'),0,0,'');
        $pdf->setX(51);
        $pdf->Cell(49,6,utf8_decode($lugar[0]),0,0,'C');
        $pdf->Line(51, 109, 100, 109);//HORIZONTAL
        $pdf->setX(100);
        $pdf->Cell(10,6,utf8_decode('País:'),0,0,'');
        $pdf->setX(110);
        $pdf->Cell(34,6,utf8_decode($lugar[1]),0,0,'C');
        $pdf->Line(110, 109, 144, 109);//HORIZONTAL
        $pdf->setX(145);
        $pdf->Cell(10,6,utf8_decode('Cuota que pagaba: $'),0,0,'');
        $pdf->setX(181);
        $pdf->Cell(30,6,utf8_decode($datos_solicitud['cuota_pagada']),0,0,'C');
        $pdf->Line(181, 109, 211, 109);//HORIZONTAL
        $pdf->setX(213);
        $pdf->Cell(10,6,utf8_decode('Año:'),0,0,'');
        $pdf->setX(222);
        $pdf->Cell(33,6,utf8_decode($datos_solicitud['año']),0,0,'C');
        $pdf->Line(222, 109, 255, 109);//HORIZONTAL



        //PRIMER CUADRO//
        $pdf->Ln(17);
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(250,6,utf8_decode('11. CUADRO No. 1'),0,0,'');
        $pdf->setX(52);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(50,6,utf8_decode('Personas que integran su grupo familiar.'),0,0,'');
        
        $pdf->Ln(10);
        $pdf->SetFillColor(99, 99, 99);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(10,6,utf8_decode('No.'),1,0,'C',1);
        $pdf->Cell(51,6,utf8_decode('Nombre'),1,0,'C',1);
        $pdf->Cell(32,6,utf8_decode('Parentesco'),1,0,'C',1);
        $pdf->Cell(12,6,utf8_decode('Edad'),1,0,'C',1);
        $pdf->Cell(42,6,utf8_decode('Profesion/ocupación'),1,0,'C',1);
        $pdf->Cell(40,6,utf8_decode('Lugar de trabajo'),1,0,'C',1);
        $pdf->Cell(24,6,utf8_decode('Tel. Trabajo'),1,0,'C',1);
        $pdf->Cell(38,6,utf8_decode('Salario mensual'),1,1,'C',1);
        //ULTIMA FILA
        $pdf->Cell(105,6,utf8_decode('Total de miembros del grupo familiar'),1,0,'L',1);
        $pdf->Cell(106,6,utf8_decode('Total de ingresos mensuales del grupo familiar'),1,0,'R',1);
        $pdf->Cell(38,6,utf8_decode('$'),1,0,'L',1);
        $pdf->SetTextColor(99, 99, 99);

        ////////////////////////////////////////TERCER PAGINA//////////////////////////////////////////////////////////////
        $pdf->AddPage('L','Letter');//PAGINA AÑADIDA
        //REMESA//
        $pdf->Ln(2);
        $pdf->SetFont('Arial','B',11);
        $pdf->setX(14);                                                               
        $pdf->Cell(10,6,utf8_decode('12. '),0,0,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->setX(61);
        $pdf->Cell(10,6,utf8_decode('Si recibe remesa familiar, detalle el monto: $_______'),0,0,'C');
        $pdf->setX(111);
        $pdf->Cell(10,6,utf8_decode('Cada cuánto lo recibe: _______________'),0,0,'');
        $pdf->setX(181);
        $pdf->Cell(10,6,utf8_decode('Quién lo envía (parentesco): _________________'),0,0,'');
         
        //CUADRO 2
        $pdf->Ln(17);
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(250,6,utf8_decode('13. CUADRO No. 2'),0,0,'');
        $pdf->setX(52);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(50,6,utf8_decode('Miembros del grupo familiar que están estudiando:'),0,0,'');
        //CUADRO 2
        $pdf->Ln(10);
        $pdf->SetFillColor(99, 99, 99);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(12,6,utf8_decode('No.'),1,0,'C',1);
        $pdf->Cell(59,6,utf8_decode('Nombre'),1,0,'C',1);
        $pdf->Cell(34,6,utf8_decode('Depende de Ud.'),1,0,'C',1);
        $pdf->Cell(46,6,utf8_decode('Grado o nivel (ciclo-año)'),1,0,'C',1);
        $pdf->Cell(56,6,utf8_decode('Institución educativa'),1,0,'C',1);
        $pdf->Cell(41,6,utf8_decode('Cuota de escolaridad'),1,0,'C',1);

         //ESTADO DE LA CASA//
        $pdf->Ln(17);
        $pdf->SetTextColor(99, 99, 99);
        $pdf->SetFont('Arial','B',11);
        $pdf->setX(48);                                                               
        $pdf->Cell(10,6,utf8_decode('14. La casa en que vive actualmente es:'),0,0,'C');
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',10);
        $pdf->Line(23, 72, 130, 72);//HORIZONTAL
        $pdf->setX(170);                                                               
        $pdf->Cell(10,6,utf8_decode('Especifique: ______________________________'),0,0,'C');

        //PAGO DE VIVIENDA//
        $pdf->Ln(12);
        $pdf->SetTextColor(99, 99, 99);
        $pdf->SetFont('Arial','B',11);
        $pdf->setX(54);                                                               
        $pdf->Cell(10,6,utf8_decode('15. ¿Cuánto paga de vivienda mensualmente?'),0,0,'C');
        $pdf->Line(102, 85, 162, 85);//HORIZONTAL

        //COSTO DE VIVIENDA//
        $pdf->Ln(13);
        $pdf->SetTextColor(99, 99, 99);
        $pdf->SetFont('Arial','B',11);
        $pdf->setX(83);                                                               
        $pdf->Cell(10,6,utf8_decode('16. Si su grupo familiar tiene casa propia: ¿Cuál es el valor actual de su casa?'),0,0,'C');
        $pdf->Line(162, 97, 222, 97);//HORIZONTAL

        //VEHÍCULO//
        $pdf->Ln(13);
        $pdf->SetTextColor(99, 99, 99);
        $pdf->SetFont('Arial','B',11);
        $pdf->setX(47);                                                               
        $pdf->Cell(10,6,utf8_decode('17. ¿Posee vehículo su grupo familiar?'),0,0,'C');
        $pdf->Line(88, 111, 120, 111);//HORIZONTAL

        //CUADRO 2
        $pdf->Ln(12);
        $pdf->SetFillColor(99, 99, 99);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->setX(100);  
        $pdf->Cell(56,6,utf8_decode('Tipo de vehículo'),1,0,'C',1);
        $pdf->Cell(40,6,utf8_decode('Año'),1,0,'C',1);
        $pdf->Cell(36,6,utf8_decode('Valor actual'),1,0,'C',1);

        //VEHÍCULO//
        $pdf->Ln(13);
        $pdf->SetTextColor(99, 99, 99);
        $pdf->SetFont('Arial','B',11);
        $pdf->setX(61);                                                               
        $pdf->Cell(10,6,utf8_decode('18. ¿Posee deudas actualmente en su grupo familiar?'),0,0,'C');
        $pdf->Line(24, 141, 120, 141);//HORIZONTAL
        $pdf->Ln(5);
        $pdf->setX(162);                                                               
        $pdf->Cell(10,6,utf8_decode('Monto total mensual: __________________'),0,0,'C');

         ////////////////////////////////////////CUARTA PAGINA//////////////////////////////////////////////////////////////
         $pdf->AddPage('L','Letter');//PAGINA AÑADIDA

        //GASTOS//
        $pdf->Ln(2);
        $pdf->SetFont('Arial','B',11);
        $pdf->setX(52);                                                               
        $pdf->Cell(10,6,utf8_decode('20. Gastos mensuales de su grupo familiar:'),0,0,'C');

        $pdf->Ln(6);
        $pdf->SetFont('Arial','',10);
        $pdf->setX(87);                                                               
        $pdf->Cell(10,6,utf8_decode('1. Alimentación (gasto mensual promedio)_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ $__________'),0,0,'C');
        $pdf->Ln(5);
        $pdf->setX(87);                                                               
        $pdf->Cell(10,6,utf8_decode('2. Alquiler de vivienda o pago de casa en el Banco o en el FSV_ _ _ _ _ _ $__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(87);                                                               
        $pdf->Cell(10,6,utf8_decode('3. Servicios generales (total de últimos recibos pagados)._ _ _ _ _ _ _ _ _ $__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(73);                                                               
        $pdf->Cell(10,6,utf8_decode('3.1. Energía eléctrica._ _ _ _ _ _ _ _ _ $__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(73);                                                               
        $pdf->Cell(10,6,utf8_decode('3.2. Energía agua._ _ _ _ _ _ _ _ _ _ _ $__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(73);                                                               
        $pdf->Cell(10,6,utf8_decode('3.3. Teléfono._ _ _ _ _ _ _ _ _ _ _ _ _   $__________'),0,0,'C');
        
        $pdf->Ln(5);
        $pdf->setX(73);                                                               
        $pdf->Cell(10,6,utf8_decode('3.4. Vigilancia._ _ _ _ _ _ _ _ _ _ _ _ _ $__________'),0,0,'C');
        
        $pdf->Ln(5);
        $pdf->setX(73);                                                               
        $pdf->Cell(10,6,utf8_decode('3.5. Servicio doméstico._ _ _ _ _ _ _ _ $__________'),0,0,'C');
        
        $pdf->Ln(5);
        $pdf->setX(73);                                                               
        $pdf->Cell(10,6,utf8_decode('3.6. Alcaldía._ _ _ _ _ _ _ _ _ _ _ _ _ _ $__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(87);                                                               
        $pdf->Cell(10,6,utf8_decode('4. Pago de deudas (Préstamos personales, pago de vehículos)._ _ _ _ _ _ $__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(87);                                                               
        $pdf->Cell(10,6,utf8_decode('5. Cotizaciones a la AFP, al ISSS o al INPEP (Descuento Mensual)._ _ _ _ $__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(87);                                                               
        $pdf->Cell(10,6,utf8_decode('6. Pago de Seguros:_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ $__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(73.5);                                                               
        $pdf->Cell(10,6,utf8_decode('6.1. Seguro Personal:_ _ _ _ _ _ _ _ _  $__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(73.5);                                                               
        $pdf->Cell(10,6,utf8_decode('6.2. Seguro de vehiculo:_ _ _ _ _ _ _ _ $__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(73.5);                                                               
        $pdf->Cell(10,6,utf8_decode('6.3. Seguro de inmuebles:_ _ _ _ _ _ _ $__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(87);                                                               
        $pdf->Cell(10,6,utf8_decode('7. Transporte (pago de buses/taxi o gasolina mensualmente)._ _ _ _ _ _ _ $__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(87);                                                               
        $pdf->Cell(10,6,utf8_decode('8. Gastos de mantenimiento de vehículos._ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _   $__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(87);                                                               
        $pdf->Cell(10,6,utf8_decode('9. Salud e Higiene (gasto mensual aproximado)._ _ _ _ _ _ _ _ _ _ _ _ _ _  $__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(87);                                                               
        $pdf->Cell(10,6,utf8_decode('10. Pagos de cuotas mensuales a asociaciones o clubes sociales._ _ _ _ _ $__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(44.5);                                                               
        $pdf->Cell(10,6,utf8_decode('11. Educación (pagos mensuales).'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(74);                                                               
        $pdf->Cell(10,6,utf8_decode('11.1. Pago de colegiaturas._ _ _ _ _ _ _  $__________'),0,0,'C');
        $pdf->setX(146);                                                               
        $pdf->Cell(10,6,utf8_decode('$__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(74.5);                                                               
        $pdf->Cell(10,6,utf8_decode('11.2. Pago de cuotas universitarias._ _ _ $__________'),0,0,'C');
        $pdf->setX(146);                                                               
        $pdf->Cell(10,6,utf8_decode('$__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(74.5);                                                               
        $pdf->Cell(10,6,utf8_decode('11.3. Gasto en material de estudio._ _ _  $__________'),0,0,'C');
        $pdf->setX(146);                                                               
        $pdf->Cell(10,6,utf8_decode('$__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(87);                                                               
        $pdf->Cell(10,6,utf8_decode('12. Otros pagos o descuentos mensuales._ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _$__________'),0,0,'C');
        
        $pdf->Ln(5);
        $pdf->setX(74.5);                                                               
        $pdf->Cell(10,6,utf8_decode('Impuesto sobre renta_ _ _ _ _ _ _ _ _ _ _ $__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(74.5);                                                               
        $pdf->Cell(10,6,utf8_decode('IVA_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ $__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(74.5);                                                               
        $pdf->Cell(10,6,utf8_decode('Tarjetas de crédito_ _ _ _ _ _ _ _ _ _ _ _ $__________'),0,0,'C');

        $pdf->Ln(5);
        $pdf->setX(74.5);                                                               
        $pdf->Cell(10,6,utf8_decode('Otros_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ $__________'),0,0,'C');

        $pdf->Output();
?>
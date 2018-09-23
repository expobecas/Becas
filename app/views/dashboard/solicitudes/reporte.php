<?php
require_once('../../../../app/helpers/validator.class.php');
require_once('../../../../app/models/database.class.php');
require_once('../../../../app/libraries/fpdf/fpdf.php');

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
        $pdf->Cell(10,12,utf8_decode('Año:'),0,0,'C');
            // Movernos a la derecha
        $pdf->setX(238);
            // Título
        $pdf->Cell(10,27,utf8_decode('N°:'),0,0,'C');

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
        $pdf->Ln(6);
        $pdf->setX(34);
        $pdf->Cell(10,18,utf8_decode('Especialidad:'),0,0,'C');
        $pdf->Ln(6);
        $pdf->setX(40);
        $pdf->Cell(10,18,utf8_decode('Código:'),0,0,'C');

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
        // POSICIÓN X - INCLINACIÓN EN X D - LONGITUD X - INCLINACIÓN  EN X I
        $pdf->Line(48, 39 , 100, 39);//HORIZONTAL

        $pdf->Ln(7);
        $pdf->setX(18);
        $pdf->Cell(10,6,utf8_decode('2. Nombre de el o la estudiante:'),0,0,'');
        $pdf->Line(74, 46, 200, 46);//HORIZONTAL

        $pdf->Ln(7);
        $pdf->setX(18);
        $pdf->Cell(10,6,utf8_decode('3. Sexo:'),0,0,'');
        $pdf->Line(34, 53 , 80, 53);//HORIZONTAL

        $pdf->Ln(7);
        $pdf->setX(18);
        $pdf->Cell(10,6,utf8_decode('4. Religión:'),0,0,'');
        $pdf->Line(39, 60 , 100, 60);//HORIZONTAL

        $pdf->Ln(7);
        $pdf->setX(18);
        $pdf->Cell(10,6,utf8_decode('5. Personas con las que vive:'),0,0,'');
        $pdf->Line(69, 67, 114, 67);//HORIZONTAL
        $pdf->setX(128);
        $pdf->Cell(10,6,utf8_decode('Especifique: ________________________________'),0,0,'');

        $pdf->Ln(7);
        $pdf->setX(18);
        $pdf->Cell(10,6,utf8_decode('6. Dirección exacta:'),0,0,'');
        $pdf->Line(54, 74, 180, 74);//HORIZONTAL
        $pdf->setX(182);
        $pdf->Cell(10,6,utf8_decode('Email: ______________________________'),0,0,'');

        $pdf->Ln(7);
        $pdf->setX(18);
        $pdf->Cell(10,6,utf8_decode('7. Télefonos:'),0,0,'');
        $pdf->setX(41);
        $pdf->Cell(10,6,utf8_decode('Linea fija: _____________'),0,0,'');
        $pdf->setX(86);
        $pdf->Cell(10,6,utf8_decode('Celular (papá): _____________'),0,0,'');
        $pdf->setX(140);
        $pdf->Cell(10,6,utf8_decode('Celular (mamá): _____________'),0,0,'');
        $pdf->setX(195);
        $pdf->Cell(10,6,utf8_decode('Celular (hijo/a): ______________'),0,0,'');

        $pdf->Ln(7);
        $pdf->setX(18);
        $pdf->Cell(10,6,utf8_decode('8. Lugar y fecha de nacimiento:'),0,0,'');
        $pdf->Line(73, 88, 144, 88);//HORIZONTAL
        $pdf->setX(146);
        $pdf->Cell(10,6,utf8_decode('País: __________________'),0,0,'');
        $pdf->setX(194);
        $pdf->Cell(10,6,utf8_decode('Edad: _____ años'),0,0,'');

        $pdf->Ln(7);
        $pdf->setX(18);
        $pdf->Cell(10,6,utf8_decode('9. Sus estudios son financiados por:'),0,0,'');
        $pdf->Line(82, 95, 125, 95);//HORIZONTAL
        $pdf->setX(128);
        $pdf->Cell(10,6,utf8_decode('Especifique: ______________________________________________'),0,0,'');

        $pdf->Ln(7);
        $pdf->setX(18);
        $pdf->Cell(10,6,utf8_decode('10. Nombre de la institución educativa donde estudió antes de ingresar a la instiución:'),0,0,'');
        $pdf->Line(250, 102, 165, 102);//HORIZONTAL

        $pdf->Ln(7);
        $pdf->setX(24);
        $pdf->Cell(10,6,utf8_decode('Departamento:'),0,0,'');
        $pdf->Line(51, 109, 100, 109);//HORIZONTAL
        $pdf->setX(100);
        $pdf->Cell(10,6,utf8_decode('País: _________________'),0,0,'');
        $pdf->setX(145);
        $pdf->Cell(10,6,utf8_decode('Cuota que pagaba: $________________'),0,0,'');
        $pdf->setX(213);
        $pdf->Cell(10,6,utf8_decode('Año: ________________'),0,0,'');

        //PRIMER CUADRO//
        $pdf->Ln(17);
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(250,6,utf8_decode('11. CUADRO No. 1'),0,0,'');
        

        $pdf->Output();
?>

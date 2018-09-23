<?php
require_once('../../../../app/helpers/validator.class.php');
require_once('../../../../app/models/database.class.php');
require_once('../../../../app/libraries/fpdf/fpdf.php');

class PDF extends FPDF
{

}

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

        //CUADRO 
        //Posiciones x, y - Tamaño width y heigh
        $pdf->Rect(9,9,261, 197);
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

        //INDICACIONES GENERALES
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
        
        //NOTA
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
         $pdf->setX(18);
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

        //REQUISITOS PARA APLICANTES
        $pdf->setY(46);
        $pdf->Rect(150,50,111, 29);
        //FORMATO DEL TÍTULO
        $pdf->SetFillColor(99, 99, 99);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Ln(4);
        $pdf->setX(150);
        //TÍTULO
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(111,6,utf8_decode('NOTA'),0,0,'C',1);
        //PARRAFO
        //PARRAFO
        $pdf->Ln(3);
        $pdf->SetFont('Arial','',10);
        $pdf->SetTextColor(99, 99, 99);
        $pdf->setX(144);
        //GUARDO EL TEXTO EN UNA VARIABLE Y LUEGO LO IMPRIMO
        //GUARDO EL TEXTO EN UNA VARIABLE Y LUEGO LO IMPRIMO
        $nota = "
        * Familia de escasos recursos.
        * Promedio de nota mínima 7.5.
        * Buena conducta
        * Disposición para prestar servicio social a la institución cuando se
        le solicite";

        $pdf->MultiCell(180,4,utf8_decode($nota)); 
    
        $pdf->Output();
?>
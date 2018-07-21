<?php
require_once('../../../models/database.class.php');
require_once('../../../helpers/validator.class.php');
require_once('../../../models/casos.class.php');
require_once('../../../models/usuario.class.php');
require_once('../../../libraries/fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {   
        //Posiciones x, y - Tamaño width y heigh
        $this->Rect(15,10,175, 30);
        //URL-POSICION X - PISICION Y - TAMAÑO
        $this->Image('../../../../web/img/reportes/logo_ricaldone.png',22,13,24);
        // Arial bold 15
        $this->SetFont('Arial','',10);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(38,14,utf8_decode('Instituto Técnico Ricaldone'),0,0,'C');
        $this->Ln(6);

        $this->SetFont('Arial','B',10);
        $this->Cell(197,16,utf8_decode('Departamento de Trabajo Social'),0,0,'C');

        $this->Ln(6);
        $this->SetFont('Arial','',11);
        $this->Cell(198,18,utf8_decode('"Información sobre casos"'),0,0,'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
$caso = new Casos;
$usuario = new Usuario;
$pdf = new PDF;
$pdf->AddPage();

//Se obtiene la fecha de El Salvador
date_default_timezone_set("America/El_Salvador");
//Se da un formato y se guarda en una variable
$Fecha = date("d/m/Y");
$Hora = date("H:i:s");
$usuario->setId($_GET['id']);
$usuario->readUsuario();

//Información general del usuario en sesión 
$pdf->SetFont('Times','B',12);
$pdf->Cell(77,18,utf8_decode('Información del usuario en sesión:'),0,0,'C');
$pdf->Ln(7);
$pdf->SetFont('Times','',12);
$pdf->setX(25);
//Usuario
$pdf->setX(25);
$pdf->Cell(10,18,utf8_decode('Usuario:'),0,0,'C');
$pdf->Cell(25,18,$usuario->getUsuario(),0,0,'C');
//Fecha
$pdf->setX(127);
$pdf->Cell(10,18,utf8_decode('Fecha de expedición: '),0,0,'C');
$pdf->SetX(154);
$pdf->SetFont('Times','B',12);
$pdf->Cell(10, 18, $Fecha, 0, 0,'C');
//
$pdf->setX(25);
$pdf->SetFont('Times','',12);
$pdf->Cell(10,30,utf8_decode('Nombre: '),0,0,'C');
$pdf->Cell(30,30,$usuario->getNombres().' '.$usuario->getApellidos(),0,0,'C');
$pdf->setX(114);
$pdf->Cell(10,30,utf8_decode('Hora: '),0,0,'C');
$pdf->Ln(6);
$pdf->SetX(128);
$pdf->SetFont('Times','B',12);
$pdf->Cell(10, 18, $Hora, 0, 0,'C');
$pdf->Ln();
$casos = $caso->getCasos();

$pdf->Cell(50, 10, 'Nombre de alumno', 1, 0, 'C');
$pdf->Cell(45, 10, utf8_decode('Fecha que se generó'), 1, 0, 'C');
$pdf->Cell(45, 10, 'Estado de solicitud', 1, 0, 'C');
$pdf->Cell(40, 10, 'Fecha de cita', 1, 0, 'C');
$pdf->Ln();

foreach($casos as $row)
{
    $pdf->Cell(50, 10, $row['primer_nombre'].' '.$row['primer_apellido'], 1, 0, 'C');
    $pdf->Cell(45, 10, $row['fecha'], 1, 0, 'C');
    $pdf->Cell(45, 10, $row['estado_solicitud'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['start'], 1, 0, 'C');
    $pdf->Ln();
}

$pdf->Output();
?>
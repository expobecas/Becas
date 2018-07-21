<?php
require_once('../../../../../app/helpers/validator.class.php');
require_once('../../../../../app/models/database.class.php');
require_once('../../../../../app/libraries/fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{   
    //Posiciones x, y - Tamaño width y heigh
    $this->Rect(15,10,175, 30);
    //URL-POSICION X - PISICION Y - TAMAÑO
    $this->Image('../../../../../web/img/reportes/logo_ricaldone.png',22,13,24);
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
    $this->Cell(198,18,utf8_decode('"Información de becas"'),0,0,'C');
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


// Creación del objeto de la clase heredada
$pdf = new PDF('P','mm','A4'); //Pagina tamaño papel bond
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->setMargins(15,15,15);

//OBTENGO LA HORA DE EL SALVADOR
$hora = new DateTime("now", new DateTimeZone('America/El_Salvador'));
//OBTENGO LA FECHA 
$fecha = new DateTime('now', new DateTimeZone('America/El_Salvador'));

//Información general del usuario en sesión 
$pdf->SetFont('Times','B',12);
$pdf->Cell(77,18,utf8_decode('Información del usuario en sesión:'),0,0,'C');
$pdf->Ln(7);
$pdf->SetFont('Times','',12);
$pdf->setX(25);
//Usuario
$pdf->setX(25);
$pdf->Cell(10,18,utf8_decode('Usuario:'),0,0,'C');

//Fecha
$pdf->setX(127);
$pdf->Cell(10,18,utf8_decode('Fecha de expedición:'),0,0,'C');
$pdf->SetX(154);
$pdf->SetFont('Times','B',12);
$pdf->Cell(10, 18, $fecha->format('d-m-y'), 0, 0,'C');
//
$pdf->setX(25);
$pdf->SetFont('Times','',12);
$pdf->Cell(10,30,utf8_decode('Nombre:'),0,0,'C');
$pdf->setX(114);
$pdf->Cell(10,30,utf8_decode('Hora:'),0,0,'C');
$pdf->Ln(6);
$pdf->SetX(128);
$pdf->SetFont('Times','B',12);
//FORMATO DE HORA G = 24 HORAS - I = MINUTOS - A = AM O PM
$pdf->Cell(10, 18, $hora->format('G:i a'), 0, 0,'C');

//INFORMACION DE LA BECA 
$pdf->Ln(15);
$pdf->SetFont('Times','B',12);
$pdf->Cell(32,18,utf8_decode('ESTUDIANTE'),0,0,'C');
$pdf->Ln(8);
$pdf->Cell(37,18,utf8_decode('Datos generales:'),0,0,'C');
$pdf->Ln(2);

//DATOS
$pdf->setX(23);
$pdf->SetFont('Times','',12);
$pdf->Cell(10,30,utf8_decode('Carnet:'),0,0,'C');
$pdf->setX(115);
$pdf->Cell(10,30,utf8_decode('Grado:'),0,0,'C');
$pdf->setX(25);
$pdf->Cell(10,42,utf8_decode('Nombres:'),0,0,'C');
$pdf->setX(118);
$pdf->Cell(10,42,utf8_decode('Apellidos:'),0,0,'C');
$pdf->setX(25);
$pdf->Cell(10,54,utf8_decode('Religión:'),0,0,'C');
$pdf->setX(119);
$pdf->Cell(10,54,utf8_decode('Encargado:'),0,0,'C');
$pdf->setX(26);
$pdf->Cell(10,66,utf8_decode('Dirección:'),0,0,'C');

$pdf->Ln(35);
$pdf->SetFont('Times','B',12);
$pdf->Cell(41,18,utf8_decode('PATROCINADOR'),0,0,'C');
$pdf->Ln(8);
$pdf->Cell(37,18,utf8_decode('Datos generales:'),0,0,'C');
$pdf->Ln(2);

$pdf->setX(23);
$pdf->SetFont('Times','',12);
$pdf->Cell(10,30,utf8_decode('Nombres:'),0,0,'C');
$pdf->setX(25);
$pdf->Cell(10,54,utf8_decode('Religión:'),0,0,'C');


$pdf->Output();
?>
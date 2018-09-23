<?php
require_once('../../../../app/helpers/validator.class.php');
require_once('../../../../app/models/database.class.php');
require_once('../../../../app/models/becas.class.php');
require_once('../../../../app/models/usuario.class.php');
require_once('../../../../app/libraries/fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{   
    //Posiciones x, y - Tamaño width y heigh
    $this->Rect(15,10,185, 30);
    //URL-POSICION X - PISICION Y - TAMAÑO
    $this->Image('../../../../web/img/reportes/logo_ricaldone.jpg',22,13,24);
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
    $this->Cell(198,18,utf8_decode('"Becas en el sistema"'),0,0,'C');
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

session_start();
//Llamando los modelos
$becas = new Becas;


// Creación del objeto de la clase heredada
$pdf = new PDF('P','mm','letter'); //Pagina tamaño papel bond
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->setMargins(15,15,15);

//OBTENGO LA HORA DE EL SALVADOR
$hora = new DateTime("now", new DateTimeZone('America/El_Salvador'));
//OBTENGO LA FECHA 
$fecha = new DateTime('now', new DateTimeZone('America/El_Salvador'));

//Información general del usuario en sesión 
$pdf->SetFont('Arial','B',12);
$pdf->Cell(77,18,utf8_decode('Información del usuario en sesión:'),0,0,'C');
$pdf->Ln(7);
$pdf->SetFont('Arial','',12);
$pdf->setX(25);
//Usuario
$pdf->setX(25);
$pdf->Cell(10,18,utf8_decode('Usuario:'),0,0,'C');
$pdf->Cell(38,18,$_SESSION['usuario'],0,0,'C');

//Fecha
$pdf->setX(127);
$pdf->Cell(10,18,utf8_decode('Fecha de expedición:'),0,0,'C');
$pdf->SetX(154);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(10, 18, $fecha->format('d-m-y'), 0, 0,'C');
//
$pdf->setX(25);
$pdf->SetFont('Arial','',12);

$pdf->setX(114);
$pdf->Cell(10,30,utf8_decode('Hora:'),0,0,'C');
$pdf->Ln(6);
$pdf->SetX(128);
$pdf->SetFont('Arial','B',12);
//FORMATO DE HORA G = 24 HORAS - I = MINUTOS - A = AM O PM
$pdf->Cell(10, 18, $hora->format('G:i a'), 0, 0,'C');

/////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////

//Becas correspondientes
$pdf->SetFont('Arial','B',12);
$pdf->Ln(17);

$pdf->SetX(15);
$pdf->Cell(30, 10, 'Becas existentes', 0, 0);
$pdf->SetX(51);
$pdf->SetFont('Arial','',8);
$pdf->Ln(10);
$pdf->SetX(15); //Movimiento de posición en X
$pdf->SetFillColor(99, 99, 99);
$pdf->SetFont('Arial', 'B', 11);
 $pdf->SetTextColor(0, 0, 0);
$pdf->SetTextColor(250, 251, 251);
$pdf->Cell(30, 6, 'Carnet', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Nombre', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Apellido', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Empresa', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Periodo de pago', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Fecha de inicio', 1, 0, 'C', 1);
$pdf->Ln(6);

$datos = $becas->getBecas2();
foreach ($datos as $row) {
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial', '', 8);
    $pdf->SetX(15);
    $pdf->SetFillColor(255, 132, 124);
    $pdf->Cell(30, 6, $row['n_carnet'], 1, 0, 'C',1);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(30, 6, $row['primer_nombre'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['primer_apellido'], 1, 0, 'C');
    $pdf->SetFillColor(153, 184, 152);
    $pdf->Cell(30, 6, $row['nombre_empresa'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['periodo'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['fecha_ini_beca'], 1, 0, 'C',1);

    $pdf->Ln();
}
/*
$pdf->Ln(10);

$pdf->SetX(53);
$pdf->Cell(30, 10, 'Usuarios empresa', 0, 0);
$pdf->Ln(10);
$pdf->SetX(53); //Movimiento de posición en X
$pdf->SetFillColor(99, 99, 99);
$pdf->SetFont('Times', 'B', 11);
$pdf->SetTextColor(250, 251, 251);
$pdf->Cell(35, 6, 'Nombres', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'Apellidos', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'Usuario', 1, 0, 'C', 1);
$pdf->Ln(6);

$datos2 = $usuarios->getTipoUsuario2();
foreach ($datos2 as $row) {
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Times', '', 11);
    $pdf->SetX(53);
   
    $pdf->Cell(35, 6, $row['nombres'], 1, 0, 'C');
    $pdf->Cell(40, 6, $row['apellidos'], 1, 0, 'C');
    $pdf->Cell(40, 6, $row['usuario'], 1, 0, 'C');
    $pdf->Ln();

}

$pdf->Ln(14);

$pdf->SetX(53);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Times', 'B', 11);
$pdf->Cell(30, 10, 'Usuarios jefes', 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetX(53); //Movimiento de posición en X
$pdf->SetFillColor(99, 99, 99);
$pdf->SetFont('Times', 'B', 11);
$pdf->SetTextColor(250, 251, 251);
$pdf->Cell(35, 6, 'Nombres', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'Apellidos', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'Usuario', 1, 0, 'C', 1);
$pdf->Ln(6);

$datos2 = $usuarios->getTipoUsuario3();
foreach ($datos2 as $row) {
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Times', '', 11);
    $pdf->SetX(53);
   
    $pdf->Cell(35, 6, $row['nombres'], 1, 0, 'C');
    $pdf->Cell(40, 6, $row['apellidos'], 1, 0, 'C');
    $pdf->Cell(40, 6, $row['usuario'], 1, 0, 'C');
    $pdf->Ln();

}*/

$pdf->Output();
?>
<?php
require_once('../../../../app/helpers/validator.class.php');
require_once('../../../../app/models/database.class.php');
require_once('../../../../app/models/usuario.class.php');
require_once('../../../../app/models/patrocinadores.class.php');
require_once('../../../../app/libraries/fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{   
    //Posiciones x, y - Tamaño width y heigh
    $this->Rect(15,10,175, 30);
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
    $this->Cell(198,18,utf8_decode('"Patrocinador por tipo especifico"'),0,0,'C');
    // Salto de línea
    $this->Ln(20);
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

session_start();
//Llamando los modelos
$usuarios = new Usuario;
<<<<<<< HEAD
$patrocinador = new Patrocinadores;
=======
$solicitud = new Patrocinadores;
>>>>>>> 5fa3c353cd7c6962fd67c551785619ba461af590

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
$pdf->Cell(25,18,$_SESSION['usuario'],0,0,'C');

//Fecha
$pdf->setX(127);
$pdf->Cell(10,18,utf8_decode('Fecha de expedición:'),0,0,'C');
$pdf->SetX(154);
$pdf->SetFont('Times','B',12);
$pdf->Cell(10, 18, $fecha->format('d-m-y'), 0, 0,'C');
//
$pdf->setX(25);
$pdf->SetFont('Times','',12);
<<<<<<< HEAD
=======
$pdf->Cell(10,30,utf8_decode('Nombre:'),0,0,'C');
>>>>>>> 5fa3c353cd7c6962fd67c551785619ba461af590
$pdf->setX(114);
$pdf->Cell(10,30,utf8_decode('Hora:'),0,0,'C');
$pdf->Ln(6);
$pdf->SetX(128);
$pdf->SetFont('Times','B',12);
//FORMATO DE HORA G = 24 HORAS - I = MINUTOS - A = AM O PM
$pdf->Cell(10, 18, $hora->format('G:i a'), 0, 0,'C');

/////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////

//Becas correspondientes
$pdf->SetFont('Times','B',12);
$pdf->Ln(17);

$pdf->SetX(18);
$pdf->Cell(30, 10, 'Patrocinadores jefe', 0, 0);
$pdf->Ln(10);
$pdf->SetX(18); //Movimiento de posición en X
$pdf->SetFillColor(99, 99, 99);
$pdf->SetFont('Times', 'B', 11);
$pdf->SetTextColor(250, 251, 251);
<<<<<<< HEAD
$pdf->Cell(35, 6, 'Profesion', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Nombres', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Apellidos', 1, 0, 'C', 1);
$pdf->Cell(45, 6, 'Cargo', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Empresa', 1, 0, 'C', 1);
$pdf->Ln(6);

$datos = $patrocinador->getTipoPa();
=======
$pdf->Cell(35, 6, 'Nombre', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Apellido', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Carnet', 1, 0, 'C', 1);
$pdf->Cell(45, 6, 'Especialidad', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Grado', 1, 0, 'C', 1);
$pdf->Ln(6);

$datos = $solicitud->getSolicitudPorTipo();
>>>>>>> 5fa3c353cd7c6962fd67c551785619ba461af590
foreach ($datos as $row) {
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetX(18);
<<<<<<< HEAD
    $pdf->Cell(35, 6, $row['profesion'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['nombres'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['apellidos'], 1, 0, 'C');
    $pdf->Cell(45, 6, $row['cargo'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['nombre_empresa'], 1, 0, 'C');

=======
    $pdf->Cell(35, 6, $row['primer_nombre'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['primer_apellido'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['n_carnet'], 1, 0, 'C');
    $pdf->Cell(45, 6, $row['especialidad'], 1, 0, 'C');
    $pdf->Cell(30, 6, utf8_decode($row['grado']), 1, 0, 'C');
>>>>>>> 5fa3c353cd7c6962fd67c551785619ba461af590

    $pdf->Ln();
}

$pdf->Ln(10);

$pdf->SetX(18);
<<<<<<< HEAD
$pdf->Cell(30, 10, 'Patrocinadore empresa', 0, 0);
=======
$pdf->Cell(30, 10, 'Solicitudes aprobadas', 0, 0);
>>>>>>> 5fa3c353cd7c6962fd67c551785619ba461af590
$pdf->Ln(10);
$pdf->SetX(18); //Movimiento de posición en X
$pdf->SetFillColor(99, 99, 99);
$pdf->SetFont('Times', 'B', 11);
$pdf->SetTextColor(250, 251, 251);
<<<<<<< HEAD
$pdf->Cell(35, 6, 'Profesion', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Nombres', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Apellidos', 1, 0, 'C', 1);
$pdf->Cell(45, 6, 'Cargo', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Empresa', 1, 0, 'C', 1);

$pdf->Ln(6);

$datos2 = $patrocinador->getTipoPa2();
=======
$pdf->Cell(35, 6, 'Nombre', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Apellido', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Carnet', 1, 0, 'C', 1);
$pdf->Cell(45, 6, 'Especialidad', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Grado', 1, 0, 'C', 1);
$pdf->Ln(6);

$datos2 = $solicitud->getSolicitudPorTipo2();
>>>>>>> 5fa3c353cd7c6962fd67c551785619ba461af590
foreach ($datos2 as $row) {
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Times', '', 11);
    $pdf->SetX(18);
   
<<<<<<< HEAD
    $pdf->Cell(35, 6, $row['profesion'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['nombres'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['apellidos'], 1, 0, 'C');
    $pdf->Cell(45, 6, $row['cargo'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['nombre_empresa'], 1, 0, 'C');
   

=======
    $pdf->Cell(35, 6, $row['primer_nombre'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['primer_apellido'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['n_carnet'], 1, 0, 'C');
    $pdf->Cell(45, 6, $row['especialidad'], 1, 0, 'C');
    $pdf->Cell(30, 6, utf8_decode($row['grado']), 1, 0, 'C');
>>>>>>> 5fa3c353cd7c6962fd67c551785619ba461af590
    $pdf->Ln();

}

$pdf->Ln(14);

$pdf->SetX(18);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Times', 'B', 11);
<<<<<<< HEAD
$pdf->Cell(30, 10, 'Patrocinador independiente', 0, 0);
=======
$pdf->Cell(30, 10, 'Solicitudes rechazadas', 0, 0);
>>>>>>> 5fa3c353cd7c6962fd67c551785619ba461af590
$pdf->Ln(10);
$pdf->SetX(18); //Movimiento de posición en X
$pdf->SetFillColor(99, 99, 99);
$pdf->SetFont('Times', 'B', 11);
$pdf->SetTextColor(250, 251, 251);
<<<<<<< HEAD
$pdf->Cell(35, 6, 'Profesion', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Nombres', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Apellidos', 1, 0, 'C', 1);
$pdf->Cell(45, 6, 'Cargo', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Empresa', 1, 0, 'C', 1);

$pdf->Ln(6);

$datos2 = $patrocinador->getTipoPa3();
=======
$pdf->Cell(35, 6, 'Nombre', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Apellido', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Carnet', 1, 0, 'C', 1);
$pdf->Cell(45, 6, 'Especialidad', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Grado', 1, 0, 'C', 1);
$pdf->Ln(6);

$datos2 = $solicitud->getSolicitudPorTipo3();
>>>>>>> 5fa3c353cd7c6962fd67c551785619ba461af590
foreach ($datos2 as $row) {
    $pdf->SetTextColor(250, 251, 251);
    $pdf->SetFont('Times', '', 11);
    $pdf->SetX(18);
   
<<<<<<< HEAD
    $pdf->Cell(35, 6, $row['profesion'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['nombres'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['apellidos'], 1, 0, 'C');
    $pdf->Cell(45, 6, $row['cargo'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['nombre_empresa'], 1, 0, 'C');
    
=======
    $pdf->Cell(35, 6, $row['primer_nombre'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['primer_apellido'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['n_carnet'], 1, 0, 'C');
    $pdf->Cell(45, 6, $row['especialidad'], 1, 0, 'C');
    $pdf->Cell(30, 6, utf8_decode($row['grado']), 1, 0, 'C');
>>>>>>> 5fa3c353cd7c6962fd67c551785619ba461af590
    $pdf->Ln();

}

$pdf->Output();
?>
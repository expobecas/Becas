<?php
require_once('../../../../../app/helpers/validator.class.php');
require_once('../../../../../app/models/database.class.php');
require_once('../../../../../app/models/usuario.class.php');
require_once('../../../../../app/models/patrocinadores.class.php');
require_once('../../../../../app/libraries/fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{   
    //Posiciones x, y - Tamaño width y heigh
    $this->Rect(15,10,175, 30);
    //URL-POSICION X - PISICION Y - TAMAÑO
    $this->Image('../../../../../web/img/reportes/logo_ricaldone.jpg',22,13,24);
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
    $this->Cell(198,18,utf8_decode('"Información correspondiente al patrocinador"'),0,0,'C');
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

//Llamando los modelos
$usuarios = new Usuario;
$patrocinador = new Patrocinadores;

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
//$usuarios->setId($_SESSION['id']);
$usuarios->getInformacion();
$pdf->Cell(25,18,$usuarios->getId(),0,0,'C');

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

/////////////////////////////////////////////////////////////////////////

//Informacón del patrocinador
$pdf->Ln(15);
$pdf->SetFont('Times','B',12);
$pdf->Cell(60,18,utf8_decode('Información del patrocinador:'),0,0,'C');
$pdf->Ln(7);

//LINEAS PARA LLAMAR LA INFORMACIÓN
$patrocinador->setId_patrocinador($_GET['id']);
$patrocinador->ReadPatrocinadores();
//PARTE 1
$pdf->SetFont('Times','',12);
//PROFESION
$pdf->setX(39);
$pdf->Cell(10,19,utf8_decode('Profesion: '.$patrocinador->getProfesion()),0,0,'C');
//CATEGORIA
$pdf->setX(126);
$pdf->Cell(10,19,utf8_decode('Categoria: '.$patrocinador->getTipo2()),0,0,'C');
//PARTE 2
//NOMBRES
$pdf->setX(39);
$pdf->Cell(10,31,utf8_decode('Nombres: '.$patrocinador->getNombres()),0,0,'C');
//APELLIDOS
$pdf->setX(131);
$pdf->Cell(10,31,utf8_decode('Apellidos: '.$patrocinador->getApellidos()),0,0,'C');
$pdf->Ln(12);
//PARTE 3
$pdf->SetFont('Times','',12);
$pdf->setX(35);
//CARGO
$pdf->Cell(10,19,utf8_decode('Cargo: '.$patrocinador->getCargo()),0,0,'C');
//EMPRESA
$pdf->setX(127);
$pdf->Cell(10,19,utf8_decode('Empresa: '.$patrocinador->getNombre_empresa()),0,0,'C');
//PARTE 4
//TELEFONO
$pdf->setX(34);
$pdf->Cell(10,31,utf8_decode('Teléfono: '.$patrocinador->getTelefono()),0,0,'C');
//DIRECCION
$pdf->setX(130);
$pdf->Cell(10,31,utf8_decode('Dirección: '.$patrocinador->getDireccion()),0,0,'C');
$pdf->Ln(18);

////////////////////////////////////////////////////////////////////////

//Becas correspondientes
$pdf->SetFont('Times','B',12);
$pdf->Cell(50,18,utf8_decode('Becas correspondientes:'),0,0,'C');
$pdf->Ln(17);

//Tabla
$pdf->SetX(18); //Movimiento de posición en X
$pdf->SetFillColor(99, 99, 99);
$pdf->SetFont('Times', 'B', 8);
$pdf->SetTextColor(250, 251, 251);
$pdf->Cell(20, 6, 'Codigo', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Nombres', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Apellidos', 1, 0, 'C', 1);
$pdf->Cell(23, 6, 'Grado', 1, 0, 'C', 1);
$pdf->Cell(25, 6, 'Monto', 1, 0, 'C', 1);
$pdf->Cell(25, 6, 'Perido de pago', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'Estado', 1, 0, 'C', 1);
$pdf->Ln(6);
$patrocinador->setId_patrocinador($_GET['id']);
$datos = $patrocinador->BecasCorrespondientes();
foreach ($datos as $row) {
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetX(18);
    $pdf->Cell(20, 6, utf8_decode($row['n_carnet']), 1, 0, 'C');
    $pdf->Cell(30, 6, utf8_decode($row['primer_nombre']), 1, 0, 'C');
    $pdf->Cell(30, 6, utf8_decode($row['primer_apellido']), 1, 0, 'C');
    $pdf->Cell(23, 6, utf8_decode($row['grado']), 1, 0, 'C');
    $pdf->Cell(25, 6, utf8_decode($row['monto']), 1, 0, 'C');
    $pdf->Cell(25, 6, utf8_decode($row['periodo_pago']), 1, 0, 'C');
    $pdf->Cell(20, 6, utf8_decode($row['estado_solicitud']), 1, 1, 'C');
}

$pdf->Output();
?>
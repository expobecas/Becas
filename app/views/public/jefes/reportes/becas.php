<?php
require_once('../../../../../app/helpers/validator.class.php');
require_once('../../../../../app/models/database.class.php');
require_once('../../../../../app/models/becas.class.php');
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
    $this->Cell(198,18,utf8_decode('"Información de becas"'),0,0,'C');
    // Salto de línea
    $this->Ln(22);
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

//LLAMANDO A LOS MODELOS
$becas = new Becas;

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
$pdf->Cell(10,32,utf8_decode('Nombre:'),0,0,'C');
$pdf->setX(114);
$pdf->Cell(10,32,utf8_decode('Hora:'),0,0,'C');
$pdf->Ln(6);
$pdf->SetX(128);
$pdf->SetFont('Times','B',12);
//FORMATO DE HORA G = 24 HORAS - I = MINUTOS - A = AM O PM
$pdf->Cell(10, 20, $hora->format('G:i a'), 0, 0,'C');

//INFORMACION DE LA BECA 
$pdf->Ln(15);
$pdf->Rect(15, 80, 175, 45); //RECTáNGULO
$pdf->SetFont('Times','B',12);
$pdf->SetFillColor(99, 99, 99); //COLOR DE LA CELDA
$pdf->setY(80);
$pdf->SetTextColor(250, 251, 251); //COLOR DEL TEXTO
$pdf->Cell(175,8,utf8_decode('ESTUDIANTE'),0, 0, 'C', 1);
$pdf->Ln(3);    
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(37,18,utf8_decode('Datos generales:'),0,0,'C');
$pdf->Ln(2);

//LINEAS PARA LLAMAR LA INFORMACIÓN
$becas->setId($_GET['id']);
$becas->getDetallebecas();

//DATOS
$pdf->setX(32);
$pdf->SetFont('Times','',12);
$pdf->Cell(10,30,utf8_decode('Carnet: '.$becas->getNum_carnet()),0,0,'C');
$pdf->setX(121);
$pdf->Cell(10,30,utf8_decode('Grado: '.$becas->getGrado()),0,0,'C');
$pdf->setX(40);
$pdf->Cell(10,42,utf8_decode('Nombres: '.$becas->getNombre1().' '.$becas->getNombre2()),0,0,'C');
$pdf->setX(135);
$pdf->Cell(10,42,utf8_decode('Apellidos: '.$becas->getApellido1().' '.$becas->getApellido2()),0,0,'C');
$pdf->setX(28);
$pdf->Cell(10,54,utf8_decode('Religión: '.$becas->getReligion()),0,0,'C');
$pdf->setX(129);
$pdf->Cell(10,54,utf8_decode('Encargado: '.$becas->getEncargado()),0,0,'C');
$pdf->setX(29);
$pdf->Cell(10,66,utf8_decode('Dirección: '.$becas->getDireccion()),0,0,'C');

//INFORMACIÓN DEL PATROCINADOR
$pdf->Ln(45);
$pdf->Rect(15, 130, 175, 45); //RECTÁNGULO
$pdf->SetFont('Times','B',12);
$pdf->SetFillColor(99, 99, 99); //COLOR DE LA CELDA
$pdf->setY(130);
$pdf->SetTextColor(250, 251, 251); //COLOR DEL TEXTO
$pdf->Cell(175,8,utf8_decode('PATROCINADOR'),0, 0, 'C', 1);
$pdf->Ln(8);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(37,18,utf8_decode('Datos generales:'),0,0,'C');
$pdf->setX(109);
$pdf->Cell(37,18,utf8_decode('Financiación a la beca:'),0,0,'C');
$pdf->Ln(2);

//DATOS 
$pdf->setX(40);
$pdf->SetFont('Times','',12);
$pdf->Cell(10,30,utf8_decode('Nombres: '.$becas->getNombres()),0,0,'C');
$pdf->setX(117);
$pdf->Cell(10,30,utf8_decode('Importe: '.$becas->getMonto()),0,0,'C');
$pdf->setX(39);
$pdf->Cell(10,42,utf8_decode('Apellidos: '.$becas->getApellidos()),0,0,'C');
$pdf->setX(118);
$pdf->Cell(10,42,utf8_decode('Periodo: '.$becas->getPeriodo_pago()),0,0,'C');
$pdf->setX(35);
$pdf->Cell(10,54,utf8_decode('Empresa: '.$becas->getNombre_empresa()),0,0,'C');

$pdf->Output();
?>
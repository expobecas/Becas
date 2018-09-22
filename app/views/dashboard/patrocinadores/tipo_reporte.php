<?php
require_once('../../../../app/helpers/validator.class.php');
require_once('../../../../app/models/database.class.php');
require_once('../../../../app/models/usuario.class.php');
require_once('../../../../app/models/patrocinadores.class.php');
require_once('../../../../app/models/categorias.class.php');
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
    $this->Cell(198,18,utf8_decode('"Patrocinadores por tipo especifico"'),0,0,'C');
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
$solicitud = new Patrocinadores;

// Creación del objeto de la clase heredada
$pdf = new PDF('L','mm','A4'); //Pagina tamaño papel bond
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

$pdf->setX(114);
$pdf->Cell(10,30,utf8_decode('Hora:'),0,0,'C');
$pdf->Ln(6);
$pdf->SetX(128);
$pdf->SetFont('Times','B',12);
$pdf->Cell(10, 18, $hora->format('G:i a'), 0, 0,'C');

$pdf->ln(10);
$query = "SELECT id_tipo_patro, tipo_patrocinador FROM tipo_patrocinador WHERE id_tipo_patro BETWEEN 1 and 4  ";
    $params = array(null);
    $titulo = Database::getRows($query, $params);

	foreach($titulo as $tipo)
	{
        $pdf->ln(10);
        $pdf->Cell(192,10,utf8_decode("Tipo: ".$tipo['tipo_patrocinador']),1,1,'C');

        $query = "SELECT id_patrocinador, tipo_patrocinador, profesion, nombres, apellidos, cargo, nombre_empresa, direccion, telefono,correo FROM patrocinadores INNER JOIN tipo_patrocinador USING(id_tipo_patro) WHERE tipo_patrocinador.id_tipo_patro = $tipo[id_tipo_patro] ORDER BY id_tipo_patro";
        $params = array(null);
        $productos = Database::getRows($query, $params);

        $pdf->Cell(30,6,'Nombres',1,0,'C');
        $pdf->Cell(30,6,'Apellidos',1,0,'C');
        $pdf->Cell(30,6,'Profesion',1,0,'C');
        $pdf->Cell(30,6,'Cargo',1,0,'C');
        $pdf->Cell(30,6,'Telefono',1,0,'C');
        $pdf->Cell(42,6,'Correo',1,1,'C');


        if($productos){
            foreach($productos as $tipos)
            {
                $pdf->Cell(30,6,utf8_decode($tipos['nombres']),1,0,'C');  
                $pdf->Cell(30,6,utf8_decode($tipos['apellidos']),1,0,'C'); 
                $pdf->Cell(30,6,utf8_decode($tipos['profesion']),1,0,'C'); 
                $pdf->Cell(30,6,utf8_decode($tipos['nombre_empresa']),1,0,'C'); 
                $pdf->Cell(30,6,utf8_decode($tipos['telefono']),1,0,'C'); 
                $pdf->Cell(42,6,utf8_decode($tipos['correo']),1,1,'C');  

            }
        }else{
            $pdf->Cell(192,6,'No hay Patrocinadores',1,1,'C');
        }
    }
	$pdf->Output();
?>
<?php
require_once('../../../models/database.class.php');
require_once('../../../helpers/validator.class.php');
require_once('../../../models/casos.class.php');
require_once('../../../models/usuario.class.php');
require_once('../../../libraries/fpdf/fpdf.php');

//Se obtiene la fecha de El Salvador
date_default_timezone_set("America/El_Salvador");
//Se da un formato y se guarda en una variable
$Fecha = date("d/m/Y");
$Hora = date("H:i:s");


class PDF extends FPDF
{
	function Footer()
	{
		// Posición: a 1,5 cm del final
        $this->SetY(-85);
		$this->SetFont('Arial', '', 11);
		$this->Cell(70, 0, utf8_decode('CUOTA A PAGAR EN BECA'), 0, 0);
		$this->Cell(0, 0, utf8_decode('$___________'), 0, 0);

		$this->Ln(7);
		$this->Cell(70, 0, utf8_decode('CUOTA A PAGAR POR EL ALUMNO'), 0, 0);
		$this->Cell(0, 0, utf8_decode('$___________'), 0, 0);

		$this->Ln(7);
		$this->Cell(70, 0, utf8_decode('BECA APROBADA A PARTIR DEL MES:_______________ AÑO '.date('Y').''), 0, 0);

		$this->Ln(7);
		$this->Cell(70, 0, utf8_decode('EXONERAR $___________ DE MATRICULA'), 0, 0);

		$this->Ln(7);
		$this->Cell(0, 0, utf8_decode(''), 1, 0);
		$this->Ln(7);
		$this->Cell(0, 0, utf8_decode(''), 1, 0);
		$this->Ln(7);
		$this->Cell(0, 0, utf8_decode(''), 1, 0);

		$this->SetFont('Arial', 'B', 11);
		$this->Ln(5);
		$this->Cell(70, 0, utf8_decode('Autorizaciones:'), 0, 0);

		$this->Ln(20);
		$this->Cell(75, 0, utf8_decode(''), 1, 0);
		$this->setX(125);
		$this->Cell(75, 0, utf8_decode(''), 1, 0);

		$this->Ln(5);
		$this->Cell(90, 0, utf8_decode('Pbro. Mario Alberto Aldana Jovel SDB'), 0, 0);
		$this->setX(135);
		$this->Cell(100, 0, utf8_decode('Licenciada: Roxana de Portillo'), 0, 0);

		$this->Ln(5);
		$this->Cell(70, 0, utf8_decode('Director'), 0, 0, 'C');
		$this->setX(130);
		$this->Cell(70, 0, utf8_decode('Adminsitradora'), 0, 0, 'C');


	}
}

$pdf = new PDF;
$caso = new Casos;
$caso->setIdCaso($_GET['id']);
$info = $caso->reporteCasos();

$nombre_alumno = $info['primer_nombre'].' '.$info['segundo_nombre'].', '.$info['primer_apellido'].' '.$info['segundo_apellido'];

$pdf->AddPage();

$pdf->SetFont('Arial','BU', 14);
$pdf->Cell(0,16,utf8_decode('CASO N° '.$info['id_caso'].''),0,0, 'R');
$pdf->Ln(20);

$pdf->SetFont('Arial', '', 11);
$pdf->Cell(50, 0, utf8_decode('NOMBRE DEL ALUMNO(A) '), 0, 0);
$pdf->SetFont('Arial', 'U', 11);
$pdf->Cell(67, 0, utf8_decode(''.$nombre_alumno.' '), 0, 0);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(17, 0, utf8_decode('CODIGO '), 0, 0);
$pdf->SetFont('Arial', 'U', 11);
$pdf->Cell(13, 0, utf8_decode(''.$info['n_carnet'].''), 0, 0);

$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(50, 0, utf8_decode('GRADO Y ESPECIALIDAD'), 0, 0);
$pdf->SetFont('Arial', 'U', 11);
$pdf->Cell(50, 0, utf8_decode($info['grado'].' '.$info['especialidad']), 0, 1);

$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, 0, utf8_decode('FECHA '.date('F Y').''), 0, 1);

$pdf->Ln(10);
$pdf->SetFont('Arial', 'BU', 11);
$pdf->Cell(0, 0, utf8_decode('DESCRIPCIÓN DEL CASO'), 0, 1);
$pdf->Ln(7);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 0, utf8_decode($info['descripcion']), 0, 1);

$pdf->Output();
?>
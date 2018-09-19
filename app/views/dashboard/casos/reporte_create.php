<?php
require_once('../../../models/database.class.php');
require_once('../../../helpers/validator.class.php');
require_once('../../../models/casos.class.php');
require_once('../../../models/usuario.class.php');
require_once('../../../libraries/fpdf/fpdf.php');

class PDF extends FPDF
{
	function Header()
    {
        
    }
}

$pdf = new PDF;
$pdf->AddPage();
$pdf->SetFont('Arial','B', 14);
$pdf->Cell(300,16,utf8_decode('CASO N°'),0,0,'C');
$pdf->Ln(20);

$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 0, utf8_decode('NOMBRE DEL ALUMNO(A)'), 0, 0);
$pdf->Output();
?>
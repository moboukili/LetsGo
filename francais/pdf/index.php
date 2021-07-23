<?php
require "fpdf.php";
$db = new PDO('mysql:host=localhost;dbname=cov_db','root','');

/**
 * 
 */
class myPDF extends fPDF
{
	
	function header()
	{
		$this->Image('cc.jpeg',10,6);
		$this->SetFont('Arial','B',14);
		$this->Cell(276,5,'Form of a passenger',0,0,'C');
		$this->Ln(20);
	}
	function footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
	function headerTab(){
		$this->SetFont('Arial','B',11);
		$this->Cell(20,10,'Passenger information',0,0,'L');
		$this->Ln();
		$this->SetFont('Times','',10);
		$this->Cell(20,10,'Name and surname: ',0, 1, 'L'); 
		$this->Cell(20,10,'Mobile number: ',0, 1, 'L');
		$this->Cell(20,10,'Email address: ',0, 1, 'L');
		$this->SetFont('Arial','B',11);
		$this->Cell(20,10,'Schedule',0,0,'L');
		$this->Ln();
		$this->SetFont('Times','',10);
		$this->Cell(20,10,'Travel date: ',0, 1, 'L');
		$this->Cell(20,10,'Return date: ',0, 1, 'L');
		$this->Cell(20,10,'From: ',0, 1, 'L');
		$this->Cell(20,10,'To: ',0, 1, 'L');
		$this->SetFont('Arial','B',11);
		$this->Cell(20,10,'Details',0,0,'L');
		$this->Ln();
		$this->SetFont('Times','',10);
		$this->Cell(20,10,'Car type: ',0, 1, 'L');
		$this->Cell(20,10,'Number of seats: ',0, 1, 'L');
		$this->Cell(20,10,'Luggage: ',0, 1, 'L');
		$this->Cell(20,10,'Preferences: ',0, 1, 'L');
		$this->Ln();
	}
}

$pdf = new myPDF(); 
$pdf->SetTitle('Form printing');
$pdf->AddPage('L','A4',0);
$pdf->AliasNbPages();
$pdf->headerTab();
$pdf->Output(); 
?>

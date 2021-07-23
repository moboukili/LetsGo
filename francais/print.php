<?php session_start();
require "pdf/fpdf.php";


  
/**
 * 
 */
class myPDF extends fPDF
{
	function header()
	{
		$this->Image('pdf/cc.jpeg',10,6);
		$this->SetFont('Arial','B',14);
		$this->Cell(276,5,'Forme d\'un passager',0,0,'C');
		$this->Ln(20);
	}
	function footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
	function headerTab(){
		$this->SetFont('Arial','B',13);
		$this->Cell(20,10,'Information passager',0,0,'L');
		$this->Ln();
		$this->SetFont('Times','',12);
		$this->Cell(30,10,'Nom d\'utilisateur : ',0, 0, 'L');
		$this->Cell(80,10,$_SESSION["username"],0, 1, 'C'); 
		$this->Cell(30,10,'Numero : ',0, 0, 'L');
		$this->Cell(80,10,$_SESSION["phone"],0, 1, 'C');
		$this->Cell(30,10,'Email : ',0, 0, 'L');
		$this->Cell(80,10,$_SESSION["email"],0, 1, 'C');  
		$this->SetFont('Arial','B',13);
		$this->Cell(20,10,'Itineraire',0,0,'L');
		$this->Ln();
			if (isset($_GET['idride'])) {
		   $idride=$_GET['idride'];
		   $iduser = $_SESSION['id'];
		 $con = mysqli_connect("localhost","root","", "cov_db") or die(mysql_error()); 
		 $sql = "SELECT * FROM ride WHERE idride = '$idride' AND id = '$iduser' "; 
		 $result = mysqli_query($con, $sql);
		if(mysqli_num_rows($result) > 0)  
		{  
		 while($row = mysqli_fetch_array($result))  
		{
		$this->SetFont('Times','',12);
		$this->Cell(30,10,'Date de voyage : ',0, 0, 'L');
		$this->Cell(80,10,$row["travelDate"],0, 1, 'C');
		if($row["returnDate"]==0) {
	    }else{ 
	    $this->Cell(30,10,'Date du retour : ',0, 0, 'L');                             	
	    $this->Cell(80,10,$row["returnDate"],0, 1, 'C'); }
		$this->Cell(30,10,'De : ',0, 0, 'L');
		$this->Cell(80,10,$row["pickup"],0, 1, 'C');
		$this->Cell(30,10,'A : ',0, 0, 'L');
		$this->Cell(80,10,$row["dropoff"],0, 1, 'C');
		$this->SetFont('Arial','B',13);
		$this->Cell(20,10,'Details du voyage',0,0,'L');
		$this->Ln();
		$this->SetFont('Times','',12);
		$this->Cell(30,10,'Nombre de places : ',0, 0, 'L');
		$this->Cell(80,10,$row["seats"],0, 1, 'C');
		$this->Cell(30,10,'Bagages : ',0, 0, 'L');
		$this->Cell(80,10,$row["luggage"],0, 1, 'C');
		$this->Cell(30,10,'Preferences : ',0, 0, 'L');
		$this->Cell(80,10,$row["cigarette"],0, 1, 'C');
		$this->Cell(80,-10,$row["children"],0, 0, 'C');
		$this->Cell(30,-10,$row["music"],0, 0, 'C');
		$this->Ln();}  }  }
		
	}
}


$pdf = new myPDF(); 
$pdf->SetTitle('Impression de formulaire');
$pdf->AddPage('L','A4',0);
$pdf->AliasNbPages();
$pdf->headerTab();
$pdf->Output(); 
?>

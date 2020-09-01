<?php
session_start();
if(!isset($_SESSION['account']) || !isset($_SESSION['password'])){
    header("Location: login.php");
}
//role check 
if($_SESSION['role'] != "patient"){
    header("Location: login.php");
}
//call the FPDF library
require('fpdf181/fpdf.php');
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'infs3202');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('img/uqlogo.jpg',10,6,60);
    // Arial bold 15
    $this->SetFont('Arial','B',22);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(100,5,'INFS3202 Medical Booking System',2,0,'C');
    $this->Line(10,30,200,30);
    // Line break
    $this->Ln(30);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','B',10);
    // Page number
    $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
    // Add dummy cell to close the table

}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->SetTitle('All_Doctor_Details');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Cell(190,5,'All Doctor Details',0,0,'C');
$pdf->Ln(15);

//pdf contents
$pdf->SetFont('Arial','B',15);

$pdf->Cell(40,5,'Name',1,0);
$pdf->Cell(50,5,'Email',1,0);
$pdf->Cell(30,5,'Phone',1,0);
$pdf->Cell(70,5,'Hospital',1,1);


$pdf->SetFont('Arial','',11);
$query = mysqli_query($con,"SELECT * FROM doctor
  ORDER BY D_name");
while($data=mysqli_fetch_array($query)){
    $pdf->Cell(40,5,$data['D_name'],'LR',0);
    $pdf->Cell(50,5,$data['doctor_account'],'LR',0);
    $pdf->Cell(30,5,$data['phone'],'LR',0);
    $pdf->Cell(70,5,$data['hospital_name'],'LR',1);
}
$pdf->Cell(190,0,'','T','l');
$pdf->Output();

?>
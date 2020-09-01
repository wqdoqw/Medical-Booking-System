<?php
session_start();
if(!isset($_SESSION['account']) || !isset($_SESSION['password'])){
    header("Location: login.php");
}
//role check 
if($_SESSION['role'] != "doctor"){
    header("Location: login.php");
}
//call the FPDF library
require('fpdf181/fpdf.php');
$doctor_account = $_SESSION['account'];
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'infs3202');

$patient_name = $patient_email = $patient_phone = $booking_date = $booking_description = $booking_status = '';

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
$pdf->SetTitle('Medical_Booking_Details');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Cell(190,5,'All Booking Details',0,0,'C');
$pdf->Ln(15);

//pdf contents
$pdf->SetFont('Arial','B',15);

$pdf->Cell(40,5,'Name',1,0);
$pdf->Cell(80,5,'Email',1,0);
$pdf->Cell(25,5,'Phone',1,0);
$pdf->Cell(25,5,'Date',1,0);
$pdf->Cell(20,5,'Status',1,1);


$pdf->SetFont('Arial','',11);
$query = mysqli_query($con,"SELECT A.U_name AS user_name, A.user_account AS user_account, A.phone AS phone, 
    C.date_of_booking AS booking_date, A.picture_url AS picture_url,C.description AS description, C.status AS status
    FROM user A , doctor B, booking C
    WHERE C.user_account = A.user_account AND B.doctor_account = C.doctor_account AND B.doctor_account = '$doctor_account'
    ORDER BY C.date_of_booking;");
while($data=mysqli_fetch_array($query)){
    $pdf->Cell(40,5,$data['user_name'],'LR',0);
    $pdf->Cell(80,5,$data['user_account'],'LR',0);
    $pdf->Cell(25,5,$data['phone'],'LR',0);
    $pdf->Cell(25,5,$data['booking_date'],'LR',0);
    $pdf->Cell(20,5,$data['status'],'LR',1);
}
$pdf->Cell(190,0,'','T','l');
$pdf->Output();

?>
<?php
require_once 'fpdf/fpdf.php';
require_once 'php/utils.php'; 
require 'folder_sum.php';
$C = connect();
// $pdf = new FPDF(); 
// $pdf->AddPage();
// $pdf->Image('receipt_image/63aa264a790ae2.41808078.png',0,0,100,100);
// $pdf->Output();
$year = $_GET['year'];
if(isset($_POST['submit'])){
    $year = $_POST['year'];
}
// Create a new PDF document
$pdf = new FPDF();
// Retrieve the images from the database
$result = mysqli_query($C, "SELECT * FROM images where  YEAR='$year'");

// Iterate through the result set and add the images to the PDF
while($row = mysqli_fetch_array($result)) {
    
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(90, 10, $row['tittle'],1,0, 'C');
    // Line break
    $pdf->Ln(20);
    $image = 'receipt_image/'.$row['file_name'];

    // $pdf->SetMargins(1,1,1);
    $pdf->Image($image, 10, 30, 190, 0); 
    
}
$pdf->Output();    
// Save the PDF to a file
// $pdf->Output('mypdf.pdf', 'F');

// // Output the PDF to the browser for download
// $pdf->Output();

// Output the PDF to the browser for download
// $pdf->Output();
// class PDF extends FPDF
// {
//     // Page header
//     function Header()
//     {
//         // Logo
//         $this->Image('receipt_image/63aa264a790ae2.41808078.png',10,6,30);
//         // Arial bold 15
//         $this->SetFont('Arial','B',15);
//         // Move to the right
//         $this->Cell(80);
//         // Title
//         $this->Cell(30,10,'Title',1,0,'C');
//         // Line break
//         $this->Ln(20);
//     }

//     // Page footer
//     function Footer()
//     {
//         // Position at 1.5 cm from bottom
//         $this->SetY(-15);
//         // Arial italic 8
//         $this->SetFont('Arial','I',8);
//         // Page number
//         $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
//     }
// }

// Instanciation of inherited class
// $pdf = new PDF();
// $pdf->AliasNbPages();
// $pdf->AddPage();
// $pdf->SetFont('Times','',12);
// for($i=1;$i<=40;$i++)
//     $pdf->Cell(0,10,'Printing line number '.$i,0,1);
// $pdf->Output();
?>
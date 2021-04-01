<?php
use mikehaertl\pdftk\Pdf;

require_once '../../vendor/autoload.php';


$template_path = dirname(__FILE__).'/template.pdf';
$output_path = dirname(__FILE__).'/ex4.pdf';
// Fill form with data array
$pdf = new Pdf($template_path);
$result = $pdf->fillForm([
                             'name' => 'name1',
                             'address' => 'address1',
                             'city' => 'Beijing',
                             'phone' => 'รายละเอียด'
                         ])
    ->needAppearances()
    ->flatten()
    ->saveAs($output_path);

// Always check for errors
if ($result === false) {
    $error = $pdf->getError();
}

$pdf = new setasign\Fpdi\Tfpdf\Fpdi();
$pdf->setSourceFile($output_path);
$pdf->AddPage();
// import page 1
$tplId = $pdf->importPage(1);
// use the imported page and place it at point 10,10 with a width of 100 mm
$pdf->useTemplate($tplId);
$pdf->Image('audi.jpg',100,100,40,30);
$pdf->Output('F','ex4_with_logo.pdf');
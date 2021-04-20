<?php
/***************************
Sample using a PHP array
****************************/

require_once '../../vendor/autoload.php';

$fields = array(
    'name'    => 'name1',
    'address' => 'address1',
    'city'    => 'Beijing',
    'phone'   => 'รายละเอียด'
);
$template_path = dirname(__FILE__) . '/template.pdf';
$output_path = dirname(__FILE__) . '/ex1.pdf';

$pdf = new FPDM($template_path);
$pdf->Load($fields, true); // second parameter: false if field values are in ISO-8859-1, true if UTF-8
$pdf->Merge();

$pdf->Output('F',$output_path);

//$pdf = new setasign\Fpdi\Tfpdf\Fpdi();
//$pdf->setSourceFile($output_path);
//$pdf->AddPage();
//// import page 1
//$tplId = $pdf->importPage(1);
//// use the imported page and place it at point 10,10 with a width of 100 mm
//$pdf->useTemplate($tplId);
//$pdf->Image('audi.jpg', 100, 100);
//$pdf->Output('F', 'ex1_with_logo.pdf');
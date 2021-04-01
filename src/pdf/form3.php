<?php
require_once '../../vendor/autoload.php';

$template_path = dirname(__FILE__).'/template.pdf';
$output_path = dirname(__FILE__).'/ex3.pdf';
$field_data = array(
    'name'    => 'name1',
    'address' => 'address1',
    'city'    => 'Beijing',
    'phone'   => 'รายละเอียด'
);

PHPPDFFill\PDFFill::make($template_path, $field_data)->save_pdf($output_path);

$pdf = new setasign\Fpdi\Tfpdf\Fpdi();
$pdf->setSourceFile($output_path);
$pdf->AddPage();
// import page 1
$tplId = $pdf->importPage(1);
// use the imported page and place it at point 10,10 with a width of 100 mm
$pdf->useTemplate($tplId);
$pdf->Image('audi.jpg',100,100);
$pdf->Output('F','ex3_with_logo.pdf');
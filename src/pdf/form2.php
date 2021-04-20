<?php

require_once '../../vendor/autoload.php';

use acroforms\AcroForm;

$fields = [
    'text' => [ // text fields
        'name' => 'name1',
        'address' => 'address1',
        'city' => 'Beijing',
        'phone' => 'รายละเอียด'
    ]

];
$template_path = dirname(__FILE__) . '/template.pdf';
$output_path = dirname(__FILE__) . '/ex2.pdf';

$pdf = new AcroForm(
    $template_path
);
$pdf->load($fields)->merge();
if (php_sapi_name() == 'cli') {
    $pdf->output('F', $output_path);
} else {
    $pdf->output('I', 'filled.pdf');
}
//$pdf = new setasign\Fpdi\Tfpdf\Fpdi();
//$pdf->setSourceFile($output_path);
//$pdf->AddPage();
//// import page 1
//$tplId = $pdf->importPage(1);
//// use the imported page and place it at point 10,10 with a width of 100 mm
//$pdf->useTemplate($tplId);
//$pdf->Image('audi.jpg', 100, 100);
//$pdf->Output('F', 'ex2_with_logo.pdf');
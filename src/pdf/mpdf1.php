<?php
/**
 *
 */

require_once __DIR__ . '/../../vendor/autoload.php';

try {
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML('<h1>Hello world!</h1>');
    $mpdf->Output('hello.pdf', \Mpdf\Output\Destination::INLINE);
} catch (\Mpdf\MpdfException $e) {

}
<?php
/**
 *
 */
use Dompdf\Dompdf;
use Dompdf\Options;

require_once __DIR__ . '/../../vendor/autoload.php';

$options = new Options();
//$options->set('defaultFont', 'Courier');
//$options->set('isHtml5ParserEnabled', true);

$dompdf = new Dompdf($options);
$html = <<<EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
<title></title>
</head>
<body>
<h1>Line break test</h1>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec at
odio vitae libero tempus convallis. Cum sociis natoque penatibus et
magnis dis parturient montes, nascetur ridiculus mus. Vestibulum purus
mauris, dapibus eu, sagittis quis, sagittis quis, mi. Morbi fringilla
massa quis velit. Curabitur metus massa, semper mollis, molestie vel,<br/>
adipiscing nec, massa. Phasellus vitae felis sed lectus dapibus
facilisis. In ultrices sagittis ipsum. In at est. Integer iaculis
turpis vel magna. Cras eu est. Integer porttitor ligula a
<br/>
<br/>
tellus. Curabitur accumsan ipsum a velit. Sed laoreet lectus quis
leo. Nulla pellentesque molestie ante. Quisque vestibulum est id
justo. Ut pellentesque ante in neque.</p>

<p>Line break at beginning of next paragraph:</p>
<p style="border: 0.5pt solid blue"><br/>
Line 2</p>

<p>Line break within a font tag: 
<font face="Trebuchet MS,Arial,Helvetica,sans-serif">ABCDE<br/>FGHIJK</font></p>

<p>Line break within two nested spans: <span>span 1 <span>2<br/>break</span></span></p>

<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec at
odio vitae libero tempus convallis. Cum sociis natoque penatibus et
magnis dis parturient montes, nascetur ridiculus mus. Vestibulum purus
mauris, dapibus eu, sagittis quis, sagittis quis, mi. Morbi fringilla
massa quis velit. Curabitur metus massa, semper mollis, molestie vel,<br/>
adipiscing nec, massa. Phasellus vitae felis sed lectus dapibus
facilisis. In ultrices sagittis ipsum. In at est. Integer iaculis
turpis vel magna. Cras eu est. Integer porttitor ligula a
<br/>
<br/>
tellus. Curabitur accumsan ipsum a velit. Sed laoreet lectus quis
leo. Nulla pellentesque molestie ante. Quisque vestibulum est id
justo. Ut pellentesque ante in neque.</p>

</body>
</html>
EOD;
$dompdf->loadHtml($html);

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream();
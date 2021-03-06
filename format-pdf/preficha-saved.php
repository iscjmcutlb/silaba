<?php
include_once '../tools/FPDF/fpdf.php';

class PDF extends FPDF {
    
}

$pdf = new PDF();
$pdf->AddPage('P', 'Letter');
$pdf->Image("../img/logo.png", 10, 7.5, 40, 25);
$pdf->SetXY(0, 15);
$pdf->SetFont('Arial', 'B', 15);
$pdf->SetTextColor(28, 22, 101);
$pdf->Cell(215.5, 5, utf8_decode("Universidad Tecnológica Laja Bajío"), 0, 0, 'C');
$pdf->SetXY(0, 30);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(200, 5, utf8_decode("Folio:"), 0, 0, 'R');
$pdf->SetXY(5, $pdf->GetY()+15);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(28, 22, 101);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(205.5, 5, utf8_decode("Pre Ficha Para Examen de Admisión"), 1, 0, 'C', true);
$pdf->Ln();
$pdf->SetTextColor(28, 22, 101);
$pdf->SetFont('Arial', 'B', 10);
$Yini = $pdf->GetY();
$pdf->SetXY(6.5, $pdf->GetY() + 0.5);
$pdf->MultiCell(214, 5, utf8_encode("Nombre:  ".utf8_decode($data_alumno->fields[0])), 0, 'L');
$pdf->SetXY(6.5, ($pdf->GetY() + 0.5));
$pdf->MultiCell(214, 5, utf8_decode("Apellido Paterno:  ".utf8_decode($data_alumno->fields[1])), 0, 'L');
$pdf->SetXY(6.5, ($pdf->GetY() + 0.5));
$pdf->MultiCell(214, 5, utf8_decode("Apellido Materno:  ".utf8_decode($data_alumno->fields[2])), 0, 'L');
$pdf->SetXY(6.5, ($pdf->GetY() + 0.5));
$pdf->MultiCell(214, 5, utf8_decode("Curp:  ".utf8_decode($data_alumno->fields[3])), 0, 'L');
$pdf->SetXY(6.5, ($pdf->GetY() + 0.5));
$pdf->MultiCell(214, 5, utf8_decode("Correo Electrónico:  ".utf8_decode($data_alumno->fields[4])), 0, 'L');
$pdf->SetXY(6.5, ($pdf->GetY() + 0.5));
$pdf->MultiCell(214, 5, utf8_decode("Carrera Seleccionada:  "."(".$data_alumno->fields[8].") ".utf8_decode($data_alumno->fields[7])), 0, 'L');
$pdf->SetXY(6.5, ($pdf->GetY() + 0.5));
$pdf->MultiCell(214, 5, utf8_decode("Fecha de Examen:  ".$data_alumno->fields[6] ." - ".$data_alumno->fields[5]), 0, 'L');
$Yfin = $pdf->GetY() - $Yini;
$pdf->Rect(5, $Yini, 205.5, $Yfin);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$Yini= $pdf->GetY() + 10;
$pdf->SetXY(5, $pdf->GetY()+5);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(28, 22, 101);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(205.5, 5, utf8_decode("Datos Bancarios"), 1, 0, 'C', true);
$pdf->SetTextColor(28, 22, 101);
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(6.5, $pdf->GetY()+5);
$pdf->Cell(205.5, 5, utf8_decode("BANCO: BANAMEX"), 0, 0, 'L', FALSE);
$pdf->SetXY(6.5, $pdf->GetY()+5);
$pdf->Cell(205.5, 5, utf8_decode("SUCURSAL: 7009"), 0, 0, 'L', FALSE);
$pdf->SetXY(6.5, $pdf->GetY()+5);
$pdf->Cell(205.5, 5, utf8_decode("CUENTA: 4167394"), 0, 0, 'L', FALSE);
$pdf->SetXY(6.5, $pdf->GetY()+5);
$pdf->Cell(205.5, 5, utf8_decode("CLABE: 002215700941673948"), 0, 0, 'L', FALSE);
$pdf->SetXY(6.5, $pdf->GetY()+5);
$pdf->Cell(205.5, 5, utf8_decode("FONDO: DERECHOS EDUCATIVOS"), 0, 0, 'L', FALSE);
$pdf->SetXY(6.5, $pdf->GetY()+5);
$derechos_educativos = $modelo_derechosEducativos->get_derecho_educhativo_preficha();
$pdf->Cell(205.5, 5, utf8_decode("CONCEPTO: ".utf8_decode($derechos_educativos->fields[0])), 0, 0, 'L', FALSE);
$pdf->SetXY(6.5, $pdf->GetY()+5);
$pdf->Cell(205.5, 5, utf8_decode("MONTO: $".$derechos_educativos->fields[1]), 0, 0, 'L', FALSE);
$Yfin = $pdf->GetY() - $Yini + 5;
$pdf->Rect(5, $Yini, 205.5, $Yfin);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pdf->SetXY(5, $pdf->GetY()+10);
$Yini = $pdf->GetY();
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(28, 22, 101);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(205.5, 5, utf8_decode("Documentación"), 1, 0, 'C', true);
$pdf->SetTextColor(28, 22, 101);
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetXY(6.5, $pdf->GetY()+7);
$pdf->MultiCell(202.5, 3, utf8_decode("Deberás presentar la siguiente documentación en servicios escolares antes de la fecha del examen de admisión en un horario de 8:00 a 16:00 horas de lunes a viernes."), 0, 'J');
$pdf->SetXY(6.5, $pdf->GetY()+3);
$pdf->Cell(202.5, 3, utf8_decode("1.- Copia del Acta de Nacimiento."), 0, 0, 'L', FALSE);
$pdf->SetXY(6.5, $pdf->GetY()+5);
$pdf->Cell(202.5, 3, utf8_decode("2.- Copia de la Curp."), 0, 0, 'L', FALSE);
$pdf->SetXY(6.5, $pdf->GetY()+5);
$pdf->Cell(202.5, 3, utf8_decode("3.- Copia Certificado de Bachillerato (Si el certificado no cuenta con promedio deberá entregar una constancia con promedio)."), 0, 0, 'L', FALSE);
$pdf->SetXY(6.5, $pdf->GetY()+5);
$pdf->Cell(202.5, 3, utf8_decode("4.- 2 fotos tamaño infantil a color"), 0, 0, 'L', FALSE);
$pdf->SetXY(6.5, $pdf->GetY()+5);
$pdf->Cell(202.5, 3, utf8_decode("5.- Voucher de pago."), 0, 0, 'L', FALSE);
$pdf->SetXY(6.5, $pdf->GetY()+5);
$pdf->Cell(202.5, 3, utf8_decode("6.- Formato de la pre ficha."), 0, 0, 'L', FALSE);
$Yfin = $pdf->GetY() - $Yini +5;
$pdf->Rect(5, $Yini, 205.5, $Yfin);
$pdf->Output("../format-pdf/".$data_alumno->fields[3] . "preficha.pdf", 'F');
?>
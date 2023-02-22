<?php

require('../fpdf/fpdf.php');

$ip = '127.0.0.1';
$user = 'root';
$password = '';
$db = 'my_andrearanica';
$id = $_REQUEST['id'];

$connection = new mysqli($ip, $user, $password, $db);

$query = "SELECT * FROM evaluations WHERE id=$id;";

$result = $connection->query($query);

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);
while($row = $result->fetch_assoc()) {
    $businessName = $row['businessName'];
    $cost = $row['cost'];
    $date = $row['date'];
    $heightFromGround = $row['heightFromGround'];
    $verticalDistance = $row['verticalDistance'];
    $horizontalDistance = $row['horizontalDistance'];
    $angularDisplacement = $row['angularDisplacement'];
    $gripValue = $row['gripValue'];
    $maximumWeight = $row['maximumWeight'];
    $realWeight = $row['realWeight'];
    $IR = $row['IR'];

    $pdf->Cell(190, 40, "Ragione sociale: $businessName", 1, 1, 'C');
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 14, "Data di rilascio valutazione: $date");
    $pdf->Ln();
    $pdf->Cell(0, 14, "Costo: $cost euro");
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(190, 10, "Fattori moltiplicativi", 1, 1, 'C');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 10, "Altezza da terra delle mani all'inizio del sollevamento: $heightFromGround cm");
    $pdf->Ln();
    $pdf->Cell(0, 10, "Distanza verticale di spostamento del peso fra inizio e fine del sollevamento: $verticalDistance cm");
    $pdf->Ln();
    $pdf->Cell(0, 10, "Distanza orizzontale tra le mani e il punto di mezzo delle caviglie: $horizontalDistance cm");
    $pdf->Ln();
    $pdf->Cell(0, 10, "Dislocazione angolare del peso in gradi: $angularDisplacement gradi");
    $pdf->Ln();
    $pdf->Cell(0, 10, "Giudizio sulla presa del carico: $gripValue");
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(190, 10, 'Valutazione', 1, 1, 'C');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 10, "Peso massimo sollevabile: $maximumWeight kg");
    $pdf->Ln();
    $pdf->Cell(0, 10, "Peso realmente sollevato: $realWeight kg");
    $pdf->Ln();
    if ($IR <= 0.85) {
        $pdf->SetFillColor(0, 204, 1);
    } else if ($IR <= 0.99) {
        $pdf->SetFillColor(255, 153, 0);
    } else {
        $pdf->SetFillColor(204, 51, 0); 
    }
    $pdf->Cell(0, 10, "Indice di sollevamento: $IR", 1, 1, 'C', true);
    if ($IR <= 0.85) {
        $pdf->Cell(190, 20, "Situazione accettabile: non e' necessario nessun provvedimento", 1, 1, 'C', true);
    } else if ($IR <= 0.99) {
        $pdf->Cell(190, 20, "E' necessario attivare la sorveglianza sanitaria e la formazione e informazione del personale", 1, 1, 'C', true);
    } else {
        $pdf->Cell(190, 20, "E' necessario attivare interventi di prevenzione, la sorveglianza sanitaria annuale e la formazione e informazione del personale", 1, 1, 'C', true);
    }
}

$pdf->Output();

?>
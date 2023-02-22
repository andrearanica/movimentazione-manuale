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
    $frequency = $row['frequency'];
    $duration = $row['duration'];
    $oneHand = $row['oneHand'];
    $twoPeople = $row['twoPeople'];
    $maximumWeight = $row['maximumWeight']; 
    $realWeight = $row['realWeight'];
    $IR = $row['IR'];

    $pdf->Cell(190, 40, "Ragione sociale: $businessName", 1, 1, 'C');
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 14, "Data di rilascio valutazione: $date", 0, 0, 'C', false);
    $pdf->Ln();
    $pdf->Cell(0, 14, "Costo: $cost euro", 0, 0, 'C', false);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(190, 10, "Fattori moltiplicativi", 1, 1, 'C');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 10, "Altezza da terra delle mani all'inizio del sollevamento: $heightFromGround cm", 0, 0, 'C', false);
    $pdf->Ln();
    $pdf->Cell(0, 10, "Distanza verticale di spostamento del peso fra inizio e fine del sollevamento: $verticalDistance cm", 0, 0, 'C', false);
    $pdf->Ln();
    $pdf->Cell(0, 10, "Distanza orizzontale tra le mani e il punto di mezzo delle caviglie: $horizontalDistance cm", 0, 0, 'C', false);
    $pdf->Ln();
    $pdf->Cell(0, 10, "Dislocazione angolare del peso in gradi: $angularDisplacement gradi", 0, 0, 'C', false);
    $pdf->Ln();
    $pdf->Cell(0, 10, "Giudizio sulla presa del carico: $gripValue", 0, 0, 'C', false);
    $pdf->Ln();
    $pdf->Cell(0, 10, "Frequenza: $frequency; Durata: $duration", 0, 0, 'C', false);
    $pdf->Ln();
    if ($oneHand == 1) {
        $pdf->Cell(0, 10, "Sollevamento con una sola mano? Si'", 0, 0, 'C', false);
    } else {
        $pdf->Cell(0, 10, "Sollevamento con una mano? No", 0, 0, 'C', false);
    }
    $pdf->Ln();
    if ($twoPeople == 1) {
        $pdf->Cell(0, 10, "Sollevamento fatto da due persone: Si'", 0, 0, 'C', false);
    } else {
        $pdf->Cell(0, 10, "Sollevamento fatto da due persone? No", 0, 0, 'C', false);
    }
    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(190, 10, 'Valutazione', 1, 1, 'C');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 10, "Peso massimo sollevabile: $maximumWeight kg", 0, 0, 'C', false);
    $pdf->Ln();
    $pdf->Cell(0, 10, "Peso realmente sollevato: $realWeight kg", 0, 0, 'C', false);
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
        $pdf->Cell(190, 20, "E' necessario attivare interventi di prevenzione, la sorveglianza sanitaria annuale", 1, 1, 'C', true);
        $pdf->Cell(190, 20, " e la formazione e informazione del personale", 1, 1, 'C', true);
    }
}

$pdf->Output();

?>
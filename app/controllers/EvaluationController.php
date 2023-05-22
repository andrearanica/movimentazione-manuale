<?php

namespace App\controllers;

use fpdf;

class EvaluationController {
    public function NewEvaluation () {
        $businessName = $_REQUEST['businessName'];
        $cost = $_REQUEST['cost'];
        $date = $_REQUEST['date'];
        $heightFromGround = floatval($_REQUEST['heightFromGround']);
        $verticalDistance = floatval($_REQUEST['verticalDistance']);
        $horizontalDistance = floatval($_REQUEST['horizontalDistance']);
        $angularDisplacement = floatval($_REQUEST['angularDisplacement']);
        $gripValue = $_REQUEST['gripValue'];
        $realWeight = floatval($_REQUEST['realWeight']);
        $frequency = $_REQUEST['frequency'];
        $duration = $_REQUEST['duration'];

        if ($realWeight < 3 || $realWeight > 30 || $businessName == '' || $cost == '') {
            header('Location: dashboard?error=data');
            die('Errore');
        }

        $ip = '127.0.0.1';
        $user = 'root';
        $password = '';
        $db = 'my_andrearanica';

        $connection = new \mysqli($ip, $user, $password, $db);

        $heightFromGroundReport    = $connection->query("SELECT factor FROM heightfromground    WHERE height='$heightFromGround';");
        $verticalDistanceReport    = $connection->query("SELECT factor FROM verticaldistance    WHERE dislocation='$verticalDistance';");
        $horizontalDistanceReport  = $connection->query("SELECT factor FROM horizontaldistance  WHERE distance='$horizontalDistance';");
        $angularDisplacementReport = $connection->query("SELECT factor FROM angulardisplacement WHERE displacement='$angularDisplacement';");
        $gripValueReport           = $connection->query("SELECT factor FROM gripvalue           WHERE value='$gripValue';");
        $frequencyReport           = $connection->query("SELECT factor FROM frequency           WHERE CAST(frequency AS DECIMAL)=CAST($frequency AS DECIMAL) AND duration='$duration';");

        while ($row = $heightFromGroundReport->fetch_assoc()) {
            $heightFromGroundFactor = $row['factor'];
        }

        while ($row = $verticalDistanceReport->fetch_assoc()) {
            $verticalDistanceFactor = $row['factor'];
        }

        while ($row = $horizontalDistanceReport->fetch_assoc()) {
            $horizontalDistanceFactor = $row['factor'];
        }

        while ($row = $angularDisplacementReport->fetch_assoc()) {
            $angularDisplacementFactor = $row['factor'];
        }

        while ($row = $gripValueReport->fetch_assoc()) {
            $gripValueFactor = $row['factor'];
        }

        $frequencyFactor = 1;
        while ($row = $frequencyReport->fetch_assoc()) {
            $frequencyFactor = $row['factor'];
        }

        if (isset($_REQUEST['oneHand'])) {
            $oneHand = true;
        } else {
            $oneHand = false;
        }
        $oneHandFactor = 1;

        if (isset($_REQUEST['twoPeople'])) {
            $twoPeople = true;
        } else {
            $twoPeople = false;
        }
        $twoPeopleFactor = 1;

        if ($oneHand) {
            $oneHand = 1;
            $oneHandFactor = 0.6;    
        } else {
            $oneHand = 0;
        }

        // )

        if ($twoPeople) {
            $twoPeople = 1;
            $twoPeopleFactor = 0.85 / 2;
        } else {
            $twoPeople = 0;
        }

        $maximumWeight = 20 * $heightFromGroundFactor * $verticalDistanceFactor * $horizontalDistanceFactor * $angularDisplacementFactor * $gripValueFactor * $frequencyFactor * $oneHandFactor * $twoPeopleFactor;

        if ($maximumWeight <= 0) {
            $maximumWeight = -1;
            $IR = -1;
        } else {
            $IR = floatval(intval($realWeight) / $maximumWeight);
        }

        // echo "$heightFromGroundFactor $verticalDistanceFactor $horizontalDistanceFactor $angularDisplacementFactor $gripValueFactor $frequencyFactor $oneHandFactor $twoPeopleFactor";


        $author = $_SESSION['id'];

        $query = "INSERT INTO evaluations (author, businessName, cost, date, realWeight, heightFromGround, verticalDistance, horizontalDistance, angularDisplacement, gripValue, frequency, duration, oneHand, twoPeople, maximumWeight, IR) VALUES ('$author', '$businessName', $cost, '$date', $realWeight, '$heightFromGround', '$verticalDistance', '$horizontalDistance', '$angularDisplacement', '$gripValue', '$frequency', '$duration', '$oneHand', '$twoPeople', '$maximumWeight', '$IR');";
        echo $query;

        $result = $connection->query($query);

        header('Location: dashboard?success');
    }
    public function PrintPdf () {
        ini_set('display_errors', 1);
        require('../app/fpdf/fpdf.php');

        $ip = '127.0.0.1';
        $user = 'root';
        $password = getenv('PASSWORD');
        $db = 'my_andrearanica';
        $id = $_REQUEST['id'];

        $connection = new \mysqli($ip, $user, $password, $db);

        $query = "SELECT * FROM evaluations WHERE evaluation_id=$id;";

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

            if (!$row['valid']) {
                $pdf->SetFillColor(204, 51, 0); 
                $pdf->Cell(190, 10, "Valutazione scaduta", 1, 1, 'C', true);
            }

            $pdf->Cell(190, 20, "Ragione sociale: $businessName", 1, 1, 'C');
            $pdf->SetFont('Arial', 'B', 14);
            $pdf->Cell(0, 14, "Data: $date                                                                                  Costo: $cost euro", 0, 0, 'L', false);
            $pdf->Ln();
            $pdf->Ln();
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->SetFillColor(150, 150, 150);
            $pdf->Cell(0, 10, "Altezza da terra delle mani all'inizio del sollevamento", 0, 0, 'L', true);
            $pdf->Ln();
            $pdf->Cell(0, 10, "$heightFromGround cm", 0, 0, 'L', false);
            $pdf->Ln();
            $pdf->Cell(0, 10, "Distanza verticale di spostamento del peso fra inizio e fine del sollevamento", 0, 0, 'L', true);
            $pdf->Ln();
            $pdf->Cell(0, 10, "$verticalDistance cm", 0, 0, 'L', false);
            $pdf->Ln();
            $pdf->Cell(0, 10, "Distanza orizzontale tra le mani e il punto di mezzo delle caviglie", 0, 0, 'L', true);
            $pdf->Ln();
            $pdf->Cell(0, 10, "$horizontalDistance cm", 0, 0, 'L', false);
            $pdf->Ln();
            $pdf->Cell(0, 10, "Dislocazione angolare del peso in gradi", 0, 0, 'L', true);
            $pdf->Ln();
            $pdf->Cell(0, 10, "$angularDisplacement gradi", 0, 0, 'L', false);
            $pdf->Ln();
            $pdf->Cell(0, 10, "Giudizio sulla presa del carico", 0, 0, 'L', true);
            $pdf->Ln();
            $pdf->Cell(0, 10, "$gripValue", 0, 0, 'L', false);
            $pdf->Ln();
            $pdf->Cell(0, 10, "Frequenza: e durata", 0, 0, 'L', true);
            $pdf->Ln();
            $pdf->Cell(0, 10, "$frequency gesti al minuto per $duration", 0, 0, 'L', false);
            $pdf->Ln();
            if ($oneHand == 1) {
                $pdf->Cell(0, 10, "Sollevamento con una sola mano? Si'", 0, 0, 'L', true);
                $pdf->Ln();
                $pdf->Cell(0, 10, "Si'", 0, 0, 'L', false);
            } else {
                $pdf->Cell(0, 10, "Sollevamento con una mano?", 0, 0, 'L', true);
                $pdf->Ln();
                $pdf->Cell(0, 10, "No", 0, 0, 'L', false);
            }
            $pdf->Ln();
            if ($twoPeople == 1) {
                $pdf->Cell(0, 10, "Sollevamento fatto da due persone: Si'", 0, 0, 'L', true);
                $pdf->Ln();
                $pdf->Cell(0, 10, "Si'", 0, 0, 'L', false);
            } else {
                $pdf->Cell(0, 10, "Sollevamento fatto da due persone?", 0, 0, 'L', true);
                $pdf->Ln();
                $pdf->Cell(0, 10, "No", 0, 0, 'L', false);
            }
            $pdf->Ln();
            $pdf->Ln();
            
            if ($maximumWeight < 0) {
                $pdf->SetFillColor(204, 51, 0); 
                $pdf->Cell(190, 20, "Situazione non accettabile", 1, 1, 'C', true);
                $pdf->SetFont('Arial', 'B', 10);
                $pdf->Cell(190, 20, "Bisogna riprogettare la postazione lavorativa e le attivita' di lavoro", 1, 1, 'C', true);
            } else {
                $pdf->SetFont('Arial', 'B', 10);
                $pdf->Cell(0, 10, "Peso massimo sollevabile: $maximumWeight kg | Peso realmente sollevato: $realWeight kg", 0, 0, 'C', false);
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
                    $pdf->MultiCell(190, 10, "E' necessario attivare interventi di prevenzione, la sorveglianza sanitaria annuale \n e la formazione e informazione del personale", 1, 'C', true);
                }
            }
            
        }

        $pdf->Output();
    }
    public function EditEvaluation () {
        $id = $_REQUEST['id'];
        $ip = '127.0.0.1';
        $user = 'root';
        $password = getenv('PASSWORD');
        $db = 'my_andrearanica';

        $connection = new \mysqli($ip, $user, $password, $db);

        $query = "UPDATE evaluations SET valid=0 WHERE evaluation_id='$id'";
        $stmt = $connection->prepare($query);
        $stmt->execute();

        $this->NewEvaluation();

        // header('Location: dashboard?success');
    }
    public function DeleteEvaluation () {
        if (isset($_SESSION['username'])) {
            $id = $_REQUEST['id'];
            $ip = '127.0.0.1';
            $user = 'root';
            $password = getenv('PASSWORD');
            $db = 'my_andrearanica';
    
            $connection = new \mysqli($ip, $user, $password, $db);
    
            $query = "DELETE FROM evaluations WHERE evaluation_id='$id';";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            header('Location: dashboard?success');
        }
    }
}

?>
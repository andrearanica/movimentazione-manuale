<?php

ini_set('display_errors', 1);
session_start();

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
    header('Location: ../admin.php?error=data');
    die('Errore');
}

$ip = '127.0.0.1';
$user = 'root';
$password = '';
$db = 'my_andrearanica';

$connection = new mysqli($ip, $user, $password, $db);

$heightFromGroundReport    = $connection->query("SELECT factor FROM heightfromground    WHERE height='$heightFromGround';");
$verticalDistanceReport    = $connection->query("SELECT factor FROM verticaldistance    WHERE dislocation='$verticalDistance';");
$horizontalDistanceReport  = $connection->query("SELECT factor FROM horizontaldistance  WHERE distance='$horizontalDistance';");
$angularDisplacementReport = $connection->query("SELECT factor FROM angulardisplacement WHERE displacement='$angularDisplacement';");
$gripValueReport           = $connection->query("SELECT factor FROM gripvalue           WHERE value='$gripValue';");
$frequencyReport           = $connection->query("SELECT factor FROM frequency           WHERE duration='$duration' AND frequency=$frequency;");

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

if (isset($_GET['oneHand'])) {
    $oneHand = $_GET['oneHand'];
} else {
    $oneHand = 'off';
}
$oneHandFactor = 1;

if (isset($_GET['twoPeople'])) {
    $twoPeople = $_GET['twoPeople'];
} else {
    $twoPeople = 'off';
}
$twoPeopleFactor = 1;

if ($oneHand == 'on') {
    $oneHand = 1;
    $oneHandFactor = 0.6;    
} else {
    $oneHand = 0;
}

  // )

if ($twoPeople == 'on') {
    $twoPeople = 1;
    $twoPeopleFactor = 0.85 / 2;
} else {
    $twoPeople = 0;
}

$maximumWeight = 20 * $heightFromGroundFactor * $verticalDistanceFactor * $horizontalDistanceFactor * $angularDisplacementFactor * $gripValueFactor * $frequencyFactor * $oneHandFactor * $twoPeopleFactor;

if ($maximumWeight <= 0) {
    $maximumWeight = 0.01;
} 

$IR = floatval(intval($realWeight) / $maximumWeight);

$author = $_SESSION['id'];

$query = "INSERT INTO evaluations (businessName, author, cost, date, realWeight, heightFromGround, verticalDistance, horizontalDistance, angularDisplacement, gripValue, frequency, duration, oneHand, twoPeople, maximumWeight, IR) VALUES ('$businessName', $author, $cost, '$date', $realWeight, '$heightFromGround', '$verticalDistance', '$horizontalDistance', '$angularDisplacement', '$gripValue', '$frequency', '$duration', $oneHand, $twoPeople, '$maximumWeight', '$IR');";

$result = $connection->query($query);

header('Location: ../admin.php?result=success');

?>
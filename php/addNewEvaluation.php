<?php

$businessName = $_REQUEST['businessName'];
$cost = $_REQUEST['cost'];
$date = $_REQUEST['date'];
$heightFromGround = floatval($_REQUEST['heightFromGround']);
$verticalDistance = floatval($_REQUEST['verticalDistance']);
$horizontalDistance = floatval($_REQUEST['horizontalDistance']);
$angularDisplacement = floatval($_REQUEST['angularDisplacement']);
$gripValue = $_REQUEST['gripValue'];
$realWeight = floatval($_REQUEST['realWeight']);

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

$maximumWeight = 23 * $heightFromGroundFactor * $verticalDistanceFactor * $horizontalDistanceFactor * $angularDisplacementFactor * $gripValueFactor;

if ($maximumWeight <= 0) {
    $maximumWeight = 0.01;
} 

$IR = floatval(intval($realWeight) / $maximumWeight);

$query = "INSERT INTO evaluations (businessName, cost, date, realWeight, heightFromGround, verticalDistance, horizontalDistance, angularDisplacement, gripValue, maximumWeight, IR) VALUES ('$businessName', $cost, '$date', $realWeight, '$heightFromGround', '$verticalDistance', '$horizontalDistance', '$angularDisplacement', '$gripValue', '$maximumWeight', '$IR');";

$result = $connection->query($query);

header('Location: ../admin.php?result=success');

?>
<?php

$businessName = $_REQUEST['businessName'];
$date = $_REQUEST['date'];
$heightFromGround = $_REQUEST['heightFromGround'];
$verticalDistance = $_REQUEST['verticalDistance'];
$horizontalDistance = $_REQUEST['horizontalDistance'];
$angularDisplacement = $_REQUEST['angularDisplacement'];
$gripValue = $_REQUEST['gripValue'];
$realWeight = $_REQUEST['realWeight'];

$ip = '127.0.0.1';
$user = 'root';
$password = '';
$db = 'my_andrearanica';

$connection = new mysqli($ip, $user, $password, $db);

$heightFromGroundFactor    = $connection->query("SELECT factor FROM heightfromground    WHERE height='$heightFromGround';");
$verticalDistanceFactor    = $connection->query("SELECT factor FROM verticaldistance    WHERE dislocation='$verticalDistance';");
$horizontalDistanceFactor  = $connection->query("SELECT factor FROM horizontaldistance  WHERE distance='$horizontalDistance';");
$angularDisplacementFactor = $connection->query("SELECT factor FROM angulardisplacement WHERE displacement='$angularDisplacement';");
$gripValueFactor           = $connection->query("SELECT factor FROM gripvalue           WHERE value='$gripValue';");

echo var_dump ($heightFromgroundFactor);
// $maximumWeight = 23 * $heightFromGroundFactor * $verticalDistanceFactor * $horizontalDistanceFactor * $angularDisplacementFactor * $gripValueFactor;
// $IR = $realWeight / $maximumWeight;

$query = "INSERT 
INTO evaluations (businessName, date, realWeight, heightFromGround, verticalDistance, horizontalDistance, angularDisplacement, gripValue) 
VALUES ('$businessName', $date, $realWeight, '$heightFromGround', '$verticalDistance', '$horizontalDistance', '$angularDisplacement', '$gripValue');";

$result = $connection->query($query);
echo $result;

?>
<?php


$ip = '127.0.0.1';
$user = 'root';
$password = '';
$db = 'my_andrearanica';

$connection = new mysqli($ip, $user, $password, $db);

if (isset($_GET['table'])) {
    if ($_GET['table'] == 'heightFromGround') {
        $query = 'SELECT * FROM heightFromGround;';
    } else if ($_GET['table'] == 'verticalDistance') {
        $query = 'SELECT * FROM verticalDistance;';
    } else if ($_GET['table'] == 'horizontalDistance') {
        $query = 'SELECT * FROM horizontalDistance;';
    } else if ($_GET['table'] == 'angularDisplacement') {
        $query = 'SELECT * FROM angularDisplacement;';
    } else if ($_GET['table'] == 'gripValue') {
        $query = 'SELECT * FROM gripValue;';
    }
}

$array = [];
$n = 0;

$result = $connection->query($query);
while ($row = $result->fetch_assoc()) {
    $array[$n] = $row;
    $n = $n + 1;
}

echo json_encode($array);

?>
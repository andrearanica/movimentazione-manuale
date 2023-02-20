<?php

$ip = '127.0.0.1';
$user = 'root';
$password = '';
$db = 'my_andrearanica';

$connection = new mysqli($ip, $user, $password, $db);

if (!isset($_GET['businessName'])) {
    $query = 'SELECT * FROM evaluations';
} else {
    $businessName = $_GET['businessName'];
    $query = "SELECT * FROM evaluations WHERE businessName='$businessName';";
}

$result = $connection->query($query);

$json = [];
$n = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $json[$n] = $row;
        $n += 1;
    }
}

echo json_encode($json);

?>
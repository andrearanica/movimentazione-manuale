<?php

$id = $_REQUEST['id'];

$ip = '127.0.0.1';
$user = 'root';
$password = '';
$db = 'my_andrearanica';

$connection = new mysqli($ip, $user, $password, $db);

$query = "SELECT * FROM evaluations WHERE id=$id;";

$result = $connection->query($query);

while ($row = $result->fetch_assoc()) {
    echo json_encode($row);
}

?>
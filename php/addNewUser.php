<?php

$name = $_GET['name'];
$surname = $_GET['surname'];
$username = $_GET['username'];
$password = $_GET['password'];
$role = $_GET['password'];

$ip = '127.0.0.1';
$user = 'root';
$pwd = '';
$db = 'my_andrearanica';

$connection = new mysqli($ip, $user, $pwd, $db);

$query = "INSERT INTO users (name_surname, username, password, role) VALUES ('$name $surname', '$username', '$password', '$role');";

$connection->query($query);

header('Location: ../admin.php?error=none');

?>
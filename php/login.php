<?php

session_start();

ini_set('display_errors', 1);

$ip = '127.0.0.1';
$user = 'root';
$password = '';
$db = 'my_andrearanica';

$connection = new mysqli($ip, $user, $password, $db);

if (isset($_POST['username']) && isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);
} else {
    header('Location: ../index.php?error');
}


$query = 'SELECT * FROM users WHERE username="' . $username . '" AND password="' . $password .'";';
$result = $connection->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['id'] = $row['id'];
    $_SESSION['name_surname'] = $row['name_surname'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['role'] = $row['role'];
    header('Location: ../admin.php');
} else {
    header('Location: ../index.php?error');
}

?>
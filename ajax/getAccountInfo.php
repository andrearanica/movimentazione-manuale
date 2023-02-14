<?php

if (!isset($_GET['username'])) {
    die;
}

class Info {
    public $username;
    public $name_surname;
    public $role;
}

$ip = 'localhost';
$user = 'root';
$password = '';
$db = 'my_andrearanica';

$connection = new mysqli($ip, $user, $password, $db);

$query = 'SELECT * FROM users WHERE username="' . $_GET['username'] . '"';

$result = $connection->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $info = new Info();
    $info->name_surname = $row['name_surname'];
    $info->username = $row['username'];
    $info->role = $row['role'];
}

echo json_encode($info);

?>
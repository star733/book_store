<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'bookstore_db';

$conn = mysqli_connect($host, $user, $pass, $db_name);

if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}
?>
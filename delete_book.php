<?php
include 'db.php';

$id = $_GET['id'];
$query = "DELETE FROM books WHERE id = $id";
mysqli_query($conn, $query);

header('Location: dashboard.php');
?>
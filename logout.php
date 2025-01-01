<?php
session_start(); // Start the session to destroy it
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Redirect to login page after logging out
header('Location: login.php');
exit;
?>
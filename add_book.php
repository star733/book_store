<?php
session_start(); // Start the session to check login status

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to login page
    header('Location: login.php');
    exit;
}

// Include DB connection
include 'db.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    // Insert the book into the database
    $query = "INSERT INTO books (title, author, price) VALUES ('$title', '$author', '$price')";
    if (mysqli_query($conn, $query)) {
        header('Location: dashboard.php'); // Redirect to dashboard after adding the book
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

include 'header.php'; // Include header
?>

<h2>Add New Book</h2>
<form method="POST" action="">
    <label for="title">Book Title:</label>
    <input type="text" name="title" id="title" required>
    <br>
    <label for="author">Author:</label>
    <input type="text" name="author" id="author" required>
    <br>
    <label for="price">Price:</label>
    <input type="number" name="price" id="price" step="0.01" required>
    <br>
    <button type="submit">Add Book</button>
</form>

<?php
include 'footer.php'; // Include footer
?>
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

// Fetch data for the dashboard (e.g., books)
$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query);

include 'header.php'; // Include header
?>

<h2>Dashboard</h2>
<a href="add_book.php" class="add-button">Add Book</a> <!-- Add Book Button -->

<!-- Example of displaying books in the dashboard -->
<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['title']; ?></td>
                <td><?= $row['author']; ?></td>
                <td><?= $row['price']; ?></td>
                <td>
                    <a href="edit_book.php?id=<?= $row['id']; ?>">Edit</a> |
                    <a href="delete_book.php?id=<?= $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php
include 'footer.php'; // Include footer
?>
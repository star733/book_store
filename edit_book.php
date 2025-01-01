<?php
include 'db.php';
include 'header.php';

$id = $_GET['id'];
$query = "SELECT * FROM books WHERE id = $id";
$result = mysqli_query($conn, $query);
$book = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];

    $query = "UPDATE books SET title = '$title', author = '$author', price = '$price' WHERE id = $id";
    mysqli_query($conn, $query);

    header('Location: dashboard.php');
}
?>
    <h2>Edit Book</h2>
    <form method="POST">
        <input type="text" name="title" value="<?= $book['title']; ?>" required>
        <input type="text" name="author" value="<?= $book['author']; ?>" required>
        <input type="number" name="price" value="<?= $book['price']; ?>" required>
        <button type="submit">Update Book</button>
    </form>
<?php include 'footer.php'; ?>
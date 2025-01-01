<?php
include 'db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password']; // Plain-text password

    // Hash the password before inserting into the database
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert the user into the database
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    
    if (mysqli_query($conn, $query)) {
        echo "User registered successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

include 'header.php'; // Include header
?>

<h2>Register</h2>
<form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <button type="submit">Register</button>
</form>

<?php
include 'footer.php'; // Include footer
?>
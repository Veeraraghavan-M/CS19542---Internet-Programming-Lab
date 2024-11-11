<?php
// Database connection setup
$host = 'localhost';
$user = 'root';
$password = 'password123'; // No password by default for XAMPP MySQL
$dbname = 'college_db';

// Connect to the database
$conn = new mysqli($host, $user, $password, $dbname);

// Check for connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the form data
$username = $_POST['username'];
$password = $_POST['password'];

// Validate user credentials
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login successful, redirect to home/dashboard page
    header("Location: Home.html"); // Or home.html if your home page is named that
    exit();
} else {
    // Login failed, display an error message
    echo "Invalid username or password.";
}

// Close the database connection
$conn->close();
?>

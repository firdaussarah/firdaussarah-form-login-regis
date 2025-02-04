<?php
session_start();

// Establish connection to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginajjh";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// SQL query to insert new user
$sql = "INSERT INTO register (name, email, password, confirm_password) VALUES ('$name', '$email', '$password', '$confirm_password')";

if ($conn->query($sql) === TRUE) {
    // Registration successful, set session variable and redirect to dashboard or profile page
    $_SESSION['email'] = $email;
    header("Location: berhasil.html");
} else {
    // Registration failed, redirect back to register page with error message
    $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
    header("Location: register.html");
}

$conn->close();
?>

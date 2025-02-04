<?php
session_start();

// Establish connection to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginajjh";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];

// Validasi input (pastikan email dan password tidak kosong)
if (empty($email) || empty($password)) {
    $_SESSION['error'] = "Email dan password tidak boleh kosong!";
    header("Location: login.php");
    exit();
}

// SQL query to check if the user exists
$stmt = $conn->prepare("SELECT * FROM register WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

// Check if a user is found
if ($result->num_rows > 0) {
    // Login successful
    $_SESSION['email'] = $email; // Set session for logged-in user
    header("Location: berhasil.html");
    exit();
} else {
    // Login failed
    $_SESSION['error'] = "Email atau password salah!";
    header("Location: login.php");
    exit();
}

$stmt->close();
$conn->close();

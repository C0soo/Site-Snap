<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO utenti (nome, cognome, email, telefono, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nome, $cognome, $email, $telefono, $hashed_password);

// Set parameters and execute
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$hashed_password = $_POST['password'];

if ($stmt->execute()) {
    header("Location: login.html");
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

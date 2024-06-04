<?php
session_start(); // Start session if not already started

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marvel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $cart = $_POST['cart'];
  $total = 0;

  // Calcolo del totale
  foreach ($cart as $item) {
    $total += $item['price'];
  }
  
  // Check if user is logged in (session exists)
  if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Prepared statement to prevent SQL injection
    $sql = "INSERT INTO ordini (order_details, total, id_utente) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', json_encode($cart), $total, $user_id);

    if ($stmt->execute()) {
      echo json_encode(array("status" => "success", "message" => "Order placed successfully"));
    } else {
      echo json_encode(array("status" => "error", "message" => "Error: " . $stmt->error));
    }

    $stmt->close();
  } else {
    // Handle user not logged in scenario (e.g., error message)
    echo json_encode(array("status" => "error", "message" => "Please login to place an order"));
  }
}

$conn->close();
?>

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cart = $_POST['cart'];
    $total = 0;

    // Loop through the cart items to calculate the total amount
    foreach ($cart as $item) {
        $total += $item['price'];
    }

    // Insert the order details into the database

    $sql = "INSERT INTO orders (order_details, total) VALUES ('" . json_encode($cart) . "', '$total')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("status" => "success", "message" => "Order placed successfully"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Error: " . $sql . "<br>" . $conn->error));
    }
}

$conn->close();
?>

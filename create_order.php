<?php
// Connessione al database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "nome_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica connessione
if ($conn->connect_error) {
  die("Connessione fallita: " . $conn->connect_error);
}

// Recupera i dati dall'ordine
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$user_id = 1; // Questo dovrebbe essere l'ID dell'utente loggato, da ottenere tramite il sistema di autenticazione

// Query per inserire l'ordine nel database
$sql = "INSERT INTO ordini (product_id, quantity, user_id) VALUES ('$product_id', '$quantity', '$user_id')";

if ($conn->query($sql) === TRUE) {
  echo "Ordine creato con successo";
} else {
  echo "Errore durante la creazione dell'ordine: " . $conn->error;
}

$conn->close();
?>

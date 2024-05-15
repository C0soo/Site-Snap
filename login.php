<?php
session_start();

// Parametri di connessione al database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

// Crea la connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati dal modulo
    $nome = $_POST['nome'];
    $password = $_POST['password'];

    // Prepara e esegui la query SQL
    $sql = "SELECT * FROM utenti WHERE nome = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nome, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Controlla se c'è una corrispondenza nel database
    if ($result->num_rows > 0) {
        // Login riuscito
        $_SESSION['nome'] = $nome;
        header("Location: benvenuto.html");
    } else {
        // Login fallito
        header("Location: login.html");
    }

    $stmt->close();
}

$conn->close();
?>
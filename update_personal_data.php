<?php
session_start();

// Parametri di connessione al database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

// Crea la connessione
$conn = new MySQLi($servername, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati dal modulo
    $nome = $_SESSION['nome']; // Otteniamo il nome memorizzato nella sessione
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepara e esegui la query SQL per aggiornare i dati dell'utente
    $sql = "UPDATE utenti SET email = ?, password = ? WHERE nome = ?"; // Aggiungiamo una condizione WHERE per verificare il nome
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $password, $nome);
    $stmt->execute();

    // Controlla se l'aggiornamento è avvenuto con successo
    if ($stmt->affected_rows > 0) {
        // Dati aggiornati con successo
        $_SESSION['success_message'] = "Dati aggiornati con successo!";
        header("Location: benvenuto.html");
    } else {
        // Errore nell'aggiornamento dei dati
        $_SESSION['error_message'] = "Si è verificato un errore durante l'aggiornamento dei dati.";
        header("Location: benvenuto.html");
    }

    $stmt->close();
}

$conn->close();
?>

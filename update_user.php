<?php
session_start();
if (!isset($_SESSION['nome'])) {
    header("Location: login.html");
    exit();
}

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

$nome = $_SESSION['nome'];
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Ottieni i dati dal modulo
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Prepara e esegui la query di aggiornamento
    $sql = "UPDATE utenti SET nome=?, cognome=?, password=?, email=?, telefono=? WHERE nome=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nome, $cognome, $password, $email, $telefono, $_SESSION['nome']);
    
    if ($stmt->execute()) {
        $msg = "Dati aggiornati con successo!";
        $_SESSION['nome'] = $nome; // Aggiorna la sessione con il nuovo nome
    } else {
        $msg = "Errore durante l'aggiornamento: " . $stmt->error;
    }
    
    $stmt->close();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    // Esegui il logout
    session_unset();
    session_destroy();
    header("Location: login.html");
    exit();
}

// Prepara e esegui la query di selezione
$sql = "SELECT * FROM utenti WHERE nome = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nome);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

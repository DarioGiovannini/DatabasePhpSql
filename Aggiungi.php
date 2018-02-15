<?php
$server = "localhost";
$utente = "root";
$password = "";
$database = "databasephpsql";
$id=

$conn = new mysqli($server, $utente, $password, $database);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}


$sql = "INSERT INTO tabella(Nome, Cognome, email)
VALUES ('John', 'Doe', 'john@esempio.com')";
$conn->query($sql);
$sql = "SELECT * FROM tabella";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo " " . $row["Id"]. "  " . $row["Nome"]. " " . $row["Cognome"]. " " . $row["email"] . "<br>";
    }
} else {
    echo "Nessun Risultato";
}
$conn->close();
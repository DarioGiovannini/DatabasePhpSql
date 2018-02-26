<?php
$server = "localhost";
$utente = "utente";
$password = "";
$database = "databasephpsql";
$conn = new mysqli($server, $utente, $password, $database); //Dopo aver dichiarato i vari parametri apro la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error); //Se c'è stato un errore lo enuncia
}
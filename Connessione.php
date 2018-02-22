<?php
$server = "localhost";
$utente = "root";
$password = "";
$database = "databasephpsql";
$conn = new mysqli($server, $utente, $password, $database);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
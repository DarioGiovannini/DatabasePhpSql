<?php
$server = "localhost";
$utente = "root";
$password = "";
$database = "databasephpsql";
$id= $_GET['Righe'];
$conn = new mysqli($server, $utente, $password, $database);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$sql = "DELETE FROM tabella WHERE Id=$id";
$conn->query($sql);
header("location:http://localhost:63342/DatabasePhpSql/CRUD.php");
?>

<?php
$server = "localhost";
$utente = "root";
$password = "";
$database = "databasephpsql";
$Id= $_GET['Righe'];
$conn = new mysqli($server, $utente, $password, $database);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$sql = "DELETE FROM tabella WHERE Id=$Id";
$conn->query($sql);
$conn->close();
header("location:http://localhost:63342/DatabasePhpSql/CRUD.php");
?>

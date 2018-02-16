<?php
    $server = "localhost";
    $utente = "root";
    $password = "";
    $database = "databasephpsql";
    $nome = $_GET['nome'];
    $cognome = $_GET['cognome'];
    $email = $_GET['mail'];
    $Id=$_GET['Identificativo'];
    $conn = new mysqli($server, $utente, $password, $database);
    if ($conn->connect_error) {
        die("Connessione Fallita: " . $conn->connect_error);
    }
    $sql = "UPDATE tabella SET Nome='$nome',Cognome='$cognome',email='$email' WHERE Id='$Id'";
    $conn->query($sql);
    $conn->close();
    header("location:http://localhost:63342/DatabasePhpSql/CRUD.php");

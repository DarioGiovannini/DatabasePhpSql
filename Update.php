<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>

<form action="" method="get">
    Nome<input type="text" name="nome">
    Cognome<input type="text" name="cognome">
    Mail<input type="text" name="mail">
    <input type="submit" class="btn btn-success">
</form>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>


<?php
if(isset($_GET['nome']) && isset($_GET['cognome']) && isset($_GET['mail'])){
    $server = "localhost";
    $utente = "root";
    $password = "";
    $database = "databasephpsql";
    $nome = $_GET['nome'];
    $cognome = $_GET['cognome'];
    $email = $_GET['mail'];

    $conn = new mysqli($server, $utente, $password, $database);
    if ($conn->connect_error) {
        die("Connessione Fallita: " . $conn->connect_error);
    }

    $sql = "UPDATE tabella SET Nome=$nome Cognome=$cognome email=$email WHERE Id=1";

    $conn->query($sql);
    $sql = "SELECT * FROM tabella";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["nome"]. " " . $row["cognome"]. "<br>";
        }
    } else {
        echo "Nessun resultato";
    }

    $conn->close();
}


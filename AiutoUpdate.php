<?php
    include 'Connessione.php';
    $nome = htmlentities($_GET['nome']);
    $cognome = htmlentities($_GET['cognome']);
    $email = htmlentities($_GET['mail']);
    $id=htmlentities($_GET['Identificativo']);
    $sql = "UPDATE tabella SET Nome='$nome',Cognome='$cognome',email='$email' WHERE Id='$id'";
    $conn->query($sql);
    $conn->close();
    header("location:http://localhost:63342/DatabasePhpSql/CRUD.php");

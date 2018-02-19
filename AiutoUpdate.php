<?php
    include 'Connessione.php';
    $nome = $conn->real_escape_string(htmlentities($_GET['nome']));
    $cognome = $conn->real_escape_string(htmlentities($_GET['cognome']));
    $email = $conn->real_escape_string(htmlentities($_GET['mail']));
    $id=$conn->real_escape_string(htmlentities($_GET['Identificativo']));
    include_once 'Script/classverifyEmail.php';
    $vmail = new verifyEmail();
    $sql = "UPDATE tabella SET Nome='$nome',Cognome='$cognome',email='$email' WHERE Id='$id'";
    $conn->query($sql);
    $conn->close();
    header("location:http://localhost:63342/DatabasePhpSql/Crud.php");





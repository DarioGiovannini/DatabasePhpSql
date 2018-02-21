<?php
    include 'Connessione.php';
    $nome = $conn->real_escape_string(htmlentities($_GET['nome']));
    $cognome = $conn->real_escape_string(htmlentities($_GET['cognome']));
    $email = $conn->real_escape_string(htmlentities($_GET['mail']));
    $id=$conn->real_escape_string(htmlentities($_GET['Identificativo']));
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("location:http://localhost/DatabasePhpSql/Update.php?Id=4&Nome=$nome&Cognome=$cognome&email=email non valida&Update=Update");
    }
    else{
        $sql = "UPDATE tabella SET Nome='$nome',Cognome='$cognome',email='$email' WHERE Id='$id'";
        $conn->query($sql);
        $conn->close();
    }
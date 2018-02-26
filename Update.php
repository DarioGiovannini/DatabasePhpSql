<?php
    include 'Connessione.php';
    $nome = $conn->real_escape_string(htmlentities($_GET['nome']));
    $cognome = $conn->real_escape_string(htmlentities($_GET['cognome']));
    $email = $conn->real_escape_string(htmlentities($_GET['email']));
    $id=$conn->real_escape_string(htmlentities($_GET['Identificativo']));
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "UPDATE tabella SET Nome='$nome',Cognome='$cognome',email='$email' WHERE Id='$id'";
        $conn->query($sql);
        $conn->close();
    }
    else echo "";
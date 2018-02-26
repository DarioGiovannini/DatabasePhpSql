<?php
    include 'Connessione.php';
    $nome = $conn->real_escape_string(htmlentities($_GET['nome']));
    $cognome = $conn->real_escape_string(htmlentities($_GET['cognome']));
    $email = $conn->real_escape_string(htmlentities($_GET['email']));
    $sql = "SELECT * FROM tabella";
    $risultato = $conn->query($sql);
    $f=0;
    while ($riga = $risultato->fetch_assoc()) {
        if ($riga["Nome"] == $nome && $riga["Cognome"] == $cognome) {
            $f = 1;
            break;
        }
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $f=2;
    if ($f==0) {
        $sql = "INSERT INTO tabella(Nome, Cognome, email) VALUES ('$nome', '$cognome', '$email')";
        $conn->query($sql);
        $conn->close();
        echo "";
    }
    else if($f==1)echo "Nome e Cognome già registrati";
    else echo "Email non valida";





<?php
    include 'Connessione.php';                                              //Mi connetto al server
    $nome = $conn->real_escape_string(htmlentities($_GET['nome']));         //Dichiaro le variabili nome,cognome e email usando le dovute precauzioni
    $cognome = $conn->real_escape_string(htmlentities($_GET['cognome']));
    $email = $conn->real_escape_string(htmlentities($_GET['email']));
    $sql = "SELECT * FROM tabella";                                         //Dichiaro la query di select
    $risultato = $conn->query($sql);                                        //Eseguo la query
    $f=0;
    while ($riga = $risultato->fetch_assoc()) {                             //Ciclo che prende le righe della tabella
        if ($riga["Nome"] == $nome && $riga["Cognome"] == $cognome) {       //Controllo se nome e cognome sono già stati inseriti
            $f = 1;                                                         //Se è così pongo f a 1
            break;
        }
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $f=2;                //Se l'email è valida pongo f a 2
    if ($f==0) {                                                             //Se non ci sono stati errori
        $sql = "INSERT INTO tabella(Nome, Cognome, email) VALUES ('$nome', '$cognome', '$email')";  //Dichiaro la query
        $conn->query($sql);                                                  //Svolgo la query
        $conn->close();                                                      //Chiudo la connessione
        echo "";
    }
    else if($f==1)echo "Nome e Cognome già registrati";                     //Enuncio gli errori
    else echo "Email non valida";





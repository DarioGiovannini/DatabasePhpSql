<?php
    include 'Connessione.php';                                                                      //Mi connetto al server
    $nome = $conn->real_escape_string(htmlentities($_GET['nome']));                                 //Dichiaro le variabili nome,cognome,email e id usando le dovute precauzioni
    $cognome = $conn->real_escape_string(htmlentities($_GET['cognome']));
    $email = $conn->real_escape_string(htmlentities($_GET['email']));
    $id=$conn->real_escape_string(htmlentities($_GET['Identificativo']));
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {                                            //Se l'email è valida
        $sql = "UPDATE tabella SET Nome='$nome',Cognome='$cognome',email='$email' WHERE Id='$id'";  //Dichiaro la query di Update
        $conn->query($sql);                                                                         //Eseguo la query
        $conn->close();                                                                             //Chiudo la connesione
        echo "";
    }
    else  echo "Email non valida";                                                                  //Enuncio l'errore
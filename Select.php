<?php
include 'Connessione.php';          //Richiamo il file che possiede il codice per connettersi al server
$sql = "SELECT * FROM tabella";     //Dichiaro la query
$risultato = $conn->query($sql);    //Svolgo la query
$stringa="<thead>                   
       <th> Id      </th>    
       <th> Nome    </th>
       <th> Cognome </th>
       <th> Email   </th>
       <th> Update  </th>
       <th> Delete  </th> 
       </thead> ";                  //Inizializzo la tabella
if ($risultato->num_rows > 0) {     //Controllo che la SELECT abbia travato delle righe
    while($riga = $risultato->fetch_assoc()) {      //Prendo la riga attraverso il metodo fetch_assoc()
        $id=$conn->real_escape_string(htmlentities($riga["Id"]));           //Prendo il campo id svolgendo i dovuti controlli
        $email=$conn->real_escape_string(htmlentities($riga["email"]));     //Prendo il campo email svolgendo i dovuti controlli
        $nome=$conn->real_escape_string(htmlentities($riga["Nome"]));       //Prendo il campo Nome svolgendo i dovuti controlli
        $cognome=$conn->real_escape_string(htmlentities($riga["Cognome"])); //Prendo il campo Cognome svolgendo i dovuti controlli
        $stringa = $stringa  . "<tr name='tab' id='$id'>"."<td name='id' onclick='ordina($(\"tr[name=\\\"tab\\\"]\"),$(\"td[name=\\\"id\\\"]\"))'>" . //genero i campi td e attraverso i selettori jquery
        $riga["Id"]     . "</td><td name='nome' onclick='ordina($(\"tr[name=\\\"tab\\\"]\"),$(\"td[name=\\\"nome\\\"]\"))'>" .                        // ottengo i parametri da passare alla funzione ordina
        $riga["Nome"]   . "</td><td name='cognome' onclick='ordina($(\"tr[name=\\\"tab\\\"]\"),$(\"td[name=\\\"cognome\\\"]\"))' >" .
        $riga["Cognome"]. "</td><td name='Email'onclick='ordina($(\"tr[name=\\\"tab\\\"]\"),$(\"td[name=\\\"Email\\\"]\"))'>" .
        $riga["email"]  . "</td><td>" .
        "<p>".
        "<input type='hidden' value='$nome' name='Nome'>" .             //Creo dei campi nascosti che contengono i valori necessari per richiamare le funzioni
        "<input type='hidden' value='$cognome' name='Cognome'>" .
        "<input type='hidden' value='$email' name='email'>" .
        "<input type='hidden' value='$id' name='Id'>" .
        "<button class=\"btn btn-warning btn-block glyphicon glyphicon-pencil\" data-toggle=\"modal\" data-target=\"#FormModale\" onclick=\"formModale(this.parentNode,'Update',$id);\"> Update</button>
        </p>
        </td><td>" .
        "<input type='hidden' value='$id' name='Righe'>" . //Creo un campo nascosto che contiene l'id
        "<button class=\"btn btn-danger btn-block glyphicon glyphicon-minus\" onclick='cancella($id)'> Delete </button>" ."</td>" ."</tr>";//Creo il bottone Delete
    }
} else {
    echo "Nessun Risultato"; //se non ha trovato alcuna riga
}
$conn->close(); //chiude la connessione
echo $stringa;  //stampa la tabella
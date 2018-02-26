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
        $stringa = $stringa  . "<tr name='tab'>"."<td name='id' onclick='Ordina($(\"tr[name=\\\"tab\\\"]\"),$(\"td[name=\\\"id\\\"]\"))'>" .
        $riga["Id"]     . "</td><td name='nome' onclick='Ordina($(\"tr[name=\\\"tab\\\"]\"),$(\"td[name=\\\"nome\\\"]\"))'>" .
        $riga["Nome"]   . "</td><td name='cognome' onclick='Ordina($(\"tr[name=\\\"tab\\\"]\"),$(\"td[name=\\\"cognome\\\"]\"))' >" .
        $riga["Cognome"]. "</td><td name='Email'onclick='Ordina($(\"tr[name=\\\"tab\\\"]\"),$(\"td[name=\\\"Email\\\"]\"))'>" .
        $riga["email"]  . "</td><td>" .
        "<label for='Update'></label>        
        <p>
        <input type='hidden' value='$nome' name='Nome'>
        <input type='hidden' value='$cognome' name='Cognome'>
        <input type='hidden' value='$email' name='email'>
        <input type='hidden' value='$id' name='Id'>
        <button class=\"btn btn-warning btn-block glyphicon glyphicon-pencil\" name='Update' id='Update' onclick='Form(this.parentNode,\"Update\",$id)'> Update</button>
        </p>
        </td><td>
        <label for='submit'></label>
        <input type='hidden' value='$id' name='Righe'>
        <button class=\"btn btn-danger btn-block glyphicon glyphicon-minus\" name='submit' id='submit' onclick='Delete($id)'> Delete</button> </form>" ."</td>" ."</tr>";
    }   //Continuo a generare la tabella inserendo i dovuti eventi con i vari value e name
} else {
    echo "Nessun Risultato"; //se non ha trovato alcuna riga
}
$conn->close(); //chiude la connessione
echo $stringa;  //stampa la tabella
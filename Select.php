<?php
include 'Connessione.php';
$sql = "SELECT * FROM tabella";
$result = $conn->query($sql);
$text="<thead>     
       <th> Id      </th>    
       <th> Nome    </th>
       <th> Cognome </th>
       <th> Email   </th>
       <th> Update  </th>
       <th> Delete  </th> 
       </thead> ";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id=$conn->real_escape_string(htmlentities($row["Id"]));
        $email=$conn->real_escape_string(htmlentities($row["email"]));
        $nome=$conn->real_escape_string(htmlentities($row["Nome"]));
        $cognome=$conn->real_escape_string(htmlentities($row["Cognome"]));
        $text = $text  . "<tr>"."<td name='id' onclick='Ordina($(\"tr\"),$(\"td[name=\\\"id\\\"]\"))'>" .
        $row["Id"]     . "</td><td name='nome' onclick='Ordina($(\"tr\"),$(\"td[name=\\\"nome\\\"]\"))'>" .
        $row["Nome"]   . "</td><td name='cognome' onclick='Ordina($(\"tr\"),$(\"td[name=\\\"cognome\\\"]\"))' >" .
        $row["Cognome"]. "</td><td name='Email'onclick='Ordina($(\"tr\"),$(\"td[name=\\\"Email\\\"]\"))'>" .
        $row["email"]  . "</td><td>" .
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
    }
} else {
    echo "Nessun Risultato";
}
$conn->close();
echo $text;
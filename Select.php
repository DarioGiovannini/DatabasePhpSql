<?php
include 'Connessione.php';
$sql = "SELECT * FROM tabella";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id=$conn->real_escape_string(htmlentities($row["Id"]));
        $email=$conn->real_escape_string(htmlentities($row["email"]));
        $nome=$conn->real_escape_string(htmlentities($row["Nome"]));
        $cognome=$conn->real_escape_string(htmlentities($row["Cognome"]));
        echo "<tr>";
        echo "<td name='id' onclick='Ordina(document.getElementsByTagName(\"tr\"),document.getElementsByName(\"id\"))'>" . $row["Id"]. "</td><td name='nome' onclick='Ordina(document.getElementsByTagName(\"tr\"),document.getElementsByName(\"nome\"))'>" . $row["Nome"]. "</td><td name='cognome' onclick='Ordina(document.getElementsByTagName(\"tr\"),document.getElementsByName(\"cognome\"))' >" . $row["Cognome"]. "</td><td name='Email'onclick='Ordina(document.getElementsByTagName(\"tr\"),document.getElementsByName(\"Email\"))'>" . $row["email"] . "</td><td>" ."
        <label for='Update'></label>
        <input type='hidden' value='$id' name='Id'>
        <input type='hidden' value='$nome' name='Nome'>
        <input type='hidden' value='$cognome' name='Cognome'>
        <input type='hidden' value='$email' name='email'>
        <input type=\"submit\" value=\"Update\" class=\"btn btn-warning\" name='Update' id='Update' onclick='Update()'>
        </td><td>
        

        
        
        <label for='submit'></label>
        <input type='hidden' value='$id' name='Righe'>
        <input type=\"submit\" onclick='Delete(\"$id\")'value=\"Delete\" class=\"btn btn-danger\" name='submit' id='submit' >" ."</td>" .
            "</form>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nessun Risultato";
}
$conn->close();
?>
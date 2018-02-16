<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
<h1> Tabella </h1>
<form action="Aggiungi.php" method="get">
    <input type="submit" value="aggiungi" class="btn btn-success">
</form>

<?php
$server = "localhost";
$utente = "root";
$password = "";
$database = "databasephpsql";
$conn = new mysqli($server, $utente, $password, $database);
if ($conn->connect_error) {
    die("Connessione Fallita: " . $conn->connect_error);
}
$sql = "SELECT * FROM tabella";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table class='table table-hoover'>";
    echo "<thead> <tr>
            <th> Id    </th>
            <th> Nome </th>
            <th> Cognome   </th>
            <th> Email  </th>
            <th> Update  </th>
            <th> Delete  </th>
    </tr>";
    while($row = $result->fetch_assoc()) {
        $Id=$row["Id"];
        $Email=$row["email"];
        $nome=$row["Nome"];
        $cognome=$row["Cognome"];
        echo "<tr>";
        echo "<td>" . $row["Id"]. "</td><td>" . $row["Nome"]. "</td><td>" . $row["Cognome"]. "</td><td>" . $row["email"] . "</td><td>" ."<form action=\"Update.php\" method=\"get\">
        <label for='Update'></label>
        <input type='hidden' value='$Id' name='Id'>
        <input type='hidden' value='$nome' name='Nome'>
        <input type='hidden' value='$cognome' name='Cognome'>
        <input type='hidden' value='$Email' name='email'>
        <input type=\"submit\" value=\"Update\" class=\"btn btn-warning\" name='Update' id='Update' >
        </form>" ."</td><td>
        <form action='Delete.php' method='get'>
        <label for='submit'></label>
        <input type='hidden' value='$Id' name='Righe'>
        <input type=\"submit\" value=\"Delete\" class=\"btn btn-danger\" name='submit' id='submit' > </form>" ."</td>" .
        "</form>";
       echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nessun Risultato";
}
$conn->close();
?>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/Colori.css">
    <link rel="script" type="text/javascript" href="Script/Cerca.js">
    <script language="JavaScript" type="text/JavaScript" src="Script/Cerca.js"></script>
</head>
<body>
<div class="gianni">
    <h1 align="center"> Database </h1>
</div>
<form action="Aggiungi.php" method="get">
    <p align="right">
        <input type="submit" value="aggiungi" class="btn btn-success" >
    </p>
</form>
<?php
include 'Connessione.php';
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
        $id=$conn->real_escape_string(htmlentities($row["Id"]));
        $email=$conn->real_escape_string(htmlentities($row["email"]));
        $nome=$conn->real_escape_string(htmlentities($row["Nome"]));
        $cognome=$conn->real_escape_string(htmlentities($row["Cognome"]));
        echo "<tr>";
        echo "<td name='elementi'>" . $row["Id"]. "</td><td name='elementi'>" . $row["Nome"]. "</td><td name='elementi'>" . $row["Cognome"]. "</td><td name='elementi'>" . $row["email"] . "</td><td>" ."<form action=\"Update.php\" method=\"get\">
        <label for='Update'></label>
        <input type='hidden' value='$id' name='Id'>
        <input type='hidden' value='$nome' name='Nome'>
        <input type='hidden' value='$cognome' name='Cognome'>
        <input type='hidden' value='$email' name='email'>
        <input type=\"submit\" value=\"Update\" class=\"btn btn-warning\" name='Update' id='Update' >
        </form>" ."</td><td>
        <form action='Delete.php' method='get'>
        <label for='submit'></label>
        <input type='hidden' value='$id' name='Righe'>
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
<form>
    <input type="text" id="ricerca">
    <input type="button" value="Cerca" class="btn btn-success" onclick="Ricerca(document.getElementById('ricerca').value,document.getElementsByName('elementi'));">
</form>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
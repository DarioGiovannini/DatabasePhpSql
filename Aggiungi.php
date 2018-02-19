<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>

<form action="" method="get">
    Nome<input type="text" name="nome" required>
    Cognome<input type="text" name="cognome" required>
    Mail<input type="email" name="mail">
    <input type="submit" class="btn btn-success">
</form>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
<?php
if(isset($_GET['nome']) && isset($_GET['cognome']) && isset($_GET["mail"])) {
    include 'Connessione.php';
    $nome = $conn->real_escape_string(htmlentities($_GET['nome']));
    $cognome = $conn->real_escape_string(htmlentities($_GET['cognome']));
    $email = $conn->real_escape_string(htmlentities($_GET['mail']));
    $sql = "SELECT * FROM tabella";
    $result = $conn->query($sql);
    $f=false;
    while ($row = $result->fetch_assoc()) {
        if ($row["Nome"] == $nome && $row["Cognome"] == $cognome) {
            $f = true;
            break;
        }
    }
    if (!$f) {
        $sql = "INSERT INTO tabella(Nome, Cognome, email) VALUES ('$nome', '$cognome', '$email')";
        $conn->query($sql);
        $conn->close();
        header("location:http://localhost:63342/DatabasePhpSql/Crud.php");
    }
}




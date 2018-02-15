<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
<h1>Viva il Crud </h1>
<form action="Add.php" method="get">
<input type="submit" value="Add new record" class="btn btn-success" ></input>
</form>




<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
<?php
$server = "localhost";
$utente = "root";
$password = "";
$database = "databasephpsql";

// Create connection
$conn = new mysqli($server, $utente, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["nome"]. " " . $row["cognome"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

<?php
include 'Connessione.php';
$id= $conn->real_escape_string(htmlentities($_GET['Righe']));
$sql = "DELETE FROM tabella WHERE Id=$id";
$conn->query($sql);
$conn->close();



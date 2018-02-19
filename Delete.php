<?php
include 'Connessione.php';
$id= htmlentities($_GET['Righe']);
$sql = "DELETE FROM tabella WHERE Id=$id";
$conn->query($sql);
$conn->close();
header("location:http://localhost:63342/DatabasePhpSql/CRUD.php");
?>

<?php
include 'Connessione.php';                                              //Mi connetto al server chiamando un file esterno
$id= $conn->real_escape_string(htmlentities($_GET['Identificativo']));  //Prendo l'id che mi è stato passato
$sql = "DELETE FROM tabella WHERE Id=$id";                              //Dichiaro la query
$conn->query($sql);                                                     //Svolgo la query
$conn->close();;                                                        //Chiudo la connessione
?>

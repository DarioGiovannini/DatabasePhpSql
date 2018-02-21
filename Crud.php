<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/Colori.css">
    <link rel="script" type="text/javascript" href="Script/Cerca.js">
    <script language="JavaScript" type="text/JavaScript" src="Script/JavaScript.js"></script>
</head>
<body onload="Select(document.getElementById('Tabella'));">
<div class="gianni">
    <h1 align="center"> Database </h1>
</div>
<form action="Aggiungi.php" method="get">
    <p align="right">
        <input type="submit" value="aggiungi" class="btn btn-success" >
    </p>
</form>
<table class='table table-hoover' id="Tabella">
</table>
<form>
    <h4>Ricerca</h4> <input type="text" id="ricerca" onkeyup="Ricerca(document.getElementById('ricerca').value,document.getElementsByTagName('td'));">
</form>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
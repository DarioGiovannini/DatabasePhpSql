<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/Colori.css">
    <link rel="script" type="text/javascript" href="Script/Cerca.js">
    <script language="JavaScript" type="text/JavaScript" src="Script/JavaScript.js"></script>
</head>
<body onload="Select($('#Tabella')[0]);">
<div class="gianni">
    <h1 align="center"> Database </h1>
</div>
<p align="right" id="p")>
    <button class="btn btn-success glyphicon glyphicon-plus" onclick="Form($('#p')[0],'Aggiungi',0);">Aggiungi</button>
</p>
<table class='table table-hoover' id="Tabella">
</table>
<form>
    <h4>Ricerca</h4> <input type="text" id="ricerca" onkeyup="Ricerca($('#ricerca')[0].value,$('td'));">
</form>
<p id="prova" class="hidden"></p>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
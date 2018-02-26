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
<body onload="Select($('#Tabella')[0]);"  class="sfondo">
<div class="container">
    <table border="2">
        <tr class="giallo">
            <td><h1 align="center"> Database </h1></td>
        </tr>
        <tr class="bianco">
            <td>
                <div class="container">
                    <div class="row">
                        <div id="panel" class="nascosto">
                            Nome<input type="text" name="nome" required>
                            Cognome<input type="text" name="cognome" required>
                            Email<input type="email" name="email">
                            <input  type='hidden' name='Identificativo'>
                            <button id="Invia" class="btn btn-success glyphicon glyphicon-envelope"> Invia</button>
                            <button id='Annulla' class='btn btn-danger glyphicon glyphicon-remove' onclick='Annulla(this.parentNode)'> Annulla</button>
                        </div>
                        <div align="right" id="p" class="nascosto">
                            <button id="Aggiungi" class="btn btn-success glyphicon glyphicon-plus" onclick="Form(this.parentNode,'Aggiungi',0);">Aggiungi</button>
                        </div>
                    </div>
                    <table class='table table-hoover' id="Tabella">
                    </table>
                    <div class="col-xs-2">
                        <h4>Ricerca</h4>
                        <div class="form-group has-feedback">
                            <input class="form-control" type="text" id="ricerca" onkeyup="Ricerca($('#ricerca')[0].value,$('td'));">
                            <i class="glyphicon glyphicon-search form-control-feedback"></i>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
<p id="prova" class="hidden"></p>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
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
<div id="FormModale" class="modal Fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" align="center">Completa i campi</h4>
            </div>
            <div class="modal-body" id="panel">
                Nome<input class="form-control" type="text" name="nome">
                Cognome<input class="form-control" type="text" name="cognome">
                Email<input class="form-control" type="email" name="email">
                <input  type='hidden' name='Identificativo'> <!-- campo nascosto che conterrà l'id -->
                <br>
                <button type="button" id="Invia" class="btn btn-success glyphicon glyphicon-envelope btn-block"> Invia</button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <table border="2">
        <tr class="giallo">
            <td><h1 align="center"> Database </h1></td>
        </tr>
        <tr class="bianco">
            <td>
                <div class="container">
                    <div class="row">
                        <div align="right" id="p" class="nascosto">
                            <button id="Aggiungi" class="btn btn-success glyphicon glyphicon-plus" style="width: 435px" data-toggle="modal" data-target="#FormModale" onclick="Form(this.parentNode,'Aggiungi',0)">Aggiungi</button>
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
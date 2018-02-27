function Ricerca(filtro,elementi)
{
    Scolora(elementi);                  //Richiamo la funzione che scolora le caselle
    if(filtro=="") return 0;            //Se il filtro è vuoto esce dalla funzione
    for(var i=0;i<elementi.length;i++){ //Faccio un ciclo che prende il contenuto di ogni casella e lo pone in maiuscolo e attraverso la funzione search ricerco il filtro all'interno della casella, per evitare che controlli anche i bottoni
        if(elementi[i].innerHTML.toUpperCase().search(filtro.toUpperCase())!=-1 && elementi[i].innerHTML.search('<')==-1) elementi[i].style.backgroundColor="lightblue"; // o i tag html in generale ho inserito un controllo che vede se c'è un minore. Se la ricerca ha avuto risultati positivi lo coloro di azzurro
    }
}
function Scolora(elementi) {
    for(var i=1;i<elementi.length;i++){
        elementi[i].style.backgroundColor="white"; //Ciclo che rende tutte le casello bianche, parte da 1 perchè non deve prendere in considerazione il primo td che incontra che sarebbe il titolo
    }
}

function Ordina(tabella,elementi){ //Funzione che ordina la tabella
    var appoggio=new Array();
    var appoggioTabella=new Array(); // Dichiaro delle variabili di appoggio che serviranno in seguito
    for(var i=0;i<elementi.length;i++)  //ciclo che riempie le variabil di appoggio
    {
        appoggio[i]=elementi[i].innerHTML.toLowerCase() + i.toString(); //pongo il tutto minuscolo per renderlo non case sensitive e poi concateno l'indice che corrisponde alla posizione attuale
        appoggioTabella[i]=tabella[i].innerHTML; //Utilizzo delle variabili di appoggio perchè se manipolo direttamente i vettori di partenza vengono modificati nella pagina html direttamente causando diversi bug
    }
    appoggio.sort(); //richiamo la funzione che riordina il vettore contenente gli elementi
    for(var i=0;i<appoggio.length;i++)  tabella[i].innerHTML=appoggioTabella[appoggio[i][appoggio[i].length-1]]; //Manipolo la tabella
}

function Select(Tabella) {
    $(Tabella).load("Select.php", function () {
        $("body").fadeIn();
    });
    $("#p").slideDown();
}

function Form(elemento,tipo,id){
    $("#Invia").unbind("click");
    $("#Aggiungi").slideUp("slow");
    $('#panel').slideDown("slow");
    if(tipo=="Aggiungi")
    {
        $("#Invia").click(function () {
            Aggiungi(this.parentNode);
        });
        $('#panel').find('input')[0].value="";
        $('#panel').find('input')[1].value="";
        $('#panel').find('input')[2].value="";
        $('#panel').find('input')[3].value="";
    }
    else if(tipo=="Update") {
        $("#Invia").click(function () {
            Update(this.parentNode);
        });
        $('#panel').find('input')[0].value=$(elemento).find('input')[0].value;
        $('#panel').find('input')[1].value=$(elemento).find('input')[1].value;
        $('#panel').find('input')[2].value=$(elemento).find('input')[2].value;
        $('#panel').find('input')[3].value=id;
    }
}

function Aggiungi(elemento) {
    var nome=$(elemento).find('input')[0].value;
    var cognome=$(elemento).find('input')[1].value;
    var email=$(elemento).find('input')[2].value;
    $("#prova").load("Aggiungi.php?nome=" + nome + "&cognome=" + cognome + "&email=" + email, function (responseTxt) {
        if(responseTxt!="") alert(responseTxt);
        else {
            $(elemento).slideUp("slow");
            $("#Aggiungi").slideDown("slow");
            Select($('#Tabella')[0]);
        }
    });
}

function Update(elemento) {

    var nome=$(elemento).find('input')[0].value;
    var cognome=$(elemento).find('input')[1].value;
    var email=$(elemento).find('input')[2].value;
    var id=$(elemento).find('input')[3].value;
    $("#prova").load("Update.php?nome=" + nome + "&cognome=" + cognome + "&email=" + email +"&Identificativo="+id,function (responseTxt) {
        if(responseTxt!="") alert(responseTxt);
        else {
            $(elemento).slideUp("slow");
            $("#Aggiungi").slideDown("slow");
            Select($('#Tabella')[0]);
        }
    });
}

function Delete(Id){
    $("#prova").load("Delete.php?Identificativo="+Id,function () {
        Select($('#Tabella')[0]);
    });
}

function Annulla(elemento) {
    $("#Invia").unbind("click");
    $(elemento).slideUp("slow");
    $("#Aggiungi").slideDown("slow");
}
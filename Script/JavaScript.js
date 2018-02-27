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
    for(var i=0;i<appoggio.length;i++)  tabella[i].innerHTML=appoggioTabella[appoggio[i][appoggio[i].length-1]]; //Manipolo la tabella utilizzando l'indice scritto all'interno dell' appoggio
}

function Select(Tabella) { //Funzione che richiama la select
    $(Tabella).load("Select.php", function () { //Utilizzando la funzione jquery load richiamo il server per eseguire la select
        $("body").fadeIn();                     //Una volta che il server ha eseguito le sue funzioni mostra il body
    });
    $("#p").slideDown();                        //mostra il bottone aggiungi
}

function Form(elemento,tipo,id){
    $("#Invia").unbind("click");                //Rimuovo qualsiasi event listener che riguarda il click concernente il bottone invia
    if(tipo=="Aggiungi")                        //Se ha cliccato su Aggiungi
    {
        $("#Invia").click(function () {         //Aggiungo l'event listener dell'aggiungi al bottone Invia
            Aggiungi(this.parentNode);
        });
        $('#panel').find('input')[0].value="";  //Pongo tutti valori delle textbox nulle nel caso in cui non lo siano
        $('#panel').find('input')[1].value="";
        $('#panel').find('input')[2].value="";
        $('#panel').find('input')[3].value="";
    }
    else if(tipo=="Update")                     //Se ha cliccato Update
    {                                           //Aggiungo l'event listener dell'Update al bottone Invia
        $("#Invia").click(function () {
            Update(this.parentNode);
        });
        $('#panel').find('input')[0].value=$(elemento).find('input')[0].value; //Pongo i valori delle textbox del form al suo corrispettivo all'interno della tabella
        $('#panel').find('input')[1].value=$(elemento).find('input')[1].value;
        $('#panel').find('input')[2].value=$(elemento).find('input')[2].value;
        $('#panel').find('input')[3].value=id;
    }
}

function Aggiungi(elemento) {                           //Funzione che esegue l'insert Into
    var nome=$(elemento).find('input')[0].value;        //Prendo il nome cogome de email dalle textbox
    var cognome=$(elemento).find('input')[1].value;
    var email=$(elemento).find('input')[2].value;
    if(nome==""&& cognome=="") alert("Nome e cognome non inseriti"); //Controllo se nome e cognome sono validi
    else if(nome=="") alert("Nome non inserito");
    else if(cognome=="") alert("Cognome non inserito");
    else{
        $("#prova").load("Aggiungi.php?nome=" + nome + "&cognome=" + cognome + "&email=" + email, function (responseTxt) {  //Richiamo il server per eseguire la funzione Aggiungi
            if(responseTxt!="") alert(responseTxt);      //Se c'è stato un errore richiamo un alert che lo enunzia
            else {
                Select($('#Tabella')[0]);                //Aggiorno la tabella richiamando la funzione di select
                $('#FormModale').modal('hide');          //Nascondo il form Modale
            }

        });
    }

}

function Update(elemento) {                             //Funzione che esegue l'Update
    var nome=$(elemento).find('input')[0].value;        //Prendo il nome cogome de email dalle textbox
    var cognome=$(elemento).find('input')[1].value;
    var email=$(elemento).find('input')[2].value;
    var id=$(elemento).find('input')[3].value;          //Prendo l'id dal valore dell'input type hidden
    if(nome==""&& cognome=="") alert("Nome e cognome non inseriti"); //Controllo se nome e cognome sono validi
    else if(nome=="") alert("Nome non inserito");
    else if(cognome=="") alert("Cognome non inserito");
    else {
        $("#prova").load("Update.php?nome=" + nome + "&cognome=" + cognome + "&email=" + email +"&Identificativo="+id,function (responseTxt) {  //Richiamo il servere che esegue la funzione di Update
            if(responseTxt!="") alert(responseTxt);     //Se c'è stato un errore richiamo un alert che lo enunzia
            else {
                Select($('#Tabella')[0]);               //Aggiorno la tabella richiamando la funzione di select
                $('#FormModale').modal('hide');         //Nascondo il form Modale
            }
        });
    }
}

function Delete(Id){                                    //funzione che esegue il delete
    $("#prova").load("Delete.php?Identificativo="+Id,function () {  //Richiamo il server che esegue la funzione di delete
        Select($('#Tabella')[0]);                                   //Aggiorno la tabella richiamando la funzione di select
    });
}

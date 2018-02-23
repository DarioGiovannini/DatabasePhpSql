function Ricerca(filtro,elementi)
{
    Scolora(elementi);
    if(filtro=="") return 0;
    var i;
    for(i=0;i<elementi.length;i++){
        if(elementi[i].innerHTML.toUpperCase().search(filtro.toUpperCase())!=-1 && elementi[i].innerHTML.search('<')==-1) elementi[i].style.backgroundColor="lightblue";
    }
}
var globale;
function Scolora(elementi) {
    var i;
    for(i=0;i<elementi.length;i++){
        elementi[i].style.backgroundColor="white";
    }
}

function Ordina(tabella,elementi){
    var appoggio=new Array();
    var appoggioTabella=new Array();
    for(var i=0;i<elementi.length;i++)
    {
        appoggio[i]=elementi[i].innerHTML.toLowerCase() + i.toString();
        appoggioTabella[i]=tabella[i+1].innerHTML;
    }
    appoggio.sort();

    for(var i=0;i<appoggio.length;i++)  tabella[i+1].innerHTML=appoggioTabella[appoggio[i][appoggio[i].length-1]];
}

function Select(Tabella) {
    $(Tabella).load("Select.php");
    /*var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            Tabella.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "Select.php", true);
    xhttp.send();*/
}

function Form(elemento,tipo,id){
    var nome="",cognome="",email="";
    globale=elemento.innerHTML;
    if(tipo=="Update"){
        nome=$(elemento).find('input')[0].value;
        cognome=$(elemento).find('input')[1].value;
        email=$(elemento).find('input')[2].value;
    }
    elemento.innerHTML = "Nome<input  type=\"text\" name=\"nome\" value='" + nome + "'    required>\n" +
        "Cognome<input  type=\"text\" name=\"cognome\"  value='" + cognome + "'  required>\n" +
        "Mail<input  type=\"email\" name=\"mail\" value=" + email + ">\n" +
        "<input  type='hidden' name='Identificativo' value=" + id + ">\n";
    if(tipo=="Aggiungi")elemento.innerHTML+="<button class=\"btn btn-success glyphicon glyphicon-envelope\" onclick=\"Aggiungi(this.parentNode)\"> Invia</button>\n";
    else if(tipo=="Update")elemento.innerHTML+="<button class=\"btn btn-success glyphicon glyphicon-envelope\" onclick=\"Update(this.parentNode)\"> Invia</button>\n";
    elemento.innerHTML+="<button id='Annulla' class='btn btn-danger glyphicon glyphicon-remove' onclick='Annulla(this.parentNode)'> Annulla</button> </div>";
}

function Aggiungi(elemento) {
   // var xhttp = new XMLHttpRequest();
    var nome=$(elemento).find('input')[0].value;
    var cognome=$(elemento).find('input')[1].value;
    var email=$(elemento).find('input')[2].value;
    $(elemento).load("Aggiungi.php?nome=" + nome + "&cognome=" + cognome + "&email=" + email)
    /*xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText!="")  $(elemento).find('input')[0].value=this.responseText;
            else {
                elemento.innerHTML = "<button class=\"btn btn-success glyphicon glyphicon-plus\" onclick=\"Form($('#p')[0],'Aggiungi',0);\"> Aggiungi</button>";
                Select($('#Tabella')[0]);
            }
        }
    };
    xhttp.open("GET", "Aggiungi.php?nome=" + nome + "&cognome=" + cognome + "&email=" + email, true);
    xhttp.send();*/
}

function Update(elemento) {
    var xhttp = new XMLHttpRequest();
    var nome=$(elemento).find('input')[0].value;
    var cognome=$(elemento).find('input')[1].value;
    var email=$(elemento).find('input')[2].value;
    var id=$(elemento).find('input')[3].value;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText!="")  elemento.getElementsByTagName('input')[0].value=this.responseText;
            else Select($('#Tabella')[0]);
        }
    };
    xhttp.open("GET", "Update.php?nome=" + nome + "&cognome=" + cognome + "&email=" + email +"&Identificativo="+id, true);
    xhttp.send();
}

function Delete(Id){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            Select($('#Tabella')[0]);
        }
    }
    xhttp.open("GET", "Delete.php?Identificativo="+Id, true);
    xhttp.send();
}

function Annulla(elemento) {
    elemento.innerHTML=globale;
}
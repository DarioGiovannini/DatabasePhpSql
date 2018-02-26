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
    var nome=$(elemento).find('input')[0].value;
    var cognome=$(elemento).find('input')[1].value;
    var email=$(elemento).find('input')[2].value;
    $("#prova").load("Aggiungi.php?nome=" + nome + "&cognome=" + cognome + "&email=" + email, function (responseTxt) {
        if(responseTxt!="") alert(responseTxt);
        else {
            elemento.innerHTML = "<button class=\"btn btn-success glyphicon glyphicon-plus\" onclick=\"Form($('#p')[0],'Aggiungi',0);\"> Aggiungi</button>";
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
        if(responseTxt=="") alert("Email non valida");
        else Select($('#Tabella')[0]);
    });
}

function Delete(Id){
    $("#prova").load("Delete.php?Identificativo="+Id,function () {
        Select($('#Tabella')[0]);
    });

}

function Annulla(elemento) {
    elemento.innerHTML=globale;
}
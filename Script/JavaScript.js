function Ricerca(filtro,elementi)
{
    Scolora(elementi);
    if(filtro=="") return 0;
    var i;
    for(i=0;i<elementi.length;i++){
        if(elementi[i].innerHTML.toUpperCase().search(filtro.toUpperCase())!=-1 && elementi[i].innerHTML.search('<')==-1) elementi[i].style.backgroundColor="lightblue";
    }
}
function Scolora(elementi) {
    var i;
    elementi[0].style.backgroundColor="";
    for(i=1;i<elementi.length;i++){
        elementi[i].style.backgroundColor="white";
    }
}

function Ordina(tabella,elementi){
    var appoggio=new Array();
    var appoggioTabella=new Array();
    for(var i=0;i<elementi.length;i++)
    {
        appoggio[i]=elementi[i].innerHTML.toLowerCase() + i.toString();
        appoggioTabella[i]=tabella[i].innerHTML;
    }
    appoggio.sort();
    for(var i=0;i<appoggio.length;i++)  tabella[i].innerHTML=appoggioTabella[appoggio[i][appoggio[i].length-1]];
}

function Select(Tabella) {
    $(Tabella).load("Select.php");
    $("#p").slideDown("slow");
}

function Form(elemento,tipo,id){
    $("#Invia").unbind("click");
    $('#panel').slideDown("slow");
    $("#Aggiungi").slideUp("slow");
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
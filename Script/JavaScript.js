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
    for(i=0;i<elementi.length;i++){
        elementi[i].style.backgroundColor="white";
    }
}

function Ordina(tabella,elementi){
    var appoggio=new Array();
    var gianni=new Array();
    for(var i=0;i<elementi.length;i++)
    {
        appoggio[i]=elementi[i].innerHTML + i.toString();
        gianni[i]=tabella[i+1].innerHTML;;
    }
    appoggio.sort();

    for(var i=0;i<appoggio.length;i++)  tabella[i+1].innerHTML=gianni[appoggio[i][appoggio[i].length-1]];
}

function Select(Tabella) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            Tabella.innerHTML =   "<thead> " +
                "<th> Id      </th>" +
                "<th> Nome    </th>" +
                "<th> Cognome </th>" +
                "<th> Email   </th>" +
                "<th> Update  </th>" +
                "<th> Delete  </th>" +
                "</thead>" +
                this.responseText;
        }
    };
    xhttp.open("GET", "Select.php", true);
    xhttp.send();
}

function Form(elemento,tipo){
    var nome="",cognome="",email="";
    if(tipo=="Update"){
        nome=elemento.getElementsByTagName('input')[0].value;
        cognome=elemento.getElementsByTagName('input')[1].value;
        email=elemento.getElementsByTagName('input')[2].value;
    }
    elemento.innerHTML = "Nome<input type=\"text\" name=\"nome\" value='" + nome + "'    required>\n" +
        "Cognome<input type=\"text\" name=\"cognome\"  value='" + cognome + "'  required>\n" +
        "Mail<input type=\"email\" name=\"mail\" value=" + email + ">\n";
    if(tipo=="Aggiungi")elemento.innerHTML+="<input type=\"submit\" class=\"btn btn-success\" onclick=\"Aggiungi(this.parentNode)\">\n";
    else if(tipo=="Update")elemento.innerHTML+="<input type=\"submit\" class=\"btn btn-success\" onclick=\"Update(this.parentNode)\">\n";
}

function Aggiungi(elemento) {
    var xhttp = new XMLHttpRequest();
    var nome=elemento.getElementsByTagName('input')[0].value;
    var cognome=elemento.getElementsByTagName('input')[1].value;
    var email=elemento.getElementsByTagName('input')[2].value;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText!="")  elemento.getElementsByTagName('input')[0].value=this.responseText;
            else elemento.innerHTML="<input type=\"button\" value=\"aggiungi\" class=\"btn btn-success\" onclick=\"Form(document.getElementById('p'),'Aggiungi');\">";
        }
    };
    xhttp.open("GET", "Aggiungi.php?nome=" + nome + "&cognome=" + cognome + "&email=" + email, true);
    xhttp.send();
}

function Update(elemento) {
    var xhttp = new XMLHttpRequest();
    var nome=elemento.getElementsByTagName('input')[0].value;
    var cognome=elemento.getElementsByTagName('input')[1].value;
    var email=elemento.getElementsByTagName('input')[2].value;
    var id=elemento.getElementsByTagName('input')[3].value;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText!="")  elemento.getElementsByTagName('input')[0].value=this.responseText;
                else elemento.innerHTML="<input type=\"button\" value=\"aggiungi\" class=\"btn btn-success\" onclick=\"Form(this.parentNode,'Update');\">";
            }
        }
    };
    xhttp.open("GET", "Update.php??nome=" + nome + "&cognome=" + cognome + "&email=" + email +"&Identificativo="+id, true);
    xhttp.send();
}

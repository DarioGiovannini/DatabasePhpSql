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


}

function Update(tabella,elementi){
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
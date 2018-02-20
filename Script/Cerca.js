function Ricerca(Filtro,Elementi)
{
    Scolora(Elementi);
    if(Filtro=="") return 0;
    var i;
    for(i=0;i<Elementi.length;i++){
        if(Elementi[i].innerHTML.toUpperCase().search(Filtro.toUpperCase())!=-1 && Elementi[i].innerHTML.search('<')==-1) Elementi[i].style.backgroundColor="lightblue";
    }
}

function Scolora(Elementi) {
    var i;
    for(i=0;i<Elementi.length;i++){
        Elementi[i].style.backgroundColor="white";
    }
}

function Ordina(Tabella,Elementi){
    var appoggio=new Array();
    var gianni=Tabella
    for(var i=0;i<Elementi.length;i++) appoggio[i]=Elementi[i].innerHTML + i.toString();
    appoggio.sort();

    for(var i=0;i<appoggio.length;i++)
    {
        alert(appoggio[i][appoggio[i].length-1]);
        alert(Tabella[i].innerHTML);
        Tabella[i].innerHTML=gianni[appoggio[i][appoggio[i].length-1]].innerHTML;
    }

}
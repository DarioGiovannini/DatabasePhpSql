function Ricerca(Filtro,Riga)
{
    Scolora(Riga);
    var i;
    for(i=0;i<Riga.length;i++){
        if(Riga[i].innerHTML.search(Filtro)) Riga[i].style.backgroundColor="red";
    }
}

function Scolora(Elementi) {
    var i;
    for(i=0;i<Elementi.length;i++){
        Elementi[i].style.backgroundColor="white";
    }
}
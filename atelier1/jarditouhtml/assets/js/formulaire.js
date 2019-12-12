var valid = document.getElementById("ok");
valid.addEventListener("click",val);

function val(event){

var n = document.getElementById("nom");
var p = document.getElementById("prenom");
var e = document.getElementById("ddn");
var cp = document.getElementById("cp");
var ad  = document.getElementById("ad");
var v = document.getElementById("ville");
var m = document.getElementById("mail");
var a = document.getElementById("are");
var verif = document.getElementById("verif");

//var carac1 = new RegExp (/^.+[a-zA-Z-0-9]+$/); // s'il y a un caractère seul pas pris en compte sinon prend en compte également 0 a 9 et les maj
var carac2 = /[a-zA-Z]+(?:(?:\-| |\')?[a-zA-Z]+)/; // nom et prenom accepte "-"," "," ' ".
var carac3 = /[0-9]{2}(?:(\/|-))[0-9]{2}(?:(\/|-))[0-9]{4}|[0-9]{4}(?:(\/|-))[0-9]{2}(?:(\/|-))[0-9]{2}/;// date de naissance
var blockCp = /^(([0-8][0-9])|(9[0-5])|(2[ab]))[0-9]{3}$/; // on prendra 5 nombres entier */
var adr = /[0-9a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+(?:(?:\'| |\-|\/)?[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+)*$/;// pour une adresse
var carac4 =/^[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+(?:(?: \'| |\-|\/)?[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+)*$/;
var admail = /^[A-Za-z-0-9].*@[a-z]+\.+[a-z]{2,3}/; // prend en compte maj et caractère avant @ puis reprend des lettres met un "." avant de spécifier qu'après se point il y est 2 ou 3 lettres
var area = /^[0-9a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+(?:(?:\'| |\-|\?|\(|\)|\.|\,|\;|\:)?[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+)*$/;

var missN = document.getElementById("missN");
var missP = document.getElementById("missP");
var missE = document.getElementById("missDDN");
var missCp = document.getElementById("missCP");
var missAD = document.getElementById("missAD");
var missV = document.getElementById("missV");
var missM = document.getElementById("missMail");
var missARE = document.getElementById("missARE");
var missVerif = document.getElementById("missVerif");

 if(!carac2.test(n.value)){
    event.preventDefault();
    missN.innerHTML = "Veuillez saisir votre Nom";          
    missN.style.color = "red";
    missN.style.display = "block";
}else{
    missN.innerHTML= "valide";
    missN.style.color = "green";
}
if(!carac2.test(p.value)){
    event.preventDefault();
    missP.innerHTML = "Veuillez saisir votre Prénom";
    missP.style.color = "red";
    missP.style.display = "block";
}else{
    missP.innerHTML= "valide";
    missP.style.color = "green";
    
}
if(!carac3.test(e.value)){
    event.preventDefault();
    missE.innerHTML = "Veuillez saisir une bonne date de naissance";
    missE.style.color = "red";
    missE.style.display = "block";
}else{
    missE.innerHTML= "valide";
    missE.style.color = "green";
}
if(!blockCp.test(cp.value)){
    event.preventDefault();
    missCp.innerHTML = "Veuillez saisir un bon code postal";
    missCp.style.color = "red";
    missCp.style.display = "block";
}else{
    missCp.innerHTML= "valide";
    missCp.style.color = "green";
}
if(!adr.test(ad.value)){
    event.preventDefault();
    missAD.innerHTML = "les espaces, apostrophes, slash et tiret sont accepté ";      
    missAD.style.color = "red";
    missAD.style.display = "block";
}else{
    missAD.innerHTML= "valide";
    missAD.style.color = "green";
}

if(!carac4.test(v.value)){
    event.preventDefault();
    missV.innerHTML = "Veuillez saisir une bonne ville";
    missV.style.color = "red";
    missV.style.display = "block";
}else{
    missV.innerHTML= "valide";
    missV.style.color = "green";
}
if(!admail.test(m.value)){
    event.preventDefault();
    missM.innerHTML = "Veuillez saisir une bonne adresse mail valide";
    missM.style.color = "red";
    missM.style.display = "block";
}else{
    missM.innerHTML= "valide";
    missM.style.color = "green";
}
if(!area.test(a.value)){
    event.preventDefault();
    missARE.innerHTML = "Caractère autorisé : '|espace|-|?|()|.|,|;|";
    missARE.style.color = "red";
    missARE.style.display = "block";
}else{
    missARE.innerHTML= "valide";
    missARE.style.color = "green";
}
if (verif.validity.valueMissing) 
    {
        event.preventDefault()
        missVerif.textContent = 'Veuillez accepter les conditions';
        missVerif.style.color = 'red';
        missVerif.style.display = "block";

    }
    else 
    {
        missVerif.textContent = 'valide';
        missVerif.style.color = 'green';
    }   


}


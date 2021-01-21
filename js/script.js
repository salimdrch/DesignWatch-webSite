/* ------------------------------------------ AJAX ----------------------------------------------------------*/
function vider(id){
        var xmlhttp = getXMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
                console.log(xmlhttp.responseText);
                document.getElementById('divProduit').innerHTML = ' ';
                document.getElementById('divProduit').innerHTML = xmlhttp.responseText;
          }
        };
        
        xmlhttp.open("GET","fonction.php?id=" + id,true);
        xmlhttp.send(); 
}

function valider(id){
    var xmlhttp = getXMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
            console.log(xmlhttp.responseText);
            document.getElementById('divProduit').innerHTML = ' ';
            document.getElementById('divProduit').innerHTML = xmlhttp.responseText;
      }
    };
    
    xmlhttp.open("GET","validerFonction.php?id=" + id,true);
    xmlhttp.send(); 
}



function getXMLHttpRequest(){
    if (window.XMLHttpRequest) // Pour la majorité des navigateurs
        return new XMLHttpRequest() ;
    else if(window.ActiveXObject){ // Anciens navigateurs (IE<7)
        try {
            return new ActiveXObject("Msxml2.XMLHTTP") ;
        } catch (e) {
            return new ActiveXObject("Microsoft.XMLHTTP") ;}
        }
    else { // XMLHttpRequest non supporté par le navigateur
        alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...") ; 
    }
    return NULL ;
}











/* ------------------------------------------ FUNCTIONS ----------------------------------------------------------*/

// Fonction affiche Stock 
function afficheStock(){
    elements = document.getElementsByClassName("stock");
    for(var i=0; i < elements.length; i++){
        if(elements[i].style.display === "none") elements[i].style.display = "inline-block";
        else elements[i].style.display = "none";
    }
}


// Changer la valeur du input 
function afficheV(valeur,id){
    document.getElementById(id).value = parseInt(valeur);
    Session['qt'] = parseInt(valeur);
}

//  Augmenter la quantité  
function moreQuantite(id,q){
    var t = document.getElementById('qts_'+id).value;
    console.log(t);
     if(t >= 0 && t < q){
        t++;
        afficheV(t,'qts_'+id);
    }else{
        return;
    }
}

// Diminuer la quantité 
function lessQuantite(id){
    var t = document.getElementById('qts_'+id).value;
    console.log(t);
     if(t > 0){
        t--;
        afficheV(t,'qts_'+id);
    }else{
        return;
    }
}

/* Verifier le nom */ 
function checkName(valeur){
    var regex = /^[A-Za-z]+$/;
    console.log('Boolean' + regex.test(valeur));
    console.log('Avant la condition');
    if(regex.test(valeur) === false){
        console.log('ca rentre a dans le if');
        document.getElementById("vName").style.display = "block";
        document.getElementById("vName").style.color="#CCC";
        document.getElementById("vName").innerHTML = "Veuillez renseigner un nom correct";
        return false;
    }else{
        console.log("c'est dans le else");
        document.getElementById("vName").style.display = "block";
        document.getElementById("vName").style.color="#CCC";
        document.getElementById("vName").innerHTML = "Votre nom est correct";
        return true;
    }
}

/* Verifier le prenom */ 
function checkFirstName(valeur){
    var regex = /^[A-Za-z]+$/;
    console.log('Boolean' + regex.test(valeur));
    console.log('Avant la condition');
    if(regex.test(valeur) === false){
        console.log('ca rentre a dans le if');
        document.getElementById("vFirstName").style.display = "block";
        document.getElementById("vFirstName").style.color="#CCC";
        document.getElementById("vFirstName").innerHTML = "Veuillez renseigner un nom correct";
        return false;
    }else{
        console.log("c'est dans le else");
        document.getElementById("vFirstName").style.display = "block";
        document.getElementById("vFirstName").style.color="#CCC";
        document.getElementById("vFirstName").innerHTML = "Votre nom est correct";
        return true;
    }
}
    
/* Verifier le mail */ 
function checkMail(valeur){
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    console.log('Boolean' + regex.test(valeur));
    console.log('Avant la condition');
    if(regex.test(valeur) === false){
        console.log('ca rentre a dans le if');
        document.getElementById("vMail").style.display = "block";
        document.getElementById("vMail").style.color="#CCC";
        document.getElementById("vMail").innerHTML = "Veuillez renseigner un mail correct";
        return false;
    }else{
        console.log("c'est dans le else");
        document.getElementById("vMail").style.display = "block";
        document.getElementById("vMail").style.color="#CCC";
        document.getElementById("vMail").innerHTML = "Votre Email est correct";
        return true;
    }
}

/* Verifier la date */ 
function checkDate(valeur){
    //expression reguliere verification date valide
    var regex = /^\d{4}\-\d{2}\-\d{2}$/;
    var d = String(valeur); //conversion de la date en string 
    var chaine_annee = d.split("-"); // Avec split, on recupere un tableau de la forme[anne, mois, jours]
    var annee = parseInt(chaine_annee[0]); ///on recupere juste l'annee
    
    if(annee <= 1900){//si la date de naissance est trop petite
        document.getElementById("vDate").style.display = "block";
        document.getElementById("vDate").style.color="#CCC";
        document.getElementById("vDate").innerHTML = "Votre année de naissance est trop lointaine !";

        return false;
    }
    else if(annee >= 2020){//si il saisie un année > à l'année actuelle
        document.getElementById("vDate").style.display = "block";
        document.getElementById("vDate").style.color="#CCC";
        document.getElementById("vDate").innerHTML = "Votre année de naissance est invalide !";
        return false;
    }
    else if(annee >= 2002 && annee < 2020){ // si il est mineur
        document.getElementById("vDate").style.display = "block";
        document.getElementById("vDate").style.color="#CCC";
        document.getElementById("vDate").innerHTML = "Vous êtes mineur !";
        return false;
    }

    else if(regex.test(valeur) === false){//si la date est fausse tout court
        document.getElementById("vDate").style.display = "block";
        document.getElementById("vDate").style.color="#CCC";
        document.getElementById("vDate").innerHTML = "La date saisie est incorrect !";
        return false;
    }
    
    else if(regex.test(valeur) === true){//si la date est bone
        document.getElementById("vDate").style.display = "block";
        document.getElementById("vDate").style.color="#CCC";
        document.getElementById("vDate").innerHTML = "La date saisie est correct !";
        return true;
    }

}

function checkMessage(valeur){
    var regex = /^[A-Za-z1-9]+$/;
    console.log('Boolean' + regex.test(valeur));
    console.log('Avant la condition');
    if(regex.test(valeur) === false){
        console.log('ca rentre a dans le if');
        document.getElementById("vMessage").style.display = "block";
        document.getElementById("vMessage").style.color="#CCC";
        document.getElementById("vMessage").innerHTML = "Veuillez renseigner un message !";
        return false;
    }else{
        console.log("c'est dans le else");
        document.getElementById("vMessage").style.display = "block";
        document.getElementById("vMessage").style.color="#CCC";
        document.getElementById("vMessage").innerHTML = "Votre Message est correct !";
        return true;
    }
}


function envoyer_form(){ 
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var mail = document.getElementById("mail").value;
    var date = document.getElementById("date").value;
    var message = document.getElementById("m").value;
    if(checkName(nom) === false || checkFirstName(prenom) === false ||checkMail(mail)===false || checkDate(date) === false || checkMessage(message) === false){
        console.log('ca rentre a dans le if');
        alert("Un ou plusieur champs saisie sont invalides !");
        return false;
    } else if(checkName(nom) === true || checkFirstName(prenom) === true ||checkMail(mail)===true || checkDate(date) === true || checkMessage(message) === true){
        console.log("c'est dans le else");
        alert("Formulaire envoyé");
        return true;
    }
}

function affiche(valeur){
    valeur.style.textTransform = "uppercase";
    valeur.style.fontWeight = "700";
    valeur.style.color = "#303030";
    valeur.style.textShadow = "1px 1px 1px #CCC, 1px 2px 1px #CCC, 1px 3px 1px #CCC, 1px 4px 1px #CCC, 1px 5px 1px #CCC, 1px 6px 1px #CCC, 1px 7px 1px #CCC, 1px 8px 1px #CCC, 1px 9px 1px #CCC,       1px 10px 1px #CCC,1px 18px 6px rgba(16,16,16,0.4),1px 22px 10px rgba(16,16,16,0.2),1px 25px 35px rgba(16,16,16,0.2),1px 30px 60px rgba(16,16,16,0.4)";
}

function normal(valeur){
    valeur.style.textTransform = "none";
    valeur.style.fontFamily = "none";
    valeur.style.fontWeight = "normal";
    valeur.style.color = "black";
    valeur.style.textShadow = "none";
}

function borderChange(id,color) 
{
    document.getElementById(id).style.borderColor = color;
}
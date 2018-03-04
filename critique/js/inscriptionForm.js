document.getElementById("mdp").addEventListener("input", function (e) {
    var mdp = e.target.value; // Valeur saisie dans le champ mdp
    var longueurMdp = "faible";
    var couleurMsg = "red"; // Longueur faible => couleur rouge
    if (mdp.length >= 8) {
        longueurMdp = "suffisante";
        couleurMsg = "green"; // Longueur suffisante => couleur verte
    } else if (mdp.length >= 4) {
        longueurMdp = "moyenne";
        couleurMsg = "orange"; // Longueur moyenne => couleur orange
    }
    var aideMdpElt = document.getElementById("aideMdp");
    aideMdpElt.textContent = "Longueur : " + longueurMdp; // Texte de l'aide
    aideMdpElt.style.color = couleurMsg; // Couleur du texte de l'aide
});

document.getElementById("mdp").addEventListener("blur", function (e) {
    var regex = /(?=.*[a-z]+)(?=.*[A-Z]+)(?=.*[0-9]+)/;
    var validite = "";
    if (!regex.test(e.target.value)) {
        validite = "Le mot de passe doit contenir au minimum une lettre majuscule et un chiffre";
    }
    document.getElementById("aide").textContent = validite;
});

document.getElementById("mdp2").addEventListener("blur", function (e) {
    var mdp = document.getElementById("mdp");
    var validite = "";
    if (!(e.target.value == mdp.value)) {
        validite = "Les mots de passe ne sont pas identiques";
    }
    document.getElementById("MdpIdentique").textContent = validite;
});

document.getElementById("email").addEventListener("blur", function (e) {
    var regex = /[A-Za-z0-9_]+@[a-zA-Z]+\.[a-zA-Z]+/;
    var validite = "";
    if (!regex.test(e.target.value)) {
        validite = "Adresse Invalide";
    }
    document.getElementById("aideEmail").textContent = validite;
});

var form = document.getElementById("form");
form.addEventListener("submit", function (e) {
    var aide = document.getElementById("aideMdp");
    var majInt = document.getElementById("aide");
    var aideEmail = document.getElementById("aideEmail");
    var MdpIdentique = document.getElementById("MdpIdentique");
    if(aide.textContent == "Longueur : faible"){
        e.preventDefault();
    }
    if (majInt.textContent == "Le mot de passe doit contenir au minimum une lettre majuscule et un chiffre") {
        e.preventDefault();
    }
    if (aideEmail.textContent == "Adresse Invalide") {
        e.preventDefault();
    }
    if (MdpIdentique.textContent == "Les mots de passe ne sont pas identiques") {
        e.preventDefault();
    }
});
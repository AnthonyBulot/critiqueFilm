document.getElementById("newPassword").addEventListener("input", function (e) {
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
    var aideMdpElt = document.getElementById("aide1");
    aideMdpElt.textContent = "Longueur : " + longueurMdp; // Texte de l'aide
    aideMdpElt.style.color = couleurMsg; // Couleur du texte de l'aide
});

document.getElementById("newPassword").addEventListener("blur", function (e) {
    var regex = /(?=.*[a-z]+)(?=.*[A-Z]+)(?=.*[0-9]+)/;
    var validite = "";
    if (!regex.test(e.target.value)) {
        validite = "Le mot de passe doit contenir au minimum une lettre majuscule et un chiffre";
    }
    document.getElementById("aide2").textContent = validite;
});

document.getElementById("newPassword2").addEventListener("blur", function (e) {
    var mdp = document.getElementById("newPassword");
    var validite = "";
    if (!(e.target.value == mdp.value)) {
        validite = "Les mots de passe ne sont pas identiques";
    }
    document.getElementById("newMdpIdentique").textContent = validite;
});

var form = document.getElementById("formPassword");
form.addEventListener("submit", function (e) {
    var aide = document.getElementById("aide1");
    var majInt = document.getElementById("aide2");
    var MdpIdentique = document.getElementById("newMdpIdentique");
    if(aide.textContent == "Longueur : faible"){
        e.preventDefault();
    }
    if (majInt.textContent == "Le mot de passe doit contenir au minimum une lettre majuscule et un chiffre") {
        e.preventDefault();
    }
    if (MdpIdentique.textContent == "Les mots de passe ne sont pas identiques") {
        e.preventDefault();
    }
});
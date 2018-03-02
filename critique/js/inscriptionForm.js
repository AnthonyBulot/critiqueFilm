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
    var regex = /.*[a-z]+.*[A-Z]+.*[0-9]+/;
    var validite = "";
    if (!regex.test(e.target.value)) {
        validite = "Le mot de passe doit contenir au minimum une lettre majuscule et un chiffre";
    }
    document.getElementById("aide").textContent = validite;
});

var form = document.getElementById("form");
form.addEventListener("submit", function (e) {
    var aide = document.getElementById("aideMdp");
    var majInt = document.getElementById("aide");
    if(aide.textContent == "Longueur : faible"){
        e.preventDefault();
    }
    if (majInt.textContent == "Le mot de passe doit contenir au minimum une lettre majuscule et un chiffre") {
        e.preventDefault();
    }
});
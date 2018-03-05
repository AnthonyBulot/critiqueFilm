document.getElementById("emailPast").addEventListener("blur", function (e) {
    var regex = /[A-Za-z0-9_]+@[a-zA-Z]+\.[a-zA-Z]+/;
    var validite = "";
    if (!regex.test(e.target.value)) {
        validite = "Adresse Invalide";
    }
    document.getElementById("aideEmailPast").textContent = validite;
});
document.getElementById("emailNew").addEventListener("blur", function (e) {
    var regex = /[A-Za-z0-9_]+@[a-zA-Z]+\.[a-zA-Z]+/;
    var validite = "";
    if (!regex.test(e.target.value)) {
        validite = "Adresse Invalide";
    }
    document.getElementById("aideEmailNew").textContent = validite;
});

var form = document.getElementById("formEmail");
form.addEventListener("submit", function (e) {
    var pastEmail = document.getElementById("aideEmailPast");
    var newEmail = document.getElementById("aideEmailNew");
    if(newEmail.textContent == "Adresse Invalide" || pastEmail.textContent == "Adresse Invalides"){
        e.preventDefault();
    }
});
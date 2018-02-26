document.getElementById("courriel").addEventListener("blur", function (e) {
    // Correspond à une chaîne de la forme xxx@yyy.zzz
    var regexCourriel = /.+@.+\..+/;
    var validiteCourriel = "";
    if (!regexCourriel.test(e.target.value)) {
        validiteCourriel = "Adresse invalide";
    }
    document.getElementById("aideCourriel").textContent = validiteCourriel;
});


var form = document.getElementById("form");
form.addEventListener("submit", function (e) {
	var aide = document.getElementById("aideCourriel");
    if(aide.textContent == "Adresse invalide"){
    	e.preventDefault();
    }
});

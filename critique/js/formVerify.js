var formVerify = {

	passwordLength: function(mdp, text) {
		document.getElementById(mdp).addEventListener("input", function (e) {
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
    		var aideMdpElt = document.getElementById(text);
    		aideMdpElt.textContent = "Longueur : " + longueurMdp; // Texte de l'aide
    		aideMdpElt.style.color = couleurMsg; // Couleur du texte de l'aide
		});
	},

	passwordCorrect: function(mdp, text) {
		document.getElementById(mdp).addEventListener("blur", function (e) {
    		var regex = /(?=.*[a-z]+)(?=.*[A-Z]+)(?=.*[0-9]+)/;
    		var validite = "";
    		if (!regex.test(e.target.value)) {
       		 	validite = "Le mot de passe doit contenir au minimum une lettre majuscule et un chiffre";
    		}
    		document.getElementById(text).textContent = validite;
		});
	},

	passwordEqual: function(mdp, mdp2, text){
		document.getElementById(mdp2).addEventListener("blur", function (e) {
    		var firstMdp = document.getElementById(mdp);
    		var validite = "";
    		if (!(e.target.value == firstMdp.value)) {
        		validite = "Les mots de passe ne sont pas identiques";
    		}
    		document.getElementById(text).textContent = validite;
		});
	},

	email: function(email, text){
		document.getElementById(email).addEventListener("blur", function (e) {
    		var regex = /[A-Za-z0-9_]+@[a-zA-Z]+\.[a-zA-Z]+/;
    		var validite = "";
    		if (!regex.test(e.target.value)) {
        		validite = "Adresse Invalide";
    		}
    		document.getElementById(text).textContent = validite;
		});
	},

	submit: function(form, text, noSubmit){
		var form = document.getElementById(form);
		form.addEventListener("submit", function (e) {
			if (text != null){
    			var aide = document.getElementById(text);
    			if(aide.textContent == "Longueur : faible"){
        			e.preventDefault();
    			}
			}
			
    		var input = document.getElementsByClassName(noSubmit);
    		for (var i = 0; i < input.length; i++) {
    			if (!(input[i].textContent == "")){
    				e.preventDefault();
    			}
    		}
		});
	}
}

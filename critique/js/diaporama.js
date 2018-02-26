var diaporama = {
	//les propriétés dont tu as besoin pour le diaporama
	position: 0,
	tabImage: [],
	tabHref: [],

	init: function(){
		this.initImages();
		this.slide();
		this.flecheD();
		this.flecheG();
		this.boutonD();
		this.boutonG();
	},
	initImages: function(){
		var photo = $(".diapo");
		var lien = $(".lienDiapo");
		for (var i = 0; i <= 3; i++) {
			var srcPhoto = photo[i].src;
			var hrefPhoto = lien[i].href;
			this.tabImage.push(srcPhoto);
			this.tabHref.push(hrefPhoto);
		}
	},
	right: function() {
		this.position ++;
		if (this.position === 4)
		{
			this.position = 0;
		}
		var photo = document.getElementById("maPhoto");
		var lienPhoto = document.getElementById("lienMaPhoto");
		lienPhoto.href = this.tabHref[this.position];
		photo.src = this.tabImage[this.position];
	},
	left: function() {
		this.position = this.position - 1;
		if (this.position === -1)
		{
			this.position = 3;
		}
		var photo = document.getElementById("maPhoto");
		photo.src = this.tabImage[this.position];
		var lienPhoto = document.getElementById("lienMaPhoto");
		lienPhoto.href = this.tabHref[this.position];
	},

	slide: function() {
		setInterval(function(){
			diaporama.right();
		}, 7000);		
	},
	flecheD: function(){
		document.addEventListener("keydown", function (e) {
    		if (e.keyCode === 39) {
    			diaporama.right();
   			}
   		});
	},
    flecheG: function(){
    	document.addEventListener("keydown", function (e) {
    		if (e.keyCode === 37) {
    			diaporama.left();
  			}
  		});
  	},
  	boutonD: function(){
  		var boutonD = document.getElementById("right");
  		boutonD.addEventListener("click", function(){
			diaporama.right();
		});
  	},
  	boutonG: function(){
  		var boutonG = document.getElementById("left");
  		boutonG.addEventListener("click", function() {
			diaporama.left();
  		});
  	}
	//les méthodes du diaporama : afficher image suivante, afficher image précédente, événements (bien séparer le changement d'affichage de la gestion des événements)
}

$(document).ready(function(){
	var app = Object.create(diaporama);
	app.init();
});
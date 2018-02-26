var map = {
	//les propriétés dont tu as besoin pour la map
	paris: {lat: 48.864710, lng: 2.344655},
	map: null,
	apiCinema: null,
	reservation: null,
	markerActifNom: null,
	markerActifDispo: null,

	init : function(station){
		this.initMap();
		for (var i = 0; i < station.records.length; i++)
		{
			this.initMarker(i, station);
		}
	},
	initMap : function(){
		this.map = new google.maps.Map(document.getElementById("map"), {
    	zoom: 14,
    	center: this.paris
    	});
	},
	initMarker : function(i, station){
		this.apiCinema = Object.create(apiCinema);
		this.apiCinema.init(i, station);
    	var marker = new google.maps.Marker({
    		position: this.apiCinema.latLng,
    		nom: this.apiCinema.name,
    		adresse: this.apiCinema.address,
			arrondissement: this.apiCinema.arrondissement,
     		map: this.map           	
    	});
			
    	this.clicMarker(marker);
	},
	clicMarker : function(marker){
		google.maps.event.addDomListener(marker, 'click', function() {
    		var reserv = document.getElementById("reserv");
    		var detail = document.getElementById("detail");
    		var nom = document.getElementById("nom");
    		var adresse = document.getElementById("adresse");
    		var arrondissement = document.getElementById("arrondissement");

    		detail.textContent = "Détails de votre cinéma !";
			nom.textContent = this.nom;
			adresse.textContent = this.adresse;
			arrondissement.textContent = this.arrondissement;

			reserv.style.border = "black 3px solid";
			reserv.style.opacity = "1";
    	});
	}
	//les méthodes de la map : afficher la map, ajouter un marqueur sur la map, clique sur un marqueur ...
}
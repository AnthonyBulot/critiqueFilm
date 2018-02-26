var apiCinema = {
	lat: null,
	lng: null,
	latLng: null,
	name: null,
	address: null,
	arrondissement: null,

	init: function(i, station){
		if (typeof station.records[i].fields.coordonnees != "undefined") {
			this.lat = Number(station.records[i].fields.coordonnees[0]);
			this.lng = Number(station.records[i].fields.coordonnees[1]);
			this.latLng = new google.maps.LatLng({lat: this.lat, lng: this.lng});
		}
		this.name = station.records[i].fields.nom_etablissement;
		this.address = station.records[i].fields.adresse;
		this.arrondissement = station.records[i].fields.arrondissement;
	},
}
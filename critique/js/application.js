var application = {
	map: null,	
	
	ajax: function(){
		var req = new XMLHttpRequest();
    	req.open("GET","https://opendata.paris.fr/api/records/1.0/search/?dataset=cinemas-a-paris&rows=150&facet=art_et_essai&facet=arrondissement");
    	req.addEventListener("load", function () {
        if (req.status >= 200 && req.status < 400) {
        	var station = JSON.parse(req.responseText);
            this.map = Object.create(map);
			this.map.init(station); 
        } else {
            console.error(req.status + " " + req.statusText + " " + url);
        }
    	});
    	req.addEventListener("error", function () {
        	console.error("Erreur réseau avec l'URL " + url);
    	});
    	req.send(null);
	},
	
	init: function(e){
		this.ajax();
	}
	//les méthodes utiles à l'application
}

$(document).ready(function(e){
	app = Object.create(application);
	app.init(e);
});
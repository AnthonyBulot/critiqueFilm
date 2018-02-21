<?php

$routeur = [
	"#^/critique/$#" => "ControlerFront@home",
	"#^/critique/film/accueil$#" => "ControlerFront@home",
	"#^/critique/film/dernier-film#" => "ControlerFront@lastExit",
	"#^/critique/film/formulaire-admin$#" => "ControlerFront@formAdmin",
	"#^/critique/film/connexion-admin$#" => "ControlerFront@connectAdmin",
	"#^/critique/film/formulaire-connexion#" => "ControlerFront@formConnect",
	"#^/critique/film/deconnect$#" => "ControlerFront@deconnect",
	"#^/critique/film/inscription$#" => "ControlerFront@inscription",
	"#^/critique/film/connexion$#" => "ControlerFront@connect",
	"#^/critique/film/administration$#" => "ControlerBack@admin",
	"#^/critique/film/ajout-film$#" => "ControlerBack@addPost",
	"#^/critique/film/ajout-fiche-film$#" => "ControlerBack@savePost"

];
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
	"#^/critique/film/ajout-fiche-film$#" => "ControlerBack@savePost",
	"#^/critique/film/([0-9]+)/suprimer$#" => "ControlerBack@deletePost",
	"#^/critique/film/([0-9]+)$#" => "ControlerFront@getPost",
	"#^/critique/film/([0-9]+)/ajout-commentaire$#" => "ControlerFront@addComment",
	"#^/critique/film/([0-9]+)/modification$#" => "ControlerBack@formUpdatePost",
	"#^/critique/film/([0-9]+)/modification-fiche-film$#" => "ControlerBack@updatePost",
	"#^/critique/film/category/([a-zA-Z0-9\-]+)#" => "ControlerFront@postCategory"

];
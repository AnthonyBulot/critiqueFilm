<?php
namespace Critique\routeur;

class Routeur{
	protected $_routeur;

	public function initRouteur(){
		$this->getRouteur();
		foreach ($this->_routeur as $key => $value) {
			$keyRouteur = '#^'.$key.'$#';
        	if (preg_match($keyRouteur, $_SERVER['REQUEST_URI'])){
        	    $pageExist = $this->getControler($value);
        	}
    	}
    	if(!isset($pageExist)){
     		throw new \NewException("Cette page n'existe pas !", 404);   
    	}
	}

	private function getControler($value){
		$rout = explode('@', $value);
        $class = '\Critique\controler\\' . $rout[0];
        $method = $rout[1];
        $controler = new $class();
        $controler->$method();
        return true;
	}

	private function getRouteur(){
		$this->_routeur = [
			"/critique/" => "ControlerFront@home",
			"/critique/film/accueil" => "ControlerFront@home",
			"/critique/film/dernier-film" => "ControlerPost@lastExit",
			"/critique/film/dernier-film/([0-9]+)" => "ControlerPost@lastExit",			
			"/critique/film/formulaire-admin" => "ControlerConnect@formAdmin",
			"/critique/film/connexion-admin" => "ControlerConnect@connectAdmin",
			"/critique/film/formulaire-connexion" => "ControlerConnect@formConnect",
			"/critique/film/formulaire-connexion/erreur" => "ControlerConnect@formConnect",
			"/critique/film/deconnect" => "ControlerConnect@deconnect",
			"/critique/film/inscription" => "ControlerConnect@inscription",
			"/critique/film/connexion" => "ControlerConnect@connect",
			"/critique/film/administration" => "ControlerAdmin@admin",
			"/critique/film/ajout-film" => "ControlerAdminPost@addPost",
			"/critique/film/ajout-fiche-film" => "ControlerAdminPost@savePost",
			"/critique/film/([0-9]+)/suprimer" => "ControlerAdminPost@deletePost",
			"/critique/film/([0-9]+)" => "ControlerPost@getPost",
			"/critique/film/([0-9]+)/report" => "ControlerPost@getPost",
			"/critique/film/([0-9]+)/page-([0-9]+)" => "ControlerPost@getPost",
			"/critique/film/([0-9]+)/ajout-commentaire" => "ControlerComment@addComment",
			"/critique/film/([0-9]+)/modification" => "ControlerAdminPost@formUpdatePost",
			"/critique/film/([0-9]+)/modification-fiche-film" => "ControlerAdminPost@updatePost",
			"/critique/film/category/([a-zA-Z0-9\-]+)" => "ControlerPost@postCategory",
			"/critique/film/category/([a-zA-Z0-9\-]+)/([0-9]+)" => "ControlerPost@postCategory",
			"/critique/film/recherche-film" => "ControlerPost@search",
			"/critique/film/contact" => "ControlerContact@formContact",
			"/critique/film/message-contact" => "ControlerContact@contact",
			"/critique/film/utilisateur" => "ControlerUser@userPage",
			"/critique/film/admin-contact" => "ControlerAdminContact@getContact",
			"/critique/film/contact/([a-zA-Z0-9]+)" => "ControlerAdminContact@getOneContact",
			"/critique/film/contact/delete/([0-9]+)" => "ControlerAdminContact@deleteContact",
			"/critique/film/modification/commentaire-([0-9]+)" => "ControlerComment@formUpdateComment",
			"/critique/film/modification/commentaire/([0-9]+)/([0-9]+)" => "ControlerComment@updateComment",
			"/critique/film/report/commentaire/([0-9]+)/([0-9]+)" => "ControlerComment@addReport",
			"/critique/film/commentaire-signale" => "ControlerAdminComment@listReport",
			"/critique/film/commentaire-signale/([0-9]+)" => "ControlerAdminComment@listReport",
			"/critique/film/suprimer/signalement/([0-9]+)" => "ControlerAdminComment@deleteReport",
			"/critique/film/suprimer/commentaire/([0-9]+)" => "ControlerAdminComment@deleteComment",
			"/critique/film/carte-cinema-paris" => "ControlerFront@carte",
			"/critique/film/utilisateur/commentaire" => "ControlerUser@userComment"
		];
	}
}
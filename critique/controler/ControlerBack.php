<?php

class ControlerBack extends Controler
{    
	protected $_objectPost;

	public function __construct()
	{
		if (!(isset($_SESSION['admin'])))
		{
			throw new NewException('Vous n\'avez pas accès à cette page', 401);
		}
		$this->_objectPost = new Post();
	}

	public function admin(){
		$this->render("adminView");
	}

	public function addPost(){
		$this->render("addPostView");
	}	

	public function savePost(){
		if(empty($_POST['title']) && empty($_POST['description']) && empty($_POST['actor']) && empty($_POST['category']) && empty($_POST['date_exit'])){
			throw new NewException('Tous les champs ne sont pas remplis !', 400);			
		}
		// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
		if (isset($_FILES['poster']) AND $_FILES['poster']['error'] == 0)
		{
        	// Testons si le fichier n'est pas trop gros
        	if ($_FILES['poster']['size'] <= 1000000)
        	{
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['poster']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['poster']['tmp_name'], 'css/poster/' . basename($_FILES['poster']['name']));
                        echo "L'envoi a bien été effectué !";
                }
        	}
		}
		else{
			throw new NewException('Fichier manquant ou erreur de chargement', 400);			
		}

		$data = [
			"title" => $_POST['title'],
			"description" => $_POST['description'],
			"actor" => $_POST['actor'],
			"category" => $_POST['category'],
			"date_exit" => $_POST['date_exit'],
			"url" => basename($_FILES['poster']['name']),
		];
		$newPost = $this->_objectPost->add($data);
		if (!$newPost) {
			throw new NewException('La fiche du film n\'a pas pus être enregistré !', 409);
		}
		else {
			header('Location: /critique/');
		}
	}
}


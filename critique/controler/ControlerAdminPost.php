<?php
namespace Critique\controler;


class ControlerAdminPost extends Controler
{ 
	protected $_objectPost;
    protected $_objectComment;

	public function __construct($token)
	{
		if (!(isset($_SESSION['admin'])))
		{
			throw new \NewException('Vous n\'avez pas accès à cette page', 401);
		}
        if ($_SESSION['token'] != $token) {
            throw new \NewException('Erreur de vérification');
        }
		$this->_objectPost = new \Critique\model\Post(); 
        $this->_objectComment = new \Critique\model\Comment();
	}


	public function addPost(){
		$this->render("addPostView");
	}

	public function savePost(){
		if(empty($_POST['title']) || empty($_POST['description']) || empty($_POST['actor']) || empty($_POST['category']) || empty($_POST['date_exit'])){
			throw new \NewException('Tous les champs ne sont pas remplis !', 400);			
		}
		// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
		if (isset($_FILES['poster']) AND $_FILES['poster']['error'] == 0)
		{
        	// Testons si le fichier n'est pas trop gros
        	if ($_FILES['poster']['size'] <= 10000000)
        	{
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['poster']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                		$url = uniqid('', true) . '.' . $infosfichier['extension'];
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['poster']['tmp_name'], 'css/poster/' . $url);
                }
        	}
		}
		else{
			throw new \NewException('Fichier manquant ou erreur de chargement', 400);			
		}

		$data = [
			"title" => $_POST['title'],
			"description" => $_POST['description'],
			"actor" => $_POST['actor'],
			"category" => $_POST['category'],
			"note" => $_POST['note'],
			"date_exit" => $_POST['date_exit'],
			"url" => $url,
		];
		$newPost = $this->_objectPost->add($data);
		if (!$newPost) {
			throw new \NewException('La fiche du film n\'a pas pus être enregistré !', 409);
		}
		else {
			header('Location: /critique/film/accueil');
		}
	}	

	public function deletePost(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new \NewException('Aucun identifiant de commentaire envoyé', 400);
        }
        $url = $this->_objectPost->getUrl($_GET['id']);
        unlink('css/poster/' . $url['url_image']);
        $deleteComment = $this->_objectComment->deleteCommentPost($_GET['id']);

        $delete = $this->_objectPost->delete($_GET['id']);
        if (!$delete || !$deleteComment){
			throw new \NewException('La fiche n\'as pas été suprimé', 409);        	
        }
        else {
        	header('Location: /critique/film/accueil');
        }		
	}

	public function formUpdatePost(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new \NewException('Aucun identifiant de commentaire envoyé', 400);
        }

        $post = $this->_objectPost->getPost($_GET['id']);

        $data = [
        	'post' => $post,
        ];
        $this->render('updatePostView' , $data);	
	}

	public function updatePost(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new \NewException('Aucun identifiant de commentaire envoyé', 400);
        }
        if(empty($_POST['title']) || empty($_POST['description']) || empty($_POST['actor']) || empty($_POST['category']) || empty($_POST['date_exit'])){
			throw new \NewException('Tous les champs ne sont pas remplis !', 400);			
		}

		$url = $this->_objectPost->getUrl($_GET['id']);

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
                        move_uploaded_file($_FILES['poster']['tmp_name'], 'css/poster/' . $url['url_image']);
                }
        	}
		}

        $data = [
        	'title' => $_POST['title'],
        	'description' => $_POST['description'],
        	'actor' => $_POST['actor'],
        	'category' => $_POST['category'],
        	'exit_date' => $_POST['date_exit'],
        	'id' => $_GET['id'],
        ];
        $post = $this->_objectPost->updatePost($data);	
        if (!$post){
			throw new \NewException('La modification a échoué', 409);        	        	
        }
        else {
        	header('Location: /critique/film/' . $_GET['id']);
        }
	}

}
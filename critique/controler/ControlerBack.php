<?php

class ControlerBack extends Controler
{    
	protected $_objectPost;
	protected $_objectContact;
	protected $_objectReport;
	protected $_objectComment;

	public function __construct()
	{
		if (!(isset($_SESSION['admin'])))
		{
			throw new NewException('Vous n\'avez pas accès à cette page', 401);
		}
		$this->_objectPost = new Post();
		$this->_objectContact = new Contact();
		$this->_objectReport = new Report();
		$this->_objectComment = new Comment();
	}

	public function admin(){
		$message = $this->_objectContact->getMessage();

		$data =  [
			'message' => $message,
		];
		$this->render("adminView", $data);
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

	public function deletePost(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new NewException('Aucun identifiant de commentaire envoyé', 400);
        }
        $url = $this->_objectPost->getUrl($_GET['id']);
        unlink('css/poster/' . $url['url_image']);

        $delete = $this->_objectPost->delete($_GET['id']);
        if (!$delete){
			throw new NewException('La fiche n\'as pas été suprimé', 409);        	
        }
        else {
        	header('Location: /critique/');
        }		
	}

	public function formUpdatePost(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new NewException('Aucun identifiant de commentaire envoyé', 400);
        }

        $post = $this->_objectPost->getPost($_GET['id']);

        $data = [
        	'post' => $post,
        ];
        $this->render('updatePostView' , $data);	
	}

	public function updatePost(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new NewException('Aucun identifiant de commentaire envoyé', 400);
        }
        if(empty($_POST['title']) && empty($_POST['description']) && empty($_POST['actor']) && empty($_POST['category']) && empty($_POST['date_exit'])){
			throw new NewException('Tous les champs ne sont pas remplis !', 400);			
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
			throw new NewException('La modification a échoué', 409);        	        	
        }
        else {
        	header('Location: /critique/film/' . $_GET['id']);
        }
	}

	public function getContact(){
		$contact = $this->_objectContact->getContact();

		$data = [
			'contact' => $contact,
		];
		$this->render('contactView', $data);
	}

	public function getOneContact(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new NewException('Aucun identifiant de commentaire envoyé', 400);
        }

        $read = $this->_objectContact->read($_GET['id']);
        $contact = $this->_objectContact->getOneContact($_GET['id']);

        $data = [
        	'contact' => $contact,
        ];	
        $this->render('oneContactView', $data);
	}

	public function deleteContact(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new NewException('Aucun identifiant de commentaire envoyé', 400);
        }

        $delete = $this->_objectContact->deleteContact($_GET['id']);
        if (!$delete){
			throw new NewException('Le message n\'as pas été suprimé', 409);        	
        }
        else {
        	header('Location: /critique/film/admin-contact');
        }
	}

	public function listReport(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new NewException('Aucun identifiant de commentaire envoyé', 400);
        }

		$totalPosts = $this->_objectComment->numberComments();

		$numberPages=ceil($totalPosts/10);

		if(isset($_GET['id'])) {
			$currentPage=intval($_GET['id']);
 
     		if($currentPage>$numberPages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
     		{
         		$currentPage=$numberPages;
     		}
		}
		else // Sinon
		{
     		$currentPage = 1; // La page actuelle est la n°1    
		}

		$firstEntry=($currentPage - 1) * 10; // On calcul la première entrée à lire

		$comments = $this->_objectReport->listReport($firstEntry);
		$data = [
    		'comments' => $comments,
    		'numberPages' => $numberPages,
    		'currentPage' => $currentPage
    	];
		$this->render('listCommentsView', $data);
	}

	public function deleteReport(){
		if (!(isset($_GET['id']) && $_GET['id'] > 0)) {
            throw new NewException('Aucun identifiant de commentaire envoyé', 400);
        }

		$report = $this->_objectReport->deleteReport($_GET['id']);
		if (!$report) {
       	 	throw new NewException('Les signalement n\'ont pas été supprimer !', 409);
    	}
    	else {
    		header('Location: /critique/film/commentaire-signale/delete-2');
    	}		
	}

	public function deleteComment(){
		if (!(isset($_GET['id']) && $_GET['id'] > 0)) {
            throw new NewException('Aucun identifiant de commentaire envoyé', 400);
        }

		$comment = $this->_objectComment->deleteComment($_GET['id']);
		if (!$comment) {
       	 	throw new NewException('Le commentaire n\'as pas été supprimer !', 409);
    	}
    	else {
    		header('Location: /critique/film/commentaire-signale/delete-1');
    	}
	}

}


<?php

class ControlerFront extends Controler
{
	protected $_objectUser;
	protected $_objectPost;
	protected $_objectComment;
	protected $_objectContact;
	protected $_objectReport;

	public function __construct(){
		$this->_objectUser = new User();
		$this->_objectPost = new Post();
		$this->_objectComment = new Comment();
		$this->_objectContact = new Contact();
		$this->_objectReport = new Report();
	}

	public function home(){
		$url = $this->_objectPost->diaporamaPost();

		$data = [
    		'url' => $url
    	];
		$this->render('homeView', $data);
	}

	public function lastExit(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new NewException('Aucun identifiant de commentaire envoyé', 400);
        }

		$totalPosts = $this->_objectPost->numberPost();

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

		$posts = $this->_objectPost->listPosts($firstEntry);

		$data = [
    		'posts' => $posts,
    		'numberPages' => $numberPages,
    		'currentPage' => $currentPage,
    	];
		$this->render('lastMovieView', $data);
	}

	public function getPost(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new NewException('Aucun identifiant de commentaire envoyé', 400);
        }

        $post = $this->_objectPost->getPost($_GET['id']);

        if (!$post): throw new NewException("Ce post n'existe pas !", 404); 
    	else : $post = $this->_objectPost->getPost($_GET['id']);
    	endif;

        $averageNote = $this->_objectComment->getNote($_GET['id']);
        $comments = $this->_objectComment->getComments($_GET['id']);
        $note = ceil($averageNote['AVG(note)']);

        while ($comment = $comments->fetch()){
        	$key = $comment['author'];
        	$author[$key] = 'true';
        }

        $comments = $this->_objectComment->getComments($_GET['id']);
        $data = [
        	'post' => $post,
        	'comments' => $comments,
        	'note' => $note,
        	'author' => $author,
        ];	
        $this->render('postView', $data);	
	}

	public function formAdmin(){
	  	$this->render('formAdminView');
	} 

	public function connectAdmin(){
		if(empty($_POST['user']) && empty($_POST['password'])){
			throw new NewException('Tous les champs ne sont pas remplis !', 400);			
		}

		$controler = new Administration();
		$dbPassword = $controler->connect($_POST['user']);
		if (password_verify($_POST['password'], $dbPassword['password'])) {
			$_SESSION['admin'] = true;
			$_SESSION['name'] = $_POST['user'];
    		header('Location: /critique/film/administration');
		}
		else{
			throw new NewException('Mot de passe ou nom d\'utilisateur incorect', 400);
		}
	}

	public function formConnect(){
		$this->render('formConnectView');
	}

	public function deconnect(){
		session_destroy();
		header('Location: /critique/');
	}

	public function inscription(){
		if(empty($_POST['user']) && empty($_POST['password'])){
			throw new NewException('Tous les champs ne sont pas remplis !', 400);			
		}
		$user = $this->_objectUser->user_exist($_POST['user']);

		if($user){
			header('Location: /critique/film/formulaire-connexion/erreur');
		} else {
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$data = [
				"user" => $_POST['user'],
				"password" => $password,
			];
			$new = $this->_objectUser->add($data);
			if (!$new) {
				throw new NewException('Inscription non effectué', 409);
			}
			else {
				$_SESSION['password'] = $_POST['user'];
				header('Location: /critique/film/utilisateur');
			}
		}
	}

	public function connect(){
		if(empty($_POST['user']) && empty($_POST['password'])){
			throw new NewException('Tous les champs ne sont pas remplis !', 400);			
		}

		$dbPassword = $this->_objectUser->connect($_POST['user']);

		if (password_verify($_POST['password'], $dbPassword['password'])) {
			$_SESSION['name'] = $_POST['user'];
    		header('Location: /critique/film/utilisateur');
		}
		else{
			throw new NewException('Mot de passe ou nom d\'utilisateur incorect', 400);
		}
	}

	public function addComment(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new NewException('Aucun identifiant de commentaire envoyé', 400);
        }
        if(empty($_POST['author']) && empty($_POST['content']) && empty($_POST['note'])){
			throw new NewException('Tous les champs ne sont pas remplis !', 400);			
		}
        if(!($_POST['note']	>= 0 && $_POST['note'] <= 100)){
			throw new NewException('La note n\'est pas un chiffre compris entre 0 et 100 !', 400);			        	
        }

        $data = [
        	'author' => $_POST['author'],
        	'content' => $_POST['content'],
        	'note' => $_POST['note'],
        	'id' => $_GET['id'],
        ];
        var_dump($data);
        $add = $this->_objectComment->addComment($data);
        var_dump($add);
        if(!$add){
			throw new NewException('Commentaire non ajouté', 409);        	
        }
        else {
        	header('Location: /critique/film/' . $_GET['id']);
        }
	}

	public function postCategory(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new NewException('Aucun identifiant de commentaire envoyé', 400);
        }

		$totalPosts = $this->_objectPost->numberPostCategory($_GET['category']);

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

		$dataModel = [
    		'category' => $_GET['category'],
    		'first' => $firstEntry,
		];
		$posts = $this->_objectPost->category($dataModel);

		if($posts->fetch()){
			$posts = $this->_objectPost->category($dataModel);
			$data = [
    			'posts' => $posts,
    			'numberPages' => $numberPages,
    			'currentPage' => $currentPage,
    		];
			$this->render('movieCategoryView', $data);		
		} else {
			$data = [
    			'category' => $_GET['category'],
    		];
    		$this->render('errorCategoryView', $data);
		}
	}

	public function search(){
		if (empty($_POST['search'])) {
            throw new NewException('Aucun champs renseigné', 400);
        }

        $search = '%' . $_POST['search'] . '%';

        $data = $this->_objectPost->search($search);  

        if (!($data->fetch()))
        {
            $data = [
                'search' => $_POST['search'],
            ];
            $this->render('falseSearchView', $data);
        }
        else
        {
            $data = $this->_objectPost->search($search);
            $dataDb = [
                'search' => $data,
            ];
            $this->render('searchView', $dataDb);
        }
	}

	public function formContact(){
		$this->render('formContactView');
	}

	public function contact(){
		if (empty($_POST['name']) && empty($_POST['email']) && empty($_POST['content'])) {
            throw new NewException('Tous les champs n\'ont pas été renseigné', 400);
        }		

        $data = [
        	'name' => $_POST['name'],
        	'email' => $_POST['email'],
        	'content' => $_POST['content'],
        ];
        $contact = $this->_objectContact->addContact($data);
        if (!$contact){
        	throw new NewException("Envoi du message non effectuer", 409);
        }
        else {
        	header('Location: /critique/');
        }
	}

	public function userPage(){
		$this->render('userView');
	}

	public function formUpdateComment(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new NewException('Aucun identifiant de commentaire envoyé', 400);
        }

        $comment = $this->_objectComment->getComment($_GET['id']);
        $data = [
        	'comment' => $comment,
        ];
        $this->render('updateCommentView', $data);
	}

	public function updateComment(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new NewException('Aucun identifiant de commentaire envoyé', 400);
        }
        if(empty($_POST['content']) || empty($_POST['note'])){
        	throw new NewException('Tous les champs ne sont pas renseigné', 400);
        }	

        $data = [
        	'id' => $_GET['id'],
        	'content' => $_POST['content'],
        	'note' => $_POST['note'],
        ];
        $comment = $this->_objectComment->update($data);
        if (!$comment){
			throw new NewException('La modification a échoué', 409);        	        	
        }
        else {
        	header('Location: /critique/film/' . $_GET['postId']);
        }	
	}

	public function addReport(){
		if (!(isset($_GET['postId']) && $_GET['postId'] > 0)) {
			throw new NewException('Aucun identifiant de billet envoyé', 400);
        }
        if (!(isset($_GET['id']) && $_GET['id'] > 0)) {
            throw new NewException('Aucun identifiant de commentaire envoyé', 400);
        }

		$report = $this->_objectReport->addReport($_GET['id']);
    	if ($report === false) {
       	 	throw new NewException('Echec du signalement !');
    	}
    	else {
    		header('Location: /critique/film/' . $_GET['postId'] . '/report');
    	}		
	}
}
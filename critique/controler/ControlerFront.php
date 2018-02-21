<?php

class ControlerFront extends Controler
{
	protected $_objectUser;
	protected $_objectPost;

	public function __construct(){
		$this->_objectUser = new User();
		$this->_objectPost = new Post();
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
    		'currentPage' => $currentPage
    	];
		$this->render('homeView', $data);
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
			$_SESSION['admin'] = $_POST['user'];
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
			$_SESSION['password'] = $_POST['user'];
    		header('Location: /critique/film/utilisateur');
		}
		else{
			throw new NewException('Mot de passe ou nom d\'utilisateur incorect', 400);
		}
	}
}
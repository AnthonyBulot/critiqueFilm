<?php
namespace Critique\controler;


class ControlerConnect extends Controler
{
	protected $_objectUser;
	protected $_objectAdministration;

	public function __construct($token){
		if ($_SESSION['token'] != $token) {
			throw new \NewException('Erreur de vérification');
		}
		$this->_objectUser = new \Critique\model\User();
		$this->_objectAdministration = new \Critique\model\Administration();

	}

	public function formAdmin(){
	  	$this->render('formAdminView');
	} 

	public function connectAdmin(){
		if(empty($_POST['user']) && empty($_POST['password'])){
			throw new \NewException('Tous les champs ne sont pas remplis !', 400);			
		}

		$dbPassword = $this->_objectAdministration->connect($_POST['user']);
		if (password_verify($_POST['password'], $dbPassword['password'])) {
			$_SESSION['admin'] = true;
			$_SESSION['name'] = $_POST['user'];
    		header('Location: /critique/film/administration');
		}
		else{
			throw new \NewException('Mot de passe ou nom d\'utilisateur incorect', 400);
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
			throw new \NewException('Tous les champs ne sont pas remplis !', 400);			
		}
		if (!preg_match('#(?=.*[a-z]+)(?=.*[A-Z]+)(?=.*[0-9]+)#', $_POST['password'])) {
			throw new \NewException('Vous n\'avez pas renseigné une minuscule, une majuscule et un chiffre !', 400);			
		}
		if (!($_POST['password'] == $_POST['password2'])) {
			throw new \NewException('Les mots de passe ne sont pas identiques', 400);
		}
		if (!preg_match('#[A-Za-z0-9_]+@[a-zA-Z]+\.[a-zA-Z]+#', $_POST['email'])) {
			throw new \NewException('Adresse mail invalide', 400);
		}

		$user = $this->_objectUser->user_exist($_POST['user']);

		if($user){
			header('Location: /critique/film/formulaire-connexion/erreur');
		} else {
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$data = [
				"user" => $_POST['user'],
				"password" => $password,
				"email" => $_POST['email'],
			];
			$new = $this->_objectUser->add($data);
			if (!$new) {
				throw new \NewException('Inscription non effectué', 409);
			}
			else {
				$_SESSION['name'] = $_POST['user'];
				$_SESSION['user'] = true;
				header('Location: /critique/film/utilisateur');
			}
		}
	}

	public function connect(){
		if(empty($_POST['user']) && empty($_POST['password'])){
			throw new \NewException('Tous les champs ne sont pas remplis !', 400);			
		}

		$dbPassword = $this->_objectUser->connect($_POST['user']);

		if (password_verify($_POST['password'], $dbPassword['password'])) {
			$_SESSION['name'] = $_POST['user'];
			$_SESSION['user'] = true;
    		header('Location: /critique/film/utilisateur');
		}
		else{
			throw new \NewException('Mot de passe ou nom d\'utilisateur incorect', 400);
		}
	}
}
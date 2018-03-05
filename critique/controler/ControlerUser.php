<?php

namespace Critique\controler;

class ControlerUser extends Controler
{
	protected $_objectComment;
	protected $_objectPost;
    protected $_objectUser;

	public function __construct(){
		if (!isset($_SESSION['user'])) {
			throw new \NewException('Vous n\'avez pas accès à cette page', 401);
		}
		$this->_objectComment = new \Critique\model\Comment();
		$this->_objectPost = new \Critique\model\Post();
        $this->_objectUser = new \Critique\model\User();
	}
    public function userPage(){
        $verifyEmail = $this->_objectUser->getEmail($_SESSION['name']); 


        $data = [
            'email' => $verifyEmail['email']
        ];
        $this->render('userView', $data);
    }

	public function userComment(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new \NewException('Aucun identifiant de commentaire envoyé', 400);
        }
		$totalComment = $this->_objectComment->numberCommentsAuthor($_SESSION['name']);

		$paging = $this->pagesNumbering($totalComment);
        extract($paging);

        $dataDb = [
        	'first' => $firstEntry,
        	'author' => $_SESSION['name']
        ];
        $comments = $this->_objectComment->getCommentsAuthor($dataDb);
        
        $movie = [];
        while ($tabMovie = $comments->fetch()) {
        	$post = $this->_objectPost->getPostUser($tabMovie['post_id']);

        	$tabMovie = [
        		'title' => $post['title'],
        		'post_id' => $post['id']
        	];
        	$movie += [ $post['id'] => $tabMovie ];
        }

        $comments = $this->_objectComment->getCommentsAuthor($dataDb);
        $data = [
    		'comments' => $comments,
    		'numberPages' => $numberPages,
    		'currentPage' => $currentPage,
    		'movie' => $movie
        ];
		$this->render('userCommentView', $data);
	}

    public function formEmail(){
        $this->render('formEmailView');
    }

    public function updateEmail(){
        if(!preg_match('#[A-Za-z0-9_]+@[a-zA-Z]+\.[a-zA-Z]+#', $_POST['email'])) {
            throw new \NewException('Adresse mail invalide', 400);
        }
        if(!preg_match('#[A-Za-z0-9_]+@[a-zA-Z]+\.[a-zA-Z]+#', $_POST['email2'])) {
            throw new \NewException('Adresse mail invalide', 400);
        }

        $verifyEmail = $this->_objectUser->getEmail($_SESSION['name']);  
        if (!($_POST['email'] == $verifyEmail['email'])) {
            throw new \NewException('Adresse mail invalide', 400);
        } 

        $data = [
            'email' => $_POST['email2'],
            'name' => $_SESSION['name'],
        ];
        $update =$this->_objectUser->email_update($data);
        if(!$update) {
            throw new \NewException('Modification de l\'email non effectué', 409);
        }
        else {
            header('Location: /critique/film/utilisateur');
        }
    }

    public function formMotdePasse(){
        $this->render('formPasswordView');
    }

    public function updatePassword(){
        if (!preg_match('#(?=.*[a-z]+)(?=.*[A-Z]+)(?=.*[0-9]+)#', $_POST['passwordNew'])) {
            throw new \NewException('Vous n\'avez pas renseigné une minuscule, une majuscule et un chiffre !', 400);            
        }
        if (!($_POST['passwordNew'] == $_POST['passwordNew2'])) {
            throw new \NewException('Les mots de passe ne sont pas identiques', 400);
        }

        $dbPassword = $this->_objectUser->connect($_SESSION['name']);

        if (!password_verify($_POST['password'], $dbPassword['password'])) {
            throw new \NewException('Mot de passe invalide', 400);
        }

        $password = password_hash($_POST['passwordNew'], PASSWORD_DEFAULT);

        $data = [
            'password' => $password,
            'name' => $_SESSION['name']
        ];
        $update = $this->_objectUser->password_update($data);
        if(!$update) {
            throw new \NewException('Modification du mot de passe non effectué', 409);
        }
        else {
            header('Location: /critique/film/utilisateur');
        }
    }   
}
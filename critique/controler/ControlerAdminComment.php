<?php

class ControlerAdminComment extends Controler
{    
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
		$this->_objectReport = new Report();
		$this->_objectComment = new Comment();
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


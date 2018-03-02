<?php
namespace Critique\controler;


class ControlerAdminComment extends Controler
{    
	protected $_objectContact;
	protected $_objectReport;
	protected $_objectComment;

	public function __construct($model)
	{
		if (!(isset($_SESSION['admin'])))
		{
			throw new \NewException('Vous n\'avez pas accès à cette page', 401);
		}
		$this->_objectPost = $model['Post'];
		$this->_objectReport = $model['Report'];
		$this->_objectComment = $model['Comment'];
	}
	

	public function listReport(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new \NewException('Aucun identifiant de commentaire envoyé', 400);
        }

		$totalcomment = $this->_objectComment->numberComments();

		$paging = $this->pagesNumbering($totalcomment);
        extract($paging);

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
            throw new \NewException('Aucun identifiant de commentaire envoyé', 400);
        }

		$report = $this->_objectReport->deleteReport($_GET['id']);
		if (!$report) {
       	 	throw new \NewException('Les signalement n\'ont pas été supprimer !', 409);
    	}
    	else {
    		header('Location: /critique/film/commentaire-signale/delete-2');
    	}		
	}

	public function deleteComment(){
		if (!(isset($_GET['id']) && $_GET['id'] > 0)) {
            throw new \NewException('Aucun identifiant de commentaire envoyé', 400);
        }

		$comment = $this->_objectComment->deleteComment($_GET['id']);
		if (!$comment) {
       	 	throw new \NewException('Le commentaire n\'as pas été supprimer !', 409);
    	}
    	else {
    		header('Location: /critique/film/commentaire-signale/delete-1');
    	}
	}

}


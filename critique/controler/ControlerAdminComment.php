<?php
namespace Critique\controler;


class ControlerAdminComment extends Controler
{    
	protected $_objectContact;
	protected $_objectReport;
	protected $_objectComment;
	protected $_objectPost;

	public function __construct()
	{
		if (!(isset($_SESSION['admin'])))
		{
			throw new \NewException('Vous n\'avez pas accès à cette page', 401);
		}
		$this->_objectPost = new \Critique\model\Post();
		$this->_objectReport = new \Critique\model\Report();
		$this->_objectComment = new \Critique\model\Comment();
		$this->_objectPost = new \Critique\model\Post();
	}
	

	public function listReport(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new \NewException('Aucun identifiant de commentaire envoyé', 400);
        }

		$totalcomment = $this->_objectComment->numberComments();

		$paging = $this->pagesNumbering($totalcomment);
        extract($paging);

		$comments = $this->_objectReport->listReport($firstEntry);

		$movie = [];
        while ($tabMovie = $comments->fetch()) {
        	$post = $this->_objectPost->getPostUser($tabMovie['post_id']);

        	$tabMovie = [
        		'title' => $post['title'],
        		'post_id' => $post['id']
        	];
        	$movie += [ $post['id'] => $tabMovie ];
        }

        $comments = $this->_objectReport->listReport($firstEntry);
		$data = [
    		'comments' => $comments,
    		'numberPages' => $numberPages,
    		'currentPage' => $currentPage,
    		'movie' => $movie
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


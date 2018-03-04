<?php

namespace Critique\controler;

class ControlerUser extends Controler
{
	protected $_objectComment;
	protected $_objectPost;

	public function __construct(){
		if (!isset($_SESSION['user'])) {
			throw new \NewException('Vous n\'avez pas accès à cette page', 401);
		}
		$this->_objectComment = new \Critique\model\Comment();
		$this->_objectPost = new \Critique\model\Post();
	}
    public function userPage(){
        $this->render('userView');
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
}
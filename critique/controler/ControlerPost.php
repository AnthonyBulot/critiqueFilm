<?php
namespace Critique\controler;


class ControlerPost extends Controler
{
	protected $_objectPost;
	protected $_objectComment;

	public function __construct(){
		$this->_objectPost = new \Critique\model\Post();
		$this->_objectComment = new \Critique\model\Comment();
	}

	public function lastExit(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new \NewException('Aucun identifiant de commentaire envoyé', 400);
        }

		$totalPosts = $this->_objectPost->numberPost();

		$paging = $this->pagesNumbering($totalPosts);
        extract($paging);

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
            throw new \NewException('Aucun identifiant de commentaire envoyé', 400);
        }

        $post = $this->_objectPost->getPost($_GET['id']);

        if (!$post): throw new \NewException("Ce post n'existe pas !", 404); 
    	else : $post = $this->_objectPost->getPost($_GET['id']);
    	endif;

        $getAuthor = $this->_objectComment->getAuthor($_GET['id']);
        while ($Author = $getAuthor->fetch()){
        	$key = $Author['author'];
        	$author[$key] = 'true';
        }

        $totalcomment = $this->_objectComment->numberCommentsPost($_GET['id']);

        $paging = $this->pagesNumbering($totalcomment);
        extract($paging);

        $data = [
            'id' => $_GET['id'],
            'first' => $firstEntry, 
        ];
        $comments = $this->_objectComment->getComments($data);

        if(isset($author)){
        	$data = [
        		'post' => $post,
        		'comments' => $comments,
        		'author' => $author,
                'numberPages' => $numberPages,
                'currentPage' => $currentPage
        	];	
        } else {
        	$data = [
        		'post' => $post,
        		'comments' => $comments,
                'numberPages' => $numberPages,
                'currentPage' => $currentPage
        	];
        }
        $this->render('postView', $data);	
	}

	public function postCategory(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new \NewException('Aucun identifiant de commentaire envoyé', 400);
        }

		$totalPosts = $this->_objectPost->numberPostCategory($_GET['category']);

		$paging = $this->pagesNumbering($totalPosts);
        extract($paging);

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
                'category' => $_GET['category']
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
            throw new \NewException('Aucun champs renseigné', 400);
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

}
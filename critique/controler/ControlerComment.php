<?php
namespace Critique\controler;


class ControlerComment extends Controler
{
	protected $_objectPost;
	protected $_objectComment;
	protected $_objectReport;

	public function __construct($model){
		$this->_objectPost = $model['Post'];
		$this->_objectComment = $model['Comment'];
		$this->_objectReport = $model['Report'];
	}


	public function addComment(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new \NewException('Aucun identifiant de commentaire envoyé', 400);
        }
        if(empty($_POST['author']) && empty($_POST['content']) && empty($_POST['note'])){
			throw new \NewException('Tous les champs ne sont pas remplis !', 400);			
		}
        if(!($_POST['note']	>= 0 && $_POST['note'] <= 100)){
			throw new \NewException('La note n\'est pas un chiffre compris entre 0 et 100 !', 400);			        	
        }

        $data = [
        	'author' => $_POST['author'],
        	'content' => $_POST['content'],
        	'note' => $_POST['note'],
        	'id' => $_GET['id'],
        ];
        $add = $this->_objectComment->addComment($data);
        if(!$add){
			throw new \NewException('Commentaire non ajouté', 409);        	
        }
        else {
        	$averageNote = $this->_objectComment->getNote($_GET['id']);
            $note = ceil($averageNote['AVG(note)']);
            $dataNote = [
            	'id' => $_GET['id'],
            	'note' => $note,
            ];
            $this->_objectPost->addNote($dataNote);

        	header('Location: /critique/film/' . $_GET['id']);
        }
	}

	public function formUpdateComment(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new \NewException('Aucun identifiant de commentaire envoyé', 400);
        }

        $comment = $this->_objectComment->getComment($_GET['id']);
        $data = [
        	'comment' => $comment,
        ];
        $this->render('updateCommentView', $data);
	}

	public function updateComment(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new \NewException('Aucun identifiant de commentaire envoyé', 400);
        }
        if(empty($_POST['content']) || empty($_POST['note'])){
        	throw new \NewException('Tous les champs ne sont pas renseigné', 400);
        }	

        $data = [
        	'id' => $_GET['id'],
        	'content' => $_POST['content'],
        	'note' => $_POST['note'],
        ];
        $comment = $this->_objectComment->update($data);
        if (!$comment){
			throw new \NewException('La modification a échoué', 409);        	        	
        }
        else {
        	header('Location: /critique/film/' . $_GET['postId']);
        }	
	}

	public function addReport(){
		if (!(isset($_GET['postId']) && $_GET['postId'] > 0)) {
			throw new \NewException('Aucun identifiant de billet envoyé', 400);
        }
        if (!(isset($_GET['id']) && $_GET['id'] > 0)) {
            throw new \NewException('Aucun identifiant de commentaire envoyé', 400);
        }

		$report = $this->_objectReport->addReport($_GET['id']);
    	if ($report === false) {
       	 	throw new \NewException('Echec du signalement !');
    	}
    	else {
    		header('Location: /critique/film/' . $_GET['postId'] . '/report');
    	}		
	}


}
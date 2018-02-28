<?php 
namespace Critique\model;


class Comment extends Database{
	public function getComments($postId){
		$comments = $this->_db->prepare('SELECT id, author, content, note, DATE_FORMAT(date_comment, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM comment WHERE post_id = ? ORDER BY date_comment DESC');
        $comments->execute(array($postId));
		return $comments;
	}

	public function getComment($id){
		$comment = $this->_db->prepare('SELECT id, content, note, post_id FROM comment WHERE id = ?');
        $comment->execute(array($id));
		return $comment->fetch();
	}

	public function addComment($data){
		$comment = $this->_db->prepare('INSERT INTO comment(author, content, note, post_id, date_comment, report) 
			VALUES(?, ?, ?, ?, NOW(), 0)');
		$comments = $comment->execute(array($data['author'], $data['content'], $data['note'], $data['id']));
		return $comments;
	}

	public function getNote($postId){
		$note = $this->_db->prepare('SELECT AVG(note) FROM comment WHERE post_id = ?');
		$note->execute(array($postId));
		return $note->fetch();
	}

	public function update($data){
		$req = $this->_db->prepare('UPDATE comment SET note = ?, content = ? WHERE id = ?');
		$req->execute(array($data['note'], $data['content'], $data['id']));
		return $req;
	}

	public function deleteComment($id) {
		$delete = $this->_db->prepare('DELETE FROM comment WHERE id = ?');
		$delete->execute(array($id));
		return $delete;
	}

	public function numberComments()
	{
		$data_total= $this->_db->query('SELECT COUNT(*) AS total FROM comment');
		$data = $data_total->fetch();
		$total = $data['total'];
		return $total;
	}
}
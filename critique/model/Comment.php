<?php 
namespace Critique\model;


class Comment extends Database{
	public function getComments($data){
		$comments = $this->_db->prepare('SELECT id, author, content, note, DATE_FORMAT(date_comment, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM critique_comment WHERE post_id = :id ORDER BY date_comment DESC LIMIT :first , 10');
    	$comments->bindParam(':first', $data['first'], \PDO::PARAM_INT);
		$comments->bindParam(':id', $data['id'], \PDO::PARAM_STR);
        $comments->execute();
		return $comments;
	}
	public function getCommentsAuthor($data){
		$comments = $this->_db->prepare('SELECT id, author, content, note, post_id, DATE_FORMAT(date_comment, \'%d/%m/%Y à %H:%i:%s\') AS comment_datefr FROM critique_comment WHERE author = :author ORDER BY date_comment DESC LIMIT :first , 10');
    	$comments->bindParam(':first', $data['first'], \PDO::PARAM_INT);
		$comments->bindParam(':author', $data['author'], \PDO::PARAM_STR);
        $comments->execute();
		return $comments;
	}

	public function getComment($id){
		$comment = $this->_db->prepare('SELECT id, content, note, post_id FROM critique_comment WHERE id = ?');
        $comment->execute(array($id));
		return $comment->fetch();
	}

	public function getAuthor($id){
		$comment = $this->_db->prepare('SELECT author FROM critique_comment WHERE post_id = ?');
        $comment->execute(array($id));
		return $comment;
	}

	public function addComment($data){
		$comment = $this->_db->prepare('INSERT INTO critique_comment(author, content, note, post_id, date_comment, report) 
			VALUES(?, ?, ?, ?, NOW(), 0)');
		$comments = $comment->execute(array($data['author'], $data['content'], $data['note'], $data['id']));
		return $comments;
	}

	public function getNote($postId){
		$note = $this->_db->prepare('SELECT AVG(note) FROM critique_comment WHERE post_id = ?');
		$note->execute(array($postId));
		return $note->fetch();
	}

	public function update($data){
		$req = $this->_db->prepare('UPDATE critique_comment SET note = ?, content = ? WHERE id = ?');
		$req->execute(array($data['note'], $data['content'], $data['id']));
		return $req;
	}

	public function deleteComment($id) {
		$delete = $this->_db->prepare('DELETE FROM critique_comment WHERE id = ?');
		$delete->execute(array($id));
		return $delete;
	}

	public function deleteCommentPost($id) {
		$delete = $this->_db->prepare('DELETE FROM critique_comment WHERE post_id = ?');
		$delete->execute(array($id));
		return $delete;
	}

	public function numberComments()
	{
		$data_total= $this->_db->query('SELECT COUNT(*) AS total FROM critique_comment');
		$data = $data_total->fetch();
		$total = $data['total'];
		return $total;
	}

	public function numberCommentsPost($id)
	{
		$data_total= $this->_db->prepare('SELECT COUNT(*) AS total FROM critique_comment WHERE post_id = ?');
		$data_total->execute(array($id));
		$data = $data_total->fetch();
		$total = $data['total'];
		return $total;
	}

	public function numberCommentsAuthor($author)
	{
		$data_total= $this->_db->prepare('SELECT COUNT(*) AS total FROM critique_comment WHERE author = ?');
		$data_total->execute(array($author));
		$data = $data_total->fetch();
		$total = $data['total'];
		return $total;
	}
}
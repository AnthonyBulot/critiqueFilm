<?php 
namespace Critique\model;


class Report extends Database
{
	public function addReport($commentId)
	{
    	$comments = $this->_db->prepare('SELECT report FROM comment WHERE id = ?');
    	$comments->execute(array($commentId));
    	$report = $comments->fetch();
    	$report['report'] += 1;

    	$add = $this->_db->prepare('UPDATE comment SET report = ? WHERE id = ?');
    	$add->execute(array($report['report'], $commentId));
    	return $add;
	}

	public function listReport($first) {
        $req = $this->_db->prepare('SELECT id, author, content, note, DATE_FORMAT(date_comment, \'%d/%m/%Y à %H:%i:%s\') AS comment_datefr, report FROM comment ORDER BY report DESC LIMIT :first , 10');
        $req->bindParam(':first', $first, \PDO::PARAM_INT);
        $req->execute();
        return $req;
	}

	public function deleteReport($commentId) {
    	$add = $this->_db->prepare('UPDATE comment SET report = 0 WHERE id = ?');
    	$add->execute(array($commentId));
    	return $add;				
	}
}
<?php
namespace Critique\model;


class Contact extends Database {
	public function addContact($data){
		$req = $this->_db->prepare('INSERT INTO critique_contact(name_user, content, email, read_message, date_message) 
			VALUES(:name, :content, :email, 0, NOW())');
		$bool = $req->execute(array(
			'name' => $data['name'],
			'content' => $data['content'],
			'email' => $data['email'],
		));
		return $bool;
	}

	public function getContact(){
		$req = $this->_db->prepare('SELECT id, name_user, content, email, read_message, DATE_FORMAT(date_message, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM critique_contact ORDER BY date_message');
		$req->execute();
		return $req;
	}

	public function getOneContact($id){
		$req = $this->_db->prepare('SELECT id, name_user, content, email, read_message, DATE_FORMAT(date_message, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM critique_contact WHERE id = ?');
		$req->execute(array($id));
		return $req->fetch();
	}

	public function read($id){
		$add = $this->_db->prepare('UPDATE critique_contact SET read_message = 1  WHERE id = ?');
    	$add->execute(array($id));
    	return $add;	
	}

	public function deleteContact($id){
		$delete = $this->_db->prepare('DELETE FROM critique_contact WHERE id = ?');
		$delete->execute(array($id));
		return $delete;
	}

	public function getMessage(){
		$data_total= $this->_db->query('SELECT COUNT(*) AS total FROM critique_contact WHERE read_message = 0');
		$data = $data_total->fetch();
		$total = $data['total'];
		return $total;
	}
}
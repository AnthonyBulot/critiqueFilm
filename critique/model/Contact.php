<?php

class Contact extends Database {
	public function addContact($data){
		$req = $this->_db->prepare('INSERT INTO contact(name_user, content, email, read_message, date_message) 
			VALUES(:name, :content, :email, 0, NOW())');
		$bool = $req->execute(array(
			'name' => $data['name'],
			'content' => $data['content'],
			'email' => $data['email'],
		));
		return $bool;
	}

	public function getContact(){
		$req = $this->_db->prepare('SELECT id, name_user, content, email, read_message, DATE_FORMAT(date_message, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM contact ORDER BY date_message');
		$req->execute();
		return $req;
	}
}
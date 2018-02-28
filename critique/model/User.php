<?php 
namespace Critique\model;


class User extends Database {
	public function add($data){
		$req = $this->_db->prepare('INSERT INTO user(name_user, password) VALUES(?, ?)');
		$bool = $req->execute(array($data['user'], $data['password']));
		return $bool;
	}

	public function user_exist($user){
		$req = $this->_db->prepare('SELECT name_user FROM user WHERE name_user = ?');
		$req->execute(array($user));
		return $req->fetch();
	}

	public function connect($user){
		$req = $this->_db->prepare('SELECT * FROM user WHERE name_user = ?');
		$req->execute(array($user));
		return $req->fetch();
	}
}
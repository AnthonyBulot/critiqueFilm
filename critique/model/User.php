<?php 
namespace Critique\model;


class User extends Database {
	public function add($data){
		$req = $this->_db->prepare('INSERT INTO user(name_user, password, email) VALUES(?, ?, ?)');
		$bool = $req->execute(array($data['user'], $data['password'], $data['email']));
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

	public function getEmail($user){
		$req = $this->_db->prepare('SELECT email FROM user WHERE name_user = ?');
		$req->execute(array($user));
		return $req->fetch();		
	}

	public function email_update($data){
		$add = $this->_db->prepare('UPDATE user SET email = ? WHERE name_user = ?');
    	$add->execute(array($data['email'], $data['name']));
    	return $add;		
	}

	public function password_update($data){
		$add = $this->_db->prepare('UPDATE user SET password = ? WHERE name_user = ?');
    	$add->execute(array($data['password'], $data['name']));
    	return $add;	
	}
}
<?php
namespace Critique\model;

class Administration extends Database {
	public function connect($user){
		$req = $this->_db->prepare('SELECT * FROM administration WHERE user = ?');
		$req->execute(array($user));
		return $req->fetch();
	}
}
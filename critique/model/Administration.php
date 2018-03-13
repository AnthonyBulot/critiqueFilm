<?php
namespace Critique\model;

class Administration extends Database {
	public function connect($user){
		$req = $this->_db->prepare('SELECT * FROM critique_administration WHERE user = ?');
		$req->execute(array($user));
		return $req->fetch();
	}
}
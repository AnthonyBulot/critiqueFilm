<?php

class Post extends Database{

	public function add($data){
		$req = $this->_db->prepare('INSERT INTO post(title, description, actor, category, url_image, exit_date, popularity ) 
			VALUES(:title, :description, :actor, :category, :url_image, :date_exit, 0)');
		$bool = $req->execute(array(
			'title' => $data['title'],
			'description' => $data['description'],
			'actor' => $data['actor'],
			'category' => $data['category'],
			'url_image' => $data['url'],
			'date_exit' => $data['date_exit'],
		));
		return $bool;
	}
}
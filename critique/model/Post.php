<?php

class Post extends Database{

	public function add($data){
		$req = $this->_db->prepare('INSERT INTO post(title, description, actor, category, url_image, exit_date) 
			VALUES(:title, :description, :actor, :category, :url_image, :date_exit)');
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

	public function numberPost()
	{
		$data_total= $this->_db->query('SELECT COUNT(*) AS total FROM post');
		$data = $data_total->fetch();
		$total = $data['total'];
		return $total;
	}

	public function listPosts($first){
		$posts= $this->_db->prepare('SELECT id, title, description, actor, category, url_image, DATE_FORMAT(exit_date, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM post ORDER BY exit_date DESC LIMIT :first, 10');
		$posts->bindParam(':first', $first, PDO::PARAM_INT);
        $posts->execute();
		return $posts;
	}

}
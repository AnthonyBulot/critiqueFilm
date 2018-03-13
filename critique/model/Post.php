<?php
namespace Critique\model;


class Post extends Database{

	public function add($data){
		$req = $this->_db->prepare('INSERT INTO critique_film(title, description, note, actor, category, url_image, exit_date) 
			VALUES(:title, :description, :note, :actor, :category, :url_image, :date_exit)');
		$bool = $req->execute(array(
			'title' => $data['title'],
			'description' => $data['description'],
			'actor' => $data['actor'],
			'category' => $data['category'],
			'url_image' => $data['url'],
			'date_exit' => $data['date_exit'],
			'note' => $data['note'],
		));
		return $bool;
	}

	public function numberPost()
	{
		$data_total= $this->_db->query('SELECT COUNT(*) AS total FROM critique_film');
		$data = $data_total->fetch();
		$total = $data['total'];
		return $total;
	}

	public function numberPostCategory($category)
	{
		$data_total= $this->_db->prepare('SELECT COUNT(*) AS total FROM critique_film WHERE category = ?');
		$data_total->execute(array($category));
		$data = $data_total->fetch();
		$total = $data['total'];
		return $total;
	}

	public function listPosts($first){
		$posts= $this->_db->prepare('SELECT id, title, description, note, actor, category, url_image, DATE_FORMAT(exit_date, \'%d/%m/%Y\') AS date_fr FROM critique_film ORDER BY exit_date DESC LIMIT :first, 10');
		$posts->bindParam(':first', $first, \PDO::PARAM_INT);
        $posts->execute();
		return $posts;
	}

	public function diaporamaPost(){
		$url= $this->_db->prepare('SELECT id, title, url_image FROM critique_film ORDER BY exit_date DESC LIMIT 0, 3');
        $url->execute();
		return $url;
	}

	public function delete($postId){
		$delete = $this->_db->prepare('DELETE FROM critique_film WHERE id = ?');
		$delete->execute(array($postId));
		return $delete;
	}

	public function getUrl($postId){
		$url= $this->_db->prepare('SELECT url_image FROM critique_film WHERE id = ?');
        $url->execute(array($postId));
		return $url->fetch();
	}

	public function getPost($postId){
		$post = $this->_db->prepare('SELECT id, title, description, note, actor, category, url_image, 
			DATE_FORMAT(exit_date, \'%d/%m/%Y\') AS date_fr FROM critique_film WHERE id = ?');
        $post->execute(array($postId));
		return $post->fetch();		
	}

	public function updatePost($data){
		$add = $this->_db->prepare('UPDATE critique_film SET title = ?, description = ?, actor = ?, category = ?, exit_date = ?  WHERE id = ?');
    	$add->execute(array($data['title'], $data['description'], $data['actor'],  $data['category'], $data['exit_date'], $data['id']));
    	return $add;		
	}

	public function category($data){
		$posts= $this->_db->prepare('SELECT id, title, description, note, actor, category, url_image, DATE_FORMAT(exit_date, \'%d/%m/%Y\') AS date_fr FROM critique_film WHERE category = :category ORDER BY exit_date DESC LIMIT :first, 10');
		$posts->bindParam(':first', $data['first'], \PDO::PARAM_INT);
		$posts->bindParam(':category', $data['category'], \PDO::PARAM_STR);
        $posts->execute();
		return $posts;
	}

	public function search($search) {
		$req = $this->_db->prepare('SELECT id, title, description, note, actor, category, url_image, DATE_FORMAT(exit_date, \'%d/%m/%Y\') AS date_fr FROM critique_film WHERE title LIKE :title OR actor LIKE :actor ORDER BY exit_date DESC');
		$req->execute(array(
			'title' => $search,
			'actor' => $search,
		));
		return $req;
	}

	public function addNote($data){
		$add = $this->_db->prepare('UPDATE critique_film SET note = ?  WHERE id = ?');
    	$add->execute(array($data['note'], $data['id']));
    	return $add;			
	}

	public function getPostUser($postId){
		$post = $this->_db->prepare('SELECT id, title FROM critique_film WHERE id = ?');
        $post->execute(array($postId));
		return $post->fetch();	
	}
}
<?php

class ControlerFront extends Controler
{
	protected $_objectPost;

	public function __construct(){
		$this->_objectPost = new Post();
	}

	public function home(){
		$url = $this->_objectPost->diaporamaPost();

		$data = [
    		'url' => $url
    	];
		$this->render('homeView', $data);
	}

	public function userPage(){
		$this->render('userView');
	}

	public function carte(){
		$this->render('carteView');
	}
}
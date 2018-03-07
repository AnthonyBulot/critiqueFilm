<?php
namespace Critique\controler;

class ControlerFront extends Controler
{
	protected $_objectPost;

	public function __construct($token){
		if ($_SESSION['token'] != $token) {
			throw new \NewException('Erreur de vérification');
		}
		$this->_objectPost = new \Critique\model\Post();
	}

	public function home(){
		$url = $this->_objectPost->diaporamaPost();

		$data = [
    		'url' => $url
    	];
		$this->render('homeView', $data);
	}


	public function carte(){
		$this->render('carteView');
	}
}
<?php
namespace Critique\controler;

class ControlerFront extends Controler
{
	protected $_objectPost;

	public function __construct($model){
		$this->_objectPost = $model['Post'];
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
<?php
namespace Critique\model;

//Singleton
class SingletonModel
{
	private $settings = [];
	public $_model;
	private static $_instance;

	public static function getInstance(){

		if (is_null((self::$_instance))){
			self::$_instance = new SingletonModel();
		}
		return self::$_instance;
	}

	private function __construct(){
		$this->settings = require 'config/config.php';
		$this->_model = $this->getModel();
	}

	public function get($key) {

		if(!isset($this->settings[$key])){
			return null;
		}
		return $this->settings[$key];
	}

	private function getModel() {
		return $model = [
			'Post' => new Post(),
			'Administration' => new Administration(),
			'Comment' => new Comment(),
			'Contact' => new Contact(),
			'Report' => new Report(),
			'User' => new User()
		];
	}
}
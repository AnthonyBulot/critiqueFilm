<?php
namespace Critique\token;

//Singleton
class Token
{
	public $token;
	private static $hours;
	private static $_instance;

	public static function getInstance(){
		if (is_null(self::$_instance)){
			self::$hours = time();
			self::$_instance = new Token();
		}
		$time = time();
		if (self::$hours + 600 <= $time) {
			self::$hours = time();
			self::$_instance = new Token();		
		}
		return self::$_instance;
	}

	private function __construct(){
		$this->token = $this->getToken();
	}


	private function getToken() {
		$token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));

		return $token;
	}
}
<?php
namespace Critique\token;

//Faille CSRF
class Token
{
	public $token;
	public $time;
	public static $hours;

	public static function getInstance($createToken){
		if (!isset($_SESSION['instanceToken'])){
			var_dump('exist');
			self::$hours = time();
			$_SESSION['instanceToken'] = serialize(new Token());
			var_dump($_SESSION['instanceToken']);
		}
		$time = time();
		if (($createToken + 600) <= $time) {
			var_dump($time);
			var_dump('heure');
			self::$hours = time();
			$_SESSION['instanceToken'] = serialize(new Token());
			var_dump($_SESSION['instanceToken']);		
		}
		return $_SESSION['instanceToken'];
	}

	private function __construct(){
		$this->token = $this->getToken();
		$this->time = self::$hours;
	}


	private function getToken() {
		return $token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
	}
}
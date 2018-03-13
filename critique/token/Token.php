<?php
namespace Critique\token;

//Faille CSRF
class Token
{
	public $token;
	public $time;
	public static $hours;

	public static function getInstance($createToken = null){
		$time = time();
		if ($createToken + 600 <= $time) {
			self::$hours = time();
			$_SESSION['instanceToken'] = serialize(new Token());
		}
		return $_SESSION['instanceToken'];
	}

	private function __construct(){
		$this->token = $this->getToken();
		$this->time = self::$hours;
	}


	private function getToken() {
		return $token = uniqid('', true);
	}
}
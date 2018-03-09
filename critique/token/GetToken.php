<?php
namespace Critique\token;

//Faille CSRF
class GetToken
{
	protected $_token;

	public function __construct(){
		if (isset($_SESSION['instanceToken'])) {
    		$object = unserialize($_SESSION['instanceToken']);
    		$createToken = $object->time;
    		$instanceToken = Token::getInstance($createToken);
    	}
    	else {
    		$instanceToken = Token::getInstance();
    	}
    	$instance = unserialize($instanceToken);
    	$this->_token = $instance->token;
    	$_SESSION['token'] = $this->_token;
	}

	public function getToken(){
		return $this->_token;
	}
}
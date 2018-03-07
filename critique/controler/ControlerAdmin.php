<?php
namespace Critique\controler;


class ControlerAdmin extends Controler
{
	protected $_objectContact;

	public function __construct($token)
	{
		if (!(isset($_SESSION['admin'])))
		{
			throw new \NewException('Vous n\'avez pas accès à cette page', 401);
		}
		if ($_SESSION['token'] != $token) {
			throw new \NewException('Erreur de vérification');
		}
		$this->_objectContact = new \Critique\model\Contact();
	}
	
	public function admin(){
		$message = $this->_objectContact->getMessage();

		$data =  [
			'message' => $message,
		];
		$this->render("adminView", $data);
	}
}

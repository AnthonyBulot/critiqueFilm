<?php
namespace Critique\controler;


class ControlerAdmin extends Controler
{
	protected $_objectContact;

	public function __construct($model)
	{
		if (!(isset($_SESSION['admin'])))
		{
			throw new \NewException('Vous n\'avez pas accès à cette page', 401);
		}
		$this->_objectContact = $model ['Contact'];
	}
	
	public function admin(){
		$message = $this->_objectContact->getMessage();

		$data =  [
			'message' => $message,
		];
		$this->render("adminView", $data);
	}
}

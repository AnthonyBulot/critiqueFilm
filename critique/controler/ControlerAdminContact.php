<?php
namespace Critique\controler;


class ControlerAdminContact extends Controler
{
	protected $_objectContact;

	public function __construct()
	{
		if (!(isset($_SESSION['admin'])))
		{
			throw new \NewException('Vous n\'avez pas accès à cette page', 401);
		}
		$this->_objectContact = new \Critique\model\Contact();
	}

	public function getContact(){
		$contact = $this->_objectContact->getContact();

		$data = [
			'contact' => $contact,
		];
		$this->render('contactView', $data);
	}

	public function getOneContact(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new \NewException('Aucun identifiant de commentaire envoyé', 400);
        }

        $read = $this->_objectContact->read($_GET['id']);
        $contact = $this->_objectContact->getOneContact($_GET['id']);

        $data = [
        	'contact' => $contact,
        ];	
        $this->render('oneContactView', $data);
	}

	public function deleteContact(){
		if (isset($_GET['id']) && !($_GET['id'] > 0)) {
            throw new \NewException('Aucun identifiant de commentaire envoyé', 400);
        }

        $delete = $this->_objectContact->deleteContact($_GET['id']);
        if (!$delete){
			throw new \NewException('Le message n\'as pas été suprimé', 409);        	
        }
        else {
        	header('Location: /critique/film/admin-contact');
        }
	}	
} 
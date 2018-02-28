<?php
namespace Critique\controler;


class ControlerContact extends Controler
{
	protected $_objectContact;

	public function __construct($model){
		$this->_objectContact = $model['Contact'];
	}

	public function formContact(){
		$this->render('formContactView');
	}

	public function contact(){
		if (empty($_POST['name']) && empty($_POST['email']) && empty($_POST['content'])) {
            throw new NewException('Tous les champs n\'ont pas été renseigné', 400);
        }		

        $data = [
        	'name' => $_POST['name'],
        	'email' => $_POST['email'],
        	'content' => $_POST['content'],
        ];
        $contact = $this->_objectContact->addContact($data);
        if (!$contact){
        	throw new NewException("Envoi du message non effectuer", 409);
        }
        else {
        	header('Location: /critique/');
        }
	}
}	

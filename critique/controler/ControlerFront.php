<?php

class ControlerFront extends Controler
{
	public function formAdmin(){
	  	$this->render('formAdminView');
	} 

	public function connectAdmin(){
		if(empty($_POST['user']) && empty($_POST['password'])){
			throw new NewException('Tous les champs ne sont pas remplis !', 400);			
		}

		$controler = new Administration();
		$dbPassword = $controler->connect($_POST['user']);
		if (password_verify($_POST['password'], $dbPassword['password'])) {
			$_SESSION['password'] = true;
    		//header('Location: /critique/');
    		echo "réussi";
		}
		else{
			throw new NewException('Mot de passe ou nom d\'utilisateur incorect', 400);
		}
	}
}
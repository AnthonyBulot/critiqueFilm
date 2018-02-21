<?php

class ControlerBack extends Controler
{    
	public function __construct()
	{
		if (!(isset($_SESSION['password'])))
		{
			throw new NewException('Vous n\'avez pas accès à cette page', 401);
		}
	}

	
}


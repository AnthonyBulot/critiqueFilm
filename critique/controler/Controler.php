<?php
namespace Critique\controler;


class Controler 
{	
	public function render($view, $dataView = [])
	{
		extract($dataView);

		ob_start();
		require('view/' . $view . '.php');
		$content = ob_get_clean();

		if (!isset($template)) {
			throw new \NewException("Il manque une information", 400);
		}

		require('view/' . $template . '.php');
	}

	public function pagesNumbering($totalEntry){

		$numberPages=ceil($totalEntry/10);

		if(isset($_GET['id'])) {
			$currentPage=intval($_GET['id']);
 
     		if($currentPage>$numberPages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
     		{
         		$currentPage=$numberPages;
     		}
		}
		else // Sinon
		{
     		$currentPage = 1; // La page actuelle est la n°1    
		}

		$firstEntry=($currentPage - 1) * 10; // On calcul la première entrée à lire

		$data = [
			'firstEntry' => $firstEntry,
			'currentPage' => $currentPage,
			'numberPages' => $numberPages
		];
		return $data;
	}
}
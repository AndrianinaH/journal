<?php 

class Categorie
{
	var $idCategorie;
	var $nomCategorie;
	public function __construct($idCategorie,$nomCategorie)
	{
		$this->idCategorie=$idCategorie;
		$this->nomCategorie=$nomCategorie;
	}
}


?>
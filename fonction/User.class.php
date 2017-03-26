<?php 

class User
{
	var $idUser;
	var $nomUser;
	var $estAuteur;
	public function __construct($idUser,$nomUser,$estAuteur)
	{
		$this->idUser=$idUser;
		$this->nomUser=$nomUser;
		$this->estAuteur=$estAuteur;
	}
}


?>
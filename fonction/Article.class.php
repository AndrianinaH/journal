<?php 

class Article
{
	var $idArticle;
	var $idAuteur;
	var $idPublieur;
	var $nomAuteur;
	var $nomPublieur;
	var $idCategorie;
	var $nomCategorie;
	var $idJournal;
	var $dateJournal;
	var $idUne;
	var $publier;
	var $nomImage;
	var $titreArticle;
	var $textArticle;
	public function __construct($idArticle,$idAuteur,$idPublieur,$nomAuteur,$nomPublieur,$idCategorie,$nomCategorie,$idJournal,$dateJournal,$idUne,$publier,$nomImage,$titreArticle,$textArticle)
	{
		$this->idArticle=$idArticle;
		$this->idAuteur=$idAuteur;
		$this->idPublieur=$idPublieur;
		$this->nomAuteur=$nomAuteur;
		$this->nomPublieur=$nomPublieur;
		$this->idCategorie=$idCategorie;
		$this->nomCategorie=$nomCategorie;
		$this->idJournal=$idJournal;
		$this->dateJournal=$dateJournal;
		$this->idUne=$idUne;
		$this->publier=$publier;
		$this->nomImage=$nomImage;
		$this->titreArticle=$titreArticle;
		$this->textArticle=$textArticle;
	}
}


?>
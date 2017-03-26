<?php 

class Art
{
	var $idArticle;
	var $idCategorie;
	var $idJournal;
	var $idAuteur;
	var $idPublieur;
	var $nomImage;
	var $titreArticle;
	var $textArticle;
	public function __construct($idArticle,$idCategorie,$idJournal,$idAuteur,$idPublieur,$nomImage,$titreArticle,$textArticle)
	{
		$this->idArticle=$idArticle;
		$this->idCategorie=$idCategorie;
		$this->idJournal=$idJournal;
		$this->idAuteur=$idAuteur;
		$this->idPublieur=$idPublieur;
		$this->nomImage=$nomImage;
		$this->titreArticle=$titreArticle;
		$this->textArticle=$textArticle;
	}
}


?>
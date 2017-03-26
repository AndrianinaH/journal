<?php 

class Journal
{
	var $idJournal;
	var $dateJournal;
	var $idUne;
	var $publier;
	public function __construct($idJournal,$dateJournal,$idUne,$publier)
	{
		$this->idJournal=$idJournal;
		$this->dateJournal=$dateJournal;
		$this->idUne=$idUne;
		$this->publier=$publier;
	}
}


?>
<?php 

class ArtDB
{
	var $con;
	
	public function __construct($con)
	{
		$this->con=$con;
	}
	public function createArticle($idCategorie,$idJournal,$idAuteur,$idPublieur,$nomImage,$titreArticle,$textArticle)
	{
		$sql = "INSERT INTO article values('',?,?,?,?,?,?,?)";
		$reg=$this->con->prepare($sql);
		$reg->execute(array($idCategorie,$idJournal,$idAuteur,$idPublieur,$nomImage,$titreArticle,$textArticle));	
	}
	public function getAllAuteur()
	{
		$sql = "SELECT idAuteur,nomAuteur FROM allauteur GROUP BY nomAuteur";
		$reg=$this->con->prepare($sql);
		$reg->execute();
		$tab=array();
		while($line=$reg->fetch())
		{
			array_push($tab, new Auteur($line["idAuteur"],$line["nomAuteur"]));
		}
		return $tab;
	}
	public function updateArticle($idArticle,$idCategorie,$idJournal,$idAuteur,$idPublieur,$nomImage,$titreArticle,$textArticle)
	{
		$sql = "UPDATE article SET idCategorie = ?,idJournal = ?,idAuteur = ?,idPublieur = ?,nomImage = ?,titreArticle = ?,textArticle=? WHERE idArticle = ?";
		$reg=$this->con->prepare($sql);
		$reg->execute(array($idCategorie,$idJournal,$idAuteur,$idPublieur,$nomImage,$titreArticle,$textArticle,$idArticle));		
	}
	public function deleteArticle($idArticle)
	{
		$sql = "DELETE FROM article WHERE idArticle = ?";
		$reg=$this->con->prepare($sql);
		$reg->execute(array($idArticle));		
	}
}


?>

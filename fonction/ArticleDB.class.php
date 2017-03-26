<?php 

class ArticleDB
{
	var $con;
	
	public function __construct($con)
	{
		$this->con=$con;
	}
	
	public function getAllArticle($args,$date)
	{
		$sql = "SELECT * FROM allarticle WHERE publier = 'oui' AND nomCategorie =? AND idArticle!=idUne AND dateJournal=?";
		$reg=$this->con->prepare($sql);
		$reg->execute(array($args,$date));
		$tab=array();
		while($line=$reg->fetch())
		{
			array_push($tab, new Article($line["idArticle"],$line["idAuteur"],$line["idPublieur"],$line["nomAuteur"],$line["nomPublieur"],$line["idCategorie"],$line["nomCategorie"],$line["idJournal"],$line["dateJournal"],$line["idUne"],$line["publier"],$line["nomImage"],$line["titreArticle"],$line["textArticle"]));
		}
		return $tab;
	} 
	public function getAll()
	{
		$sql = "SELECT * FROM allarticle ORDER BY idArticle DESC";
		$reg=$this->con->prepare($sql);
		$reg->execute();
		$tab=array();
		while($line=$reg->fetch())
		{
			array_push($tab, new Article($line["idArticle"],$line["idAuteur"],$line["idPublieur"],$line["nomAuteur"],$line["nomPublieur"],$line["idCategorie"],$line["nomCategorie"],$line["idJournal"],$line["dateJournal"],$line["idUne"],$line["publier"],$line["nomImage"],$line["titreArticle"],$line["textArticle"]));
		}
		return $tab;
	} 
	public function getArticle($args)
	{
		$sql = "SELECT * FROM allarticle WHERE idArticle =?";
		$reg=$this->con->prepare($sql);
		$reg->execute(array($args));
		$tab=array();
		while($line=$reg->fetch())
		{
			array_push($tab, new Article($line["idArticle"],$line["idAuteur"],$line["idPublieur"],$line["nomAuteur"],$line["nomPublieur"],$line["idCategorie"],$line["nomCategorie"],$line["idJournal"],$line["dateJournal"],$line["idUne"],$line["publier"],$line["nomImage"],$line["titreArticle"],$line["textArticle"]));
		}
		return $tab;
	} 
	public function getCategorieActif($date)
	{
		$sql = "SELECT nomCategorie FROM allarticle WHERE publier = 'oui' AND dateJournal=? GROUP BY nomCategorie";
		$reg=$this->con->prepare($sql);
		$reg->execute(array($date));
		$tab=array();
		while($line=$reg->fetch())
		{
			array_push($tab, $line["nomCategorie"]);
		}
		return $tab;
	} 
	public function getLaUne($date)
	{
		$sql = "SELECT * FROM allarticle WHERE publier = 'oui' AND idArticle=idUne AND dateJournal=?";
		$reg=$this->con->prepare($sql);
		$reg->execute(array($date));
		$tab=array();
		while($line=$reg->fetch())
		{
			array_push($tab, new Article($line["idArticle"],$line["idAuteur"],$line["idPublieur"],$line["nomAuteur"],$line["nomPublieur"],$line["idCategorie"],$line["nomCategorie"],$line["idJournal"],$line["dateJournal"],$line["idUne"],$line["publier"],$line["nomImage"],$line["titreArticle"],$line["textArticle"]));
		}
		return $tab;
	}

	public function getExtrait($txt,$taille)
    {
	    $html=substr($txt, 0 , $taille).'...';
	    return $html;
    }
}

?>


 
<?php 

class CategorieDB
{
	var $con;
	
	public function __construct($con)
	{
		$this->con=$con;
	}
	public function getAllCategorie()
	{
		$sql = "SELECT * FROM categorie";
		$reg=$this->con->prepare($sql);
		$reg->execute();
		$tab=array();
		while($line=$reg->fetch())
		{
			array_push($tab, new Categorie($line["idCategorie"],$line["nomCategorie"]));
		}
		return $tab;
	} 
	public function getCategorie($id)
	{
		$sql = "SELECT * FROM categorie WHERE idCategorie=?";
		$reg=$this->con->prepare($sql);
		$reg->execute(array($id));
		$tab=array();
		while($line=$reg->fetch())
		{
			array_push($tab, new Categorie($line["idCategorie"],$line["nomCategorie"]));
		}
		return $tab;
	}
	public function createCategorie($cat)
	{
		$query = $this->con->prepare("SELECT * FROM categorie WHERE nomCategorie =?"); 
		$query->execute(array($cat));
		$count = $query->rowCount(); 
		if($count == 1) 
		{ 
			echo 'Cette catégorie éxiste déjà'; 
		} 
		else 
		{ 
			$sql = "INSERT INTO categorie values('',?)";
			$reg=$this->con->prepare($sql);
			$reg->execute(array($cat));	
		} 
	}
	public function destroyCategorie($id)
	{
		$sql = "DELETE FROM categorie WHERE idCategorie=?";
		$reg=$this->con->prepare($sql);
		$reg->execute(array($id));	
	}
}


?>

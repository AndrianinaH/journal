<?php 

class JournalDB
{
	var $con;
	
	public function __construct($con)
	{
		$this->con=$con;
	}
	 
	public function getLastJournal()
	{
		$sql = "SELECT * FROM journal WHERE publier='oui' ORDER BY dateJournal DESC LIMIT 1";
		$reg=$this->con->prepare($sql);
		$reg->execute();
		$tab=array();
		while($line=$reg->fetch())
		{
			array_push($tab, new Journal($line["idJournal"],$line["dateJournal"],$line["idUne"],$line["publier"]));
		}
		return $tab;
	}
	public function getAllJournal()
	{
		$sql = "SELECT * FROM journal ORDER BY dateJournal DESC";
		$reg=$this->con->prepare($sql);
		$reg->execute();
		$tab=array();
		while($line=$reg->fetch())
		{
			array_push($tab, new Journal($line["idJournal"],$line["dateJournal"],$line["idUne"],$line["publier"]));
		}
		return $tab;
	}
	public function updateJournal($idUne,$date,$id)
	{
		$sql = "UPDATE journal SET idUne=?,dateJournal=? WHERE idJournal=?";
		$reg=$this->con->prepare($sql);
		$reg->execute(array($idUne,$date,$id));	
	}
	public function publierJournal($id)
	{
		$sql = "UPDATE journal SET publier='oui' WHERE idJournal=?";
		$reg=$this->con->prepare($sql);
		$reg->execute(array($id));	
	}
	public function NePaspublierJournal($id)
	{
		$sql = "UPDATE journal SET publier='non' WHERE idJournal=?";
		$reg=$this->con->prepare($sql);
		$reg->execute(array($id));	
	}

	public function getArchiveJournal()
	{
		$sql = "SELECT * FROM journal WHERE publier='oui'";
		$reg=$this->con->prepare($sql);
		$reg->execute();
		$tab=array();
		while($line=$reg->fetch())
		{
			array_push($tab, new Journal($line["idJournal"],$line["dateJournal"],$line["idUne"],$line["publier"]));
		}
		return $tab;
	}
	public function getLastDate(){
		$sql = "SELECT * FROM journal WHERE publier='oui' ORDER BY dateJournal DESC LIMIT 1";
		$statement = $this->con->prepare($sql);
		$statement->execute();
		$resultSet = $statement->fetch();
		return $resultSet['dateJournal'];
	}
	public function createJournal($dateJ,$idUn,$publier)
	{
		$sql = "INSERT INTO journal values('',?,?,?)";
		$reg=$this->con->prepare($sql);
		$reg->execute(array($dateJ,$idUn,$publier));	
	}

}


?>
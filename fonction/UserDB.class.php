<?php 
require_once('User.class.php');
class UserDB
{
	var $con;
	public function __construct($con)
	{
		$this->con=$con;
	}
	public function testSignUp($mail,$passw)
	{

		$ret = false;
		$log = ($mail?$mail:'');
		$pass = ($passw?$passw:'');
		try{
			$pdos = $this->con->prepare("SELECT COUNT(*) AS res FROM user WHERE nomUser=? AND mdpUser=?") ;
    		$pdos->execute(array($log,$pass));
    		$pdos->setFetchMode(PDO::FETCH_ASSOC);
    		$nb = $pdos->fetch();
		}
		catch(PDOException $e) 
		{
			throw $e;
		}
			
		if($nb['res'] ==1) 
		{
			$ret = true;
		}
    	return $ret;
	}
	public function getUser($mail,$passw)
	{
		$pdos = $this->con->prepare("SELECT * FROM user WHERE nomUser=? AND mdpUser=?") ;
		$pdos->execute(array($mail,$passw));
		$line = $pdos->fetch();
		return new User($line["idUser"],$line["nomUser"],$line["estAuteur"]);
	}

}


?>
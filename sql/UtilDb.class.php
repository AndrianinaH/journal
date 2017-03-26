<?php 

class UtilDb{

	public function getConnection() {
		$user='1229404';
        $pass='azerty12';
        $dsn='mysql:host=localhost;dbname=1229404;charset=utf8';
		try {
			$connect = new PDO($dsn, $user, $pass);
			$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			throw $e;
		}
		return $connect;
	}

	public function moisEnLettre($date)
	{
		$dat = explode("-", $date);
		$mois=$dat[1];
		switch ($mois) {
    		case 1:
		       $dd=$dat[2].' '.'janvier'.' '.$dat[0] ;
		        break;
	        case 2:
		        $dd=$dat[2].' '.'février'.' '.$dat[0] ;
		        break;
		    case 3:
		       $dd=$dat[2].' '.'mars'.' '.$dat[0] ;
		        break;
	        case 4:
		        $dd=$dat[2].' '.'avril'.' '.$dat[0] ;
		        break;
	        case 5:
		        $dd=$dat[2].' '.'mai'.' '.$dat[0] ;
		        break;
	        case 6:
		       $dd=$dat[2].' '.'juin'.' '.$dat[0] ;
		        break;
	        case 7:
		       $dd=$dat[2].' '.'juillet'.' '.$dat[0] ;
		        break;
	        case 8:
		       $dd=$dat[2].' '.'août'.' '.$dat[0] ;
		        break;
	        case 9:
		       $dd=$dat[2].' '.'septembre'.' '.$dat[0] ;
		        break;
		    case 10:
		        $dd=$dat[2].' '.'octobre'.' '.$dat[0] ;
		        break;
		    case 11:
		       $dd=$dat[2].' '.'novembre'.' '.$dat[0] ;
		        break;
	        case 12:
		       $dd=$dat[2].' '.'decembre'.' '.$dat[0] ;
		        break;
    	}
    	return $dd;

	}

	public function select($nomTable,$nbreColonne,$colonneRestrict=null,$colonneValue=null,$colonne="*") {
		$request = "SELECT ".$colonne." FROM ".$nomTable;
		$retour = array();
		$whereColonne = "";
		if($colonneRestrict!=null) {
			$whereColonne = " WHERE ";
			$nbreColonneRestrict = count($colonneRestrict);
			if($nbreColonneRestrict !=1){
				for($j = 0;$j < $nbreColonneRestrict;$j++) {
					$whereColonne .= $colonneRestrict[$j] . " = '" . $colonneValue[$j] ."'";
					if($j < $nbreColonneRestrict - 1) $whereColonne .= " AND ";
				}
			}
			else $whereColonne .= $colonneRestrict . " = '" . $colonneValue ."'";
			$request .= $whereColonne;
		}
		try {
			$connection = $this->getConnectionPostgres();
			$statement = $connection->query($request);
			$resultSet = $statement->fetchAll();
			$i = 0;
			foreach ($resultSet as $key => $value) {
				for($k = 0;$k < $nbreColonne;$k++) {
					$retour[$i][$k] = $value[$k];
				} $i += 1;
			}
			unset($connection);
		} catch(PDOException $error) {
			throw $error;
		}
		return $retour;
	}

}


?>